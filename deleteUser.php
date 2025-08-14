<?php
require('config/conn.php');
$valid['success'] = array('success' => false, 'messages' => array());
error_reporting(0);

if ($_POST) {
    $user_id = intval($_POST['user_id']); // sanitize

    // First update in users table
    $sql_users = "UPDATE users SET status = 0 WHERE user_id = $user_id";
    $success_users = $connect->query($sql_users);

    // Then update in employee_details table
    // Assuming employee_details.e_id matches users.user_id
    $sql_employee = "UPDATE employee_details SET status = 0 WHERE e_id = $user_id";
    $success_employee = $connect->query($sql_employee);

    if ($success_users && $success_employee) {
        $success = 1;
    } else {
        $success = 0;
    }

    $connect->close();
    echo json_encode($success);
}
?>
