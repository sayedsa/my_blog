<?php
session_start();
include 'database.php';

$idd = $_GET['blogId']; 


$query1 = "Select * from blog_posts where id = $idd";
$results1 = $conn->query($query1);

$row1 =  $results1->fetch_assoc();






?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Blog Post</title>
  </head>
  <body>
    <?php include 'includes/header.php' ?>
    <?php include "includes/messages.php" ?>


    


    <div class="container mb-5 mt-5">

        <div class="row">
            <!-- Main Content Start -->
            <div class="col-8">
                <img src="/uploads/<?php echo $row1['image']; ?>" width="100%"/>
                <h1><?php echo $row1['title']; ?></h1>
                <div>
                    <?php echo $row1['content'] ?>
                </div>

                <!-- Comment section Start -->
                <div class="mt-5">
                  <h3>Comments Section</h3>
                  <?php

                    if(isset($_SESSION['userId'])){
                      ?>
                        <form action="handler.php" method="POST">
                          <h4>Post your comment</h4>                         
                          <textarea name="comment" class="form-control mb-3" rows="5"></textarea>

                          <!-- Hidden input to send blog Id with the form -->
                          <input type="hidden" name="blog-post-id" value="<?php echo $idd; ?>"/>
                          <input type="submit" name="post-comment" value="Post comment"/>
                        </form>
                      <?php
                    }
                    else{
                      ?>
                        <p>You need to login before you can post comments</p>
                        <a href="login.php">Login</a> or  <a href="register.php">Regiser</a>
                      <?php
                    }

                  ?>

                  <h4 class="mt-4"> All Comments </h4>
                  <?php
                    $sqlQ = "SELECT comments.*, users.first_name, users.last_name FROM `comments` JOIN users on user_id = users.id where blog_post_id = $idd AND isApproved = 1";
                    $commentsResults = $conn->query($sqlQ);

                    if($commentsResults){
                      if($commentsResults->num_rows > 0){
                        while($commentRow  = $commentsResults->fetch_assoc())
                        {
                          ?>
                              <div class="mt-3">
                                <h6 class="text-info"><?php echo $commentRow['first_name'] . " ". $commentRow['last_name'] ?></h6>
                                <p><?php echo $commentRow['comment'] ?></p>
                              </div>
                          <?php
                        }
                      }
                    }
                  ?>


                </div>

            </div>

            <!-- Sidebar Start -->
            <div class="col-4">
                <h2>Related Blog </h2>
                <?php
                    $query = "Select * from blog_posts where type = ". $row1['type'];
                    $results = $conn->query($query);

                    if($results){
                        if($results->num_rows > 0){
                          while ($row = $results->fetch_assoc()) {

                            if($row['id'] == $idd){
                                continue;
                            }

                            ?>
                              <div class="mb-3">
                                <a href="blog-post.php?blogId=<?php echo $row['id'] ?>" class="blog-post">
                                    <img src="/uploads/<?php echo $row['image'] ?>" width="100%"/>
                                    <div class="p-3">
                                      <p class="category"> <?php echo $row['name'] ?> </p>
                                      <h3> <?php echo $row['title'] ?> </h3>
                                      <p> <?php echo substr($row['content'], 0, 150) ?>... </p>
                                      <p> <?php echo $row['created_at'] ?> </p>
                                    </div>
                                </a>
                              </div>
                            <?php
                          }
                        }
                      }

                ?>
            </div>
        </div>

        
    </div>







    <?php include 'includes/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>