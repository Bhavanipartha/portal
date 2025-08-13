<?php
require('config/conn.php');
$valid['success'] = array('success' => false, 'messages' => array());
error_reporting(0);
if ($_POST) {	
    $t_id = $_POST['id'];	
    $sql = "UPDATE timesheet set approved_status = 2 where t_id=$t_id";
    
    if ($connect->query($sql) === TRUE ) {                   
        $success = 1;                        
    } else {                    
        $success = 0;            
    }				
	$connect->close();
	echo json_encode($success);
} // /if $_POST