<?php
 //fetch.php
require('config/conn.php');
error_reporting(0);
if(isset($_POST["user_id"]))
{        
      $user_id=intval($_POST["user_id"]);  
      $sql="SELECT * from users where user_id=".$user_id;
      $result= $connect->query($sql);
      $row= $result -> fetch_assoc();         
      echo json_encode($row);
 }
  mysqli_close($connect);
