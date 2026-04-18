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


$sql = "Select * from categories";
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
    <h1>Manage Categories</h1>



    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModel">
      Add New Category
    </button>

    <?php include "../includes/messages.php" ?>

    <!-- Modal -->
    <div class="modal fade" id="addCategoryModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">

        <form action="handler.php" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <lable>Category Name</lable>
              <input name="name" class="form-control" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="add-new-category">Save changes</button>
            </div>
          </div>
        </form>


      </div>
    </div>


    <table class="table table-bordered table-stripped mt-3">
      <tr>
        <th style="width: 70px">ID</th>
        <th>Name</th>
        <th style="width: 350px">Actions</th>
      </tr>

      <?php
      if ($results) {
        while ($row = $results->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td>
              <button class="btn btn-info" data-bs-toggle="modal"
                data-bs-target="#editModel_<?php echo $row['id']; ?>">Edit</button>

              <!-- Edit Model Start here -->
              <div class="modal fade" id="editModel_<?php echo $row['id']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">

                  <form action="handler.php?id=<?php echo $row['id'] ?>" method="POST">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <lable>Category Name</lable>
                        <input name="name" class="form-control" value="<?php echo $row['name'] ?>" required>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit-category">Save changes</button>
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
                          <button type="submit" class="btn btn-primary" name="delete-category">Yes</button>
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



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>