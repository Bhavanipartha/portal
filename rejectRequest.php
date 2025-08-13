<?php
require('config/conn.php');
$valid['success'] = array('success' => false, 'messages' => array());
error_reporting(0);
if ($_POST) {	
    $sl_id = $_POST['id'];	
    $sql = "UPDATE leave_request set approved_status = 2 where sl_id=$sl_id";
    
    if ($connect->query($sql) === TRUE ) {                   
        $success = 1;                        
    } else {                    
        $success = 0;            
    }				
	$connect->close();
	echo json_encode($success);
} // /if $_POST