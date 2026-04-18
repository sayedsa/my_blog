<?php
session_start();
include "../database.php";

if(isset($_SESSION['admin_userId'])){
    //echo "Your are logged in";
}
else{
    // If user is not logged in he should be directed to login page and message should be displayed there
    //header("location:index.php");
    $_SESSION['error'] = "You're not logged in, Dont try to be clever";
    echo "<script> window.location.href='/admin/index.php' </script>";
    die;
}



$sql = "Select * from blog_posts";
$results = $conn->query($sql);


$res_users = $conn->query("Select * from users");

$res_coms = $conn->query("Select * from comments");

$res_cats = $conn->query("Select * from categories");

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/admin/assets/css/main.css"/>


    <title>Admin Panel</title>
  </head>
  <body>

    <?php include "includes/sidebar.php" ?>

    <div class="main-container">
        <h1>Admin Panel</h1>

        <div>
            
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="box">
                  <p class="counter"> <?php echo $results->num_rows ?> </p>
                  <p class="info"> Total Blog posts </p>
                </div>
              </div>

              <div class="col-md-6 mb-4">
                <div class="box second-box">
                  <p class="counter"> <?php echo $res_users->num_rows ?> </p>
                  <p class="info"> Total users </p>
                </div>
              </div>

              <div class="col-md-6 mb-4">
                <div class="box third-box">
                  <p class="counter"> <?php echo $res_coms->num_rows ?> </p>
                  <p class="info"> Total Comments </p>
                </div>
              </div>

              <div class="col-md-6 mb-4">
                <div class="box fourth-box">
                  <p class="counter"> <?php echo $res_cats->num_rows ?> </p>
                  <p class="info"> Total Categories </p>
                </div>
              </div>


            </div>


        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>