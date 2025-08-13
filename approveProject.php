<?php
require('config/conn.php');
$valid['success'] = array('success' => false, 'messages' => array());
error_reporting(0);
if ($_POST) {	
    $p_id = $_POST['id'];	
    $sql = "UPDATE project_allocation set approved_status = 1 where p_id=$p_id";
    
    if ($connect->query($sql) === TRUE ) {                   
        $success = 1;                        
    } else {                    
        $success = 0;            
    }				
	$connect->close();
	echo json_encode($success);
} // /if $_POST