<?php
require './config/conn.php';
error_reporting(0);
session_start();

if ($_POST["pass"] === $_POST["cpass"]) {
    echo "<script> alert(' Entered passwords are same') </script>";
 

 $username=$_POST['username'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];

  $insertQ = "UPDATE users set password='$cpass' where username='$username' ";
  $insertR = mysqli_query($connect,$insertQ);
  
  if ($insertR) {
    
	


    // If successful, display a success message using JavaScript
    echo "<script>alert('Password reset successfull');</script>";
    echo "<script>window.location.href='index.html'</script>";
  } else {
    // If not successful, display an error message using JavaScript
    echo "<script>alert('Error inserting record: " . mysqli_error($con) . "');</script>";
  }
}
else {
   echo "<script> alert(' Please enter same passwords ') </script>";
   echo "<script>window.location.href='forgot_password.php'</script>";
}
?>