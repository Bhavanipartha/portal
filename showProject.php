<?php
 //fetch.php
require('config/conn.php');
error_reporting(0);
if(isset($_POST["p_id"]))
{        
      $p_id=intval($_POST["p_id"]);  
      $sql="SELECT * from project_allocation where p_id=".$p_id;
      $result= $connect->query($sql);
      $row= $result -> fetch_assoc();         
      echo json_encode($row);
 }
  mysqli_close($connect);
 ?>