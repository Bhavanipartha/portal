<?php
require('config/conn.php');
$valid['success'] = array('success' => false, 'messages' => array());
error_reporting(0);
if ($_POST) {	
    $a_id = $_POST['id'];	
    $sql = "UPDATE employee_attendance set approved_status = 2 where a_id=$a_id";
    
    if ($connect->query($sql) === TRUE ) {                   
        $success = 1;                        
    } else {                    
        $success = 0;            
    }				
	$connect->close();
	echo json_encode($success);
} // /if $_POST