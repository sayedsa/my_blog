<?php
session_start();
session_destroy();

session_start();
$_SESSION['success'] = "You are logged out Successfully.";

echo "<script> window.location.href='/admin/index.php' </script>";
?>