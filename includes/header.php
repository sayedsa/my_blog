<?php

$results = $conn->query("Select * from categories");


?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <!-- me-auto: It left align the content -->
     <!-- ms-auto: It Right align the content -->

      <?php
          //user is logged in
          if(isset($_SESSION['userId'])){
            ?>
                <span class="text-success"> Welcome back <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?> </span>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="">My Account</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                </ul>
            <?php
          }
          else{
            ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="login.php">Sign In</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                  </li>
                </ul>
            <?php
          }
      ?>

      
      


    </div>
  </div>
</nav>



<div class="text-center m-2">
    <img src="/assets/images/logo.png" width="100px"/>
    <h2> My Blog </h2>
</div>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>

        <?php 
        if($results->num_rows > 0){
            while($row = $results->fetch_assoc()){
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a>
                    </li>
                <?php
            }
        }
        ?>


        
        
        
      </ul>
      <form class="d-flex" action="search.php" method="GET">
        <input name="query" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>