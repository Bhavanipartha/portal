
<?php
require('config/conn.php');
$valid['success'] = array('success' => false, 'messages' => array());
error_reporting(0);
if ($_POST) {
	$name = $_POST['edit_name'];	
    $super=$_POST['edit_supervisor'];
    $job=$_POST['edit_designation'];
    $pay=$_POST['edit_salary'];
    $e_id = $_POST['edit_e_id'];
	$sql = "SELECT * FROM employee_details WHERE name='$name' and supervisor ='$super' and designation='$job' and salary ='$pay' and  status=1 and e_id<>$e_id";
	$result = $connect->query($sql);
	$row_cnt = $result->num_rows;	
	if ($row_cnt == 0) {
        $sql = "UPDATE employee_details SET name = '$name',supervisor='$super', designation='$job', salary = '$pay' WHERE e_id=$e_id";
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