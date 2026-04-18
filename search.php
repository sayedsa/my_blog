<?php
session_start();
include 'database.php';

$queryy = $_GET['query'];

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Search Result</title>
  </head>
  <body>
    <?php include 'includes/header.php' ?>
    <?php include "includes/messages.php" ?>

    <div class="container">
        <h1 class="text-center mt-4"> Search Results for: <?php echo $queryy; ?></h1>

        <div class="row mt-4">
            <?php
                $sqlQ = "SELECT * FROM `blog_posts` WHERE title LIKE '%$queryy%'";
                $results = $conn->query($sqlQ);
                if($results){
                    if($results->num_rows > 0){
                        while ($row = $results->fetch_assoc()) {
                            ?>
                                <div class="col-md-4 mb-3">
                                    <a href="blog-post.php?blogId=<?php echo $row['id'] ?>" class="blog-post">
                                        <img src="/uploads/<?php echo $row['image'] ?>" width="100%"/>
                                        <div class="p-3">
                                            <h3> <?php echo $row['title'] ?> </h3>
                                            <p> <?php echo substr($row['content'], 0, 150) ?>... </p>
                                            <p> <?php echo $row['created_at'] ?> </p>
                                        </div>
                                    </a>
                                </div>
                            <?php
                        }
                    }
                    else{
                        echo "<p class='text-center p-4'>No Blog Posts in this category.</p>";
                    }
                }
            ?>
        </div>


    </div>
    




    <?php include 'includes/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>