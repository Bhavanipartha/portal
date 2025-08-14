<?php
// deleteProject.php
session_start();
require 'config/conn.php'; // your DB connection

if (isset($_POST['p_id'])) {
    $p_id = intval($_POST['p_id']); // sanitize input

    // Delete the full project row
    $stmt = $connect->prepare("DELETE FROM project_allocation WHERE p_id = ?");
    $stmt->bind_param("i", $p_id);

    if ($stmt->execute()) {
        echo 1; // success
    } else {
        echo 0; // failure
    }

    $stmt->close();
} else {
    echo 0; // no p_id sent
}
?>
