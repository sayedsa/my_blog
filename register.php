<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Login Page</title>
</head>

<body>

    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem; overflow: hidden">
                        <div class="row g-0">

                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="handler.php">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <a href="/">
                                                <img src="/assets/images/logo.png" width="100px" />
                                            </a>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register a new
                                            account</h5>

                                        <?php include "includes/messages.php" ?>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <input type="text" name="first_name" id="form2Example17"
                                                    class="form-control form-control-lg" required />
                                                <label class="form-label" for="form2Example17">First Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="last_name" id="form2Example17"
                                                    class="form-control form-control-lg" required />
                                                <label class="form-label" for="form2Example17">Last Name</label>
                                            </div>
                                        </div>


                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" id="form2Example17"
                                                class="form-control form-control-lg" required />
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" id="form2Example27"
                                                class="form-control form-control-lg" required />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="password2" id="form2Example27"
                                                class="form-control form-control-lg" required />
                                            <label class="form-label" for="form2Example27">Confirm Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button type="submit" name="register" class="btn btn-dark btn-lg btn-block"
                                                type="button">Register</button>
                                        </div>

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a
                                                href="login.php" style="color: #393f81;">Login here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>


                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="/assets/images/blog.jpg" alt="login form" class="img-fluid h-100"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>