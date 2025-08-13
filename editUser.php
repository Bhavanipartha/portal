<?php
require('config/conn.php');
$valid['success'] = array('success' => false, 'messages' => array());
error_reporting(0);
if ($_POST) {
    $user = $_POST['edit_username']; 
    $role = $_POST['edit_role'];
    $job = $_POST['edit_designation'];
    $head = $_POST['edit_supervisor'];
    $user_id = $_POST['edit_user_id'];
    $sql = "SELECT * from users where username='$user'  and role='$role'  and designation='$job' 
     and supervisor='$head' and status=1 and user_id<>$user_id";
    $result = $connect->query($sql);
    $row_cnt = $result->num_rows;
    if ($row_cnt == 0) {
        $sql = "UPDATE users set username='$user', role='$role' , designation='$job' 
        ,supervisor='$head' where user_id=$user_id";
          $sql1 = "UPDATE employee_details set email='$user', role='$role' , designation='$job' 
        ,supervisor='$head' where e_id=$user_id";
          $result1 = $connect->query($sql);
          $result2 = $connect->query($sql1);
        if (($result1 && $result2 )=== TRUE) {
            $success = 1;
        } else {
            $success = 0;
        }
    } else {
        $success = 2;
    }
    $connect->close();
    echo json_encode($success);
} // /if $_POST