<?php
require('config/conn.php');
error_reporting(0);

header('Content-Type: application/json');

if (isset($_POST["p_id"])) {        
    $p_id = intval($_POST["p_id"]);

    $stmt = $connect->prepare("SELECT * FROM project_allocation WHERE p_id = ?");
    $stmt->bind_param("i", $p_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    echo json_encode($row);

    $stmt->close();
}

$connect->close();
?>
