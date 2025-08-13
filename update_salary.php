<?php
require './config/conn.php';
error_reporting(0);
session_start();

$id=$_POST['id'];
$npay=$_POST['npay'];
$edate = $_POST['edate'];
$sql= "SELECT * FROM employee_details WHERE e_id='$id'";
$result = mysqli_query($connect,$sql);
$n=$result->num_rows;
if($n !== 0)
{
  $row=mysqli_fetch_assoc($result);
  $npay1 = $row['salary'];
  $edate1 = $row['eff_date'];  
  $a=array($npay1);
  $b=array($edate1);
  $c=array($npay);
  $d=array($edate); 
  $ee=array_merge($a,$c);
  $ff=array_merge($b,$d);
  $xx=implode(",",$ee);
  $yy=implode(",",$ff);
 
}     
	
  $insertQ = "UPDATE employee_details set salary='$xx',eff_date='$yy' where e_id='$id' ";
  $insertR = mysqli_query($connect,$insertQ);
  
  if ($insertR) {   



    // If successful, display a success message using JavaScript
    echo "<script>alert('Record inserted successfully');</script>";
    echo "<script>window.location.href='updateSalary.php'</script>";
  } else {
    // If not successful, display an error message using JavaScript
    echo "<script>alert('Error inserting record: " . mysqli_error($con) . "');</script>";
  }
?>