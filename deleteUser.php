<?php
require('config/conn.php');
$valid['success'] = array('success' => false, 'messages' => array());
error_reporting(0);
if ($_POST) {
    $user_id = $_POST['user_id'];
    $sql = "UPDATE users set status = 0 where user_id=$user_id";
    if ($connect->query($sql) === TRUE) {
        $success = 1;
    } else {
        $success = 0;
    }
    $connect->close();
    echo json_encode($success);
} // /if $_POST