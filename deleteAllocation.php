<?php
session_start();
require 'config/conn.php'; // Database connection
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['p_id'])) {
    $p_id = intval($_POST['p_id']); // Sanitize input

    $stmt = $connect->prepare("DELETE FROM project_allocation WHERE p_id = ?");
    $stmt->bind_param("i", $p_id);

    if ($stmt->execute()) {
        echo json_encode(1); // ✅ success
    } else {
        echo json_encode(0); // ❌ query failed
    }

    $stmt->close();
} else {
    echo json_encode(0); // ❌ invalid request or missing ID
}

$connect->close();
?>
