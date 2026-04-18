<?php
session_start();
include 'database.php';

//Getting the data from forms
//validate it
//Store it in database

if(isset($_POST['register'])){
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    //Validation
    if($password != $password2){
        $_SESSION['error'] = "Password and Confirm password does not match.";
        echo "<script> window.location.href='register.php' </script>";
        die;
    }


    //Validate if password is atleast 6 characters
    if(strlen($password) < 6){
        $_SESSION['error'] = "Password should be atleast 6 characters.";
        echo "<script> window.location.href='register.php' </script>";
        die;
    }



    //Encrypt a users password for security
    $encryped_password =  password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT into users(first_name, last_name, email, password) VALUES('$first_name', '$last_name', '$email', '$encryped_password')";
    $results = $conn->query($sql);

    if($results){
        //Send success messsage to user & redirect user to login page
        $_SESSION['success'] = "Your are registered successfully";
        echo "<script> window.location.href='login.php' </script>";
        die;
    }
    else{
        //Send error message to user and redirect back to register page
        $_SESSION['error'] = "Error Occured";
        echo "<script> window.location.href='register.php' </script>";
        die;
    }
}


//Login functionality
//Checking if login button is pressed
if(isset($_POST['login-btn'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * from users WHERE email = '$email'";
    $results = $conn->query($sql);

    if($results->num_rows > 0){
        $row = $results->fetch_assoc(); // Gets rows data in associative array
        //var_dump($row);

        //echo "User exists";

        if(password_verify($password, $row['password']))
        {
            //echo "<h1>Password matched</h1>";

            $_SESSION['userId'] = $row['id'];
            $_SESSION['email'] = $email;
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];

            $_SESSION['success'] = "You have been logged in";
            echo "<script> window.location.href='index.php' </script>";
            die;

        }
        else{
            $_SESSION['error'] = "Incorrect email or password";
            echo "<script> window.location.href='login.php' </script>";
            die;
        }



    }
    else{
        $_SESSION['error'] = "Incorrect email or password";
        echo "<script> window.location.href='login.php' </script>";
        die;
    }
}



//Check if post comment button is pressed
if(isset($_POST['post-comment'])){
    $userComment = $_POST['comment'];
    $blogId = $_POST['blog-post-id'];

    //Get currenlty logged in user Id
    if(isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
    }


    $sqlQuery = "INSERT INTO comments (comment, user_id, blog_post_id) VALUES('$userComment', '$userId', '$blogId')";
  
    $results = $conn->query($sqlQuery);

    if($results){
        $_SESSION['success'] = "Comment sent for approval successfully";
        echo "<script> window.location.href='blog-post.php?blogId=$blogId' </script>";
        die;
    }
    else{
        echo "Not posted";
    }





}










?>