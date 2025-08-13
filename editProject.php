
<?php
require('config/conn.php');
$valid['success'] = array('success' => false, 'messages' => array());
error_reporting(0);
if ($_POST) {
	$date1 = $_POST['edit_date1'];	    
    $p_id = $_POST['edit_p_id'];
	$sql = "SELECT * FROM project_allocation WHERE e_date='$date1'  and status=1 and p_id<>$p_id";
	$result = $connect->query($sql);
	$row_cnt = $result->num_rows;	
	if ($row_cnt == 0) {
        $sql = "UPDATE project_allocation SET e_date = '$date1',approved_status='0' WHERE p_id=$p_id";
        if ($connect->query($sql) === TRUE) {                   
            $success = 1;                        
        } else {                    
            $success = 0;            
        }
	}	
    else{
        $success = 2;
    }				
	$connect->close();
	echo json_encode($success);
} // /if $_POST
?>