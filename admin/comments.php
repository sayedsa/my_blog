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


$sql = "Select comments.*, users.first_name, users.last_name from comments JOIN users where comments.user_id = users.id AND isApproved = 0;";
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

    <?php include "../includes/messages.php" ?>

    <div>
      <table class="table table-bordered table-stripped">
        <tr>
          <th>ID</th>
          <th style="width: 250px">Name</th>
          <th>Comment</th>
          <th style="width: 250px">Actions</th>
        </tr>

        <?php

        if ($results) {
          while ($row = $results->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['first_name'] ?>     <?php echo $row['last_name'] ?></td>
              <td><?php echo $row['comment'] ?></td>
              <td>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approveModel_<?php echo $row['id'] ?>">Approve</button>

                <!-- Modal -->
                <div class="modal fade" id="approveModel_<?php echo $row['id'] ?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are your sure you want to approve this comment?
                      </div>
                      <form action="handler.php?id=<?php echo $row['id']; ?>" method="POST">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-primary" name="approve-comment">Yes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>




                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModel_<?php echo $row['id'] ?>">Delete</button>

                <!-- Modal -->
                <div class="modal fade" id="deleteModel_<?php echo $row['id'] ?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <button type="submit" class="btn btn-primary" name="delete-comment">Yes</button>
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