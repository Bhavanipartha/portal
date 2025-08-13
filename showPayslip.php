<?php
 //fetch.php
require('config/conn.php');
error_reporting(0);
if(isset($_POST["e_id"]))
{        
      $e_id=intval($_POST["e_id"]);  
      $sql="SELECT * from employee_details where e_id=".$e_id;
      $result= $connect->query($sql);
      $row= $result -> fetch_assoc();         
      echo json_encode($row);
 }
  mysqli_close($connect);
 ?>