<?php 
session_start();
include 'database.php' 

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>My Blog</title>
  </head>
  <body>
    <?php include 'includes/header.php' ?>
    <?php include "includes/messages.php" ?>


    <div class="container">
      <div class="row mt-4">

      <?php
        $sql = "SELECT blog_posts.*, categories.name FROM blog_posts JOIN categories ON type = categories.id";
        $results = $conn->query($sql);

        if($results){
          if($results->num_rows > 0){
            while ($row = $results->fetch_assoc()) {
              ?>
                <div class="col-md-4 mb-3">
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




    



    <?php include 'includes/footer.php' ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>