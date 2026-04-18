<?php
session_start();
include "../database.php";

if (isset($_SESSION['admin_userId'])) {
  //echo "Your are logged in";
} else {
  // If user is not logged in he should be directed to login page and message should be displayed there
  //header("location:index.php");
  $_SESSION['error'] = "You're not logged in, Dont try to be clever";
  echo "<script> window.location.href='/admin/index.php' </script>";
  die;
}


$sql = "Select blog_posts.*, categories.name from blog_posts JOIN categories on blog_posts.type = categories.id";
$results = $conn->query($sql);




?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/style.css" />


  <title>Admin Panel</title>
</head>

<body>

  <?php include "includes/sidebar.php" ?>

  <div class="main-container">
    <h1>Admin Panel</h1>

    <div class="my-3">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add New Blog Post
      </button>

      <?php include "../includes/messages.php" ?>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="min-width: 800px">


          <form action="handler.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <label>Upload a file</label>
                    <input type="file" name="img" />
                  </div>

                  <div class="col-md-8">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title" />

                    <label class="pt-2">Content</label>
                    <textarea name="content" class="form-control" rows="15"></textarea>

                    <label class="pt-2">Select Category</label>
                    <select name="category" class="form-control">
                      <?php
                      $sqlQ_for_category = "Select * from categories";
                      $results_category = $conn->query($sqlQ_for_category);

                      if ($results_category->num_rows > 0) {
                        while ($row = $results_category->fetch_assoc()) {
                          ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                          <?php
                        }
                      }
                      ?>
                      <!-- <option value="1">Social</option>
                            <option value="2">Living Style</option> -->
                    </select>

                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="add-new-post">Save</button>
              </div>
            </div>

          </form>
        </div>
      </div>
      <!-- Modal End -->

    </div>

    <div>
      <table class="table table-bordered table-stripped">
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Title</th>
          <th>Category</th>
          <th>Actions</th>
        </tr>
        <?php
        if ($results->num_rows > 0) {

          //Iterating Blog posts and showing Table row
          while ($row = $results->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><img src="/uploads/<?php echo $row['image'] ?>" width="100px"></td>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['name'] ?></td>
              <td>
                <!-- Edit function -->

                <!-- Modal for edit function -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                  data-bs-target="#editModel_<?php echo $row['id'] ?>">
                  Edit
                </button>

                <!-- Modal -->
                <div class="modal fade" id="editModel_<?php echo $row['id'] ?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" style="min-width: 800px">

                    <form action="handler.php?id=<?php echo $row['id'] ?>" method="POST" enctype="multipart/form-data">

                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Blog Post</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <h2> Editing Blog post with ID <?php echo $row['id']; ?> </h2>

                          <!-- Same form that we used for Adding Blog post -->
                          <div class="row">
                            <div class="col-md-4">
                              <label>Upload a file</label>
                              <input type="file" name="img" />
                            </div>

                            <div class="col-md-8">
                              <label>Title</label>
                              <input class="form-control" type="text" name="title" value="<?php echo $row['title'] ?>" required/>

                              <label class="pt-2">Content</label>
                              <textarea name="content" class="form-control" rows="15" required><?php echo $row['content'] ?></textarea>

                              <label class="pt-2">Select Category</label>
                              <select name="category" class="form-control" required>
                                <?php
                                $sqlQ_for_category = "Select * from categories";
                                $results_category = $conn->query($sqlQ_for_category);

                                if ($results_category->num_rows > 0) {
                                  while ($row_category = $results_category->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row_category['id'] ?>" id="category_<?php echo $row['id'] ?>_<?php echo $row_category['id'] ?>"><?php echo $row_category['name'] ?></option>
                                    <?php
                                  }
                                }
                                ?>
                              
                              </select>

                              <script>
                                document.getElementById("category_<?php echo $row['id'] ?>_<?php echo $row['type'] ?>").selected = true;
                              </script>


                            </div>
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="edit-blog-post">Save changes</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>


                <!-- Delete function -->

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModel_<?php echo $row['id'] ?>">
                Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteModel_<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are your sure you want to delete this record?
                      </div>
                      <form action="handler.php?id=<?php echo $row['id']; ?>" method="POST">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-primary" name="delete-blog-post">Yes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>





              </td>
            </tr>



            <?php
          }
        }
        ?>
      </table>

    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>