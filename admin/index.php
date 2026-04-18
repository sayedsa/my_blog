<?php 
session_start();
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - Login Form</title>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />

  <link rel="stylesheet" href="/admin/assets/css/style.css"/>
  <link rel="stylesheet" href="/assets/css/style.css"/>
</head>

<body class="main-bg">
  <!-- Login Form -->
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card shadow">
          <div class="card-title text-center border-bottom">
            <br>
            <img src="/assets/images/logo.png" width="100px"/>
            <h2 class="p-3">Admin Login</h2>
            <br>
          </div>
          <div class="card-body">

            <!-- Place for error/succces messages -->
            <div>
              <?php include "../includes/messages.php" ?>
            </div>

            <form action="/admin/handler.php" method="POST">
              <div class="mb-4">
                <label for="username" class="form-label">Username/Email</label>
                <input name="email" type="text" class="form-control" id="username" />
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password" />
              </div>
              <div class="mb-4">
                <input type="checkbox" class="form-check-input" id="remember" />
                <label for="remember" class="form-label">Remember Me</label>
              </div>

              
              <div class="d-grid">
                <button name="login-btn" type="submit" class="btn text-light main-bg">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>