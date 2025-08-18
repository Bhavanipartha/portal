<?php
require 'config/conn.php';
header('Content-Type: application/json');

$role = $_POST['role'] ?? '';
$current_name = trim($_POST['current_name'] ?? '');

$allowedRoles = [];

// If Employee → show all S-Employee
if ($role === 'Employee') {
    $allowedRoles = ['S-Employee'];

// If S-Employee → show Super-admin + S-Employee except his own name
} elseif ($role === 'S-Employee') {
    $allowedRoles = ['S-Employee', 'Super-admin'];
} else {
    echo json_encode([]);
    exit;
}

// Build placeholders (?,?)
$placeholders = implode(',', array_fill(0, count($allowedRoles), '?'));
$types = str_repeat('s', count($allowedRoles));
$params = $allowedRoles;

$sql = "SELECT name FROM users WHERE role IN ($placeholders) AND status = 1";

// Exclude self only if role = S-Employee
if ($role === 'S-Employee' && $current_name !== '') {
    $sql .= " AND LOWER(TRIM(name)) <> LOWER(?)";
    $types .= 's';
    $params[] = $current_name;
}

// ✅ Exclude names that are just a dash "-"
$sql .= " AND TRIM(name) <> '-'";

$sql .= " ORDER BY name ASC";

$stmt = $connect->prepare($sql);
if (!$stmt) {
    error_log("Prepare failed: " . $connect->error);
    echo json_encode([]);
    exit;
}

if (!$stmt->bind_param($types, ...$params)) {
    error_log("Bind failed: " . $stmt->error);
}

if (!$stmt->execute()) {
    error_log("Execute failed: " . $stmt->error);
}

$result = $stmt->get_result();

$supervisors = [];
while ($row = $result->fetch_assoc()) {
    $supervisors[] = trim($row['name']);
}

echo json_encode($supervisors);
mysqli_close($connect);
