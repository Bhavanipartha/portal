<?php
require('config/conn.php');
header('Content-Type: application/json');
error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["p_id"])) {
    $p_id = intval($_POST["p_id"]);

    // Prepare statement to fetch allocation
    $stmt = $connect->prepare("SELECT * FROM project_allocation WHERE p_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $p_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            echo json_encode($row);
        } else {
            echo json_encode(['error' => 'No allocation found']);
        }

        $stmt->close();
    } else {
        echo json_encode(['error' => 'Query preparation failed']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}

$connect->close();
?>
