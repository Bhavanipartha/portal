<?php
require('config/conn.php');
error_reporting(0);
header('Content-Type: application/json');
ob_clean();

// Check if POST request is received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Required fields
    $p_id      = isset($_POST['edit_p_id']) ? (int)$_POST['edit_p_id'] : 0;
    $prj_name  = $_POST['edit_prj_name'] ?? '';
    $s_date    = $_POST['edit_s_date'] ?? '';
    $e_date    = $_POST['edit_e_date'] ?? '';
    $name      = $_POST['edit_name'] ?? '';

    if ($p_id === 0 || empty($prj_name) || empty($s_date) || empty($e_date) || empty($name)) {
        echo json_encode(0); // Missing data
        exit;
    }

    // ✅ Check for duplicate end date (excluding this record)
    $checkSql = "SELECT p_id FROM project_allocation 
                 WHERE e_date = ? AND status = 1 AND p_id <> ?";
    $checkStmt = $connect->prepare($checkSql);
    $checkStmt->bind_param("si", $e_date, $p_id);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        echo json_encode(2); // Duplicate end date
        exit;
    }

    // ✅ Perform update
    $updateSql = "UPDATE project_allocation 
                  SET prj_name = ?, s_date = ?, e_date = ?, name = ?, approved_status = 0 
                  WHERE p_id = ?";
    $updateStmt = $connect->prepare($updateSql);
    $updateStmt->bind_param("ssssi", $prj_name, $s_date, $e_date, $name, $p_id);

    if ($updateStmt->execute()) {
        echo json_encode(1); // Success
    } else {
        echo json_encode(0); // Failed
    }

    $updateStmt->close();
    $checkStmt->close();
    $connect->close();
    exit;
} else {
    echo json_encode(['error' => 'Invalid request method']);
    exit;
}
?>
