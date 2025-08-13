<?php
require './config/conn.php';
error_reporting(0);
session_start();
$prj1 =$_POST['prj1'];
$prj2=$_POST['prj2'];
$prj3=$_POST['prj3'];
$a1 = $_POST['a1'];
$b1 = $_POST['b1'];
$c1 = $_POST['c1'];
$d1 = $_POST['d1'];
$e1 = $_POST['e1'];
$a2 = $_POST['a2'];
$b2 = $_POST['b2'];
$c2 = $_POST['c2'];
$d2 = $_POST['d2'];
$e2 = $_POST['e2'];
$a3 = $_POST['a3'];
$b3 = $_POST['b3'];
$c3 = $_POST['c3'];
$d3 = $_POST['d3'];
$e3 = $_POST['e3'];
$a4 = $_POST['a4'];
$b4 = $_POST['b4'];
$c4 = $_POST['c4'];
$d4 = $_POST['d4'];
$e4 = $_POST['e4'];
$tot = $_POST['g4'];
$id = $_POST['t_id'];
	
  $sql = "UPDATE timesheet set prj1='$prj1',prj2='$prj2',prj3='$prj3',
  a1='$a1',b1='$b1',c1='$c1', d1='$d1',e1='$e1',a2='$a2',b2='$b2',c2='$c2', d2='$d2',e2='$e2',
  a3='$a3',b3='$b3',c3='$c3', d3='$d3',e3='$e3',a4='$a4',b4='$b4',c4='$c4', d4='$d4',e4='$e4',
  total_hrs='$tot'  where t_id='$id'";
  $insertR = mysqli_query($connect,$sql);
  
 // Output the SQL query for debugging
        echo "SQL Query: $sql";

        // Execute the query
        $insertR = mysqli_query($connect, $sql);

        if ($insertR) {
            // If successful, display a success message using JavaScript
            echo "<script>alert('Timesheet updated successfully');</script>";
            echo "<script>window.location.href='approveTimesheet.php'</script>";
        } else {
            // If not successful, display an error message using JavaScript
            echo "<script>alert('Error updating record: " . mysqli_error($connect) . "');</script>";
        }

?>






