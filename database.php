<?php

$hostname  = "localhost";
$username = "root";
$password = "";
$databaseName = "blog";

//Instance of the class 'mysqli'
//Its a built in PHP class that we can use to connect to database
$conn = new mysqli($hostname, $username, $password, $databaseName);


//If any error, print msg
if($conn->connect_error){
    echo "Connection failed: " . $conn->connect_error;
}


?>