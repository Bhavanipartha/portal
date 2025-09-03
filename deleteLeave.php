<?php
include('config/conn.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['leave_id'])) {
    $leave_id = intval($_POST['leave_id']);

    // Update status instead of deleting
    $sql = "UPDATE leave_request SET approved_status = 3 WHERE sl_id = $leave_id AND approved_status = 0";

    if ($connect->query($sql) === TRUE) {
        // success, redirect back
        header("Location: manageLeave.php?msg=deleted");
        exit;
    } else {
        echo "Error updating record: " . $connect->error;
    }
} else {
    echo "Invalid request!";
}
?>
