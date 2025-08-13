<?php
 //fetch.php
require('config/conn.php');
error_reporting(0);
if(isset($_POST["id"]))
{        
      $id=intval($_POST["id"]);  
      $sql="SELECT * from project_allocation where id=".$id;
      $result= $connect->query($sql);
      $row= $result -> fetch_assoc();         
      echo json_encode($row);
 }
  mysqli_close($connect);
 ?>