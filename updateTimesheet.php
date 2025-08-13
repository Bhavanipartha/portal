<?php
require('config/conn.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = array('success' => false, 'message' => 'Error updating leave requests.');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selectedEmployees']) && isset($_POST['action'])) {
        $selectedEmployees = is_array($_POST['selectedEmployees']) ? $_POST['selectedEmployees'] : explode(',', $_POST['selectedEmployees']);
        $action = $_POST['action'];
        
        // Set the status based on the action
        $status = ($action === 'approve') ? 1 : (($action === 'reject') ? 2 : 0);

        $placeholders = implode(',', array_fill(0, count($selectedEmployees), '?'));

        $sql = "UPDATE timesheet  SET approved_status = ? WHERE t_id IN ($placeholders) AND approved_status = 0";
        $stmt = mysqli_prepare($connect, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's' . str_repeat('s', count($selectedEmployees)), $status, ...$selectedEmployees);

            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $response['success'] = true;
                $response['message'] = 'Timesheet updated!';
            } else {
                $response['message'] = "Error: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            $response['message'] = "Error: " . mysqli_error($connect);
        }
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
