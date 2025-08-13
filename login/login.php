<?php
session_start();
require '../config/conn.php';

$Username = $_POST['username'];
$Password = $_POST['password'];
$_SESSION['uname'] = $Username;

$find_query = "SELECT * FROM `users` WHERE `username` ='$Username' AND `password`='$Password'";
$result = mysqli_query($connect, $find_query);
if(mysqli_num_rows($result) > 0 ) {
    while($row = mysqli_fetch_array($result)) {
        $_SESSION['uname'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        echo "<script> window.location.href='../dashboard.php' </script>";
    }
}
else {
    echo "<script>alert('Incorrect Username or Password')</script>";
    echo "<script> window.location.href='../index.html' </script>";
}
?>