<?php
header('Content-Type: application/json');
include('config/conn.php');

$response = ['status' => 'error', 'message' => 'Unknown error'];

$user = $_POST['username'];
$pass = $_POST['password'];
$role = $_POST['role'];
$job = $_POST['designation'];
$pay = $_POST['salary'];
$head = $_POST['supervisor'];
$name = $_POST['name'];
$addr = $_POST['address'];
$dob = $_POST['dob'];
$pan = $_POST['pan'];
$mobile = $_POST['mobile'];
$date = $_POST['eff_date'];
$photo = $_POST['photo_path'];
$location = $_POST['location'];
$currency = $_POST['currency'];

// Check duplicate username
$checkUser = "SELECT username FROM users WHERE username = '$user' LIMIT 1";
$result = mysqli_query($connect, $checkUser);

if (mysqli_num_rows($result) > 0) {
    $response['message'] = 'Username already exists!';
    echo json_encode($response);
    exit;
}

// Insert employee details
$sql = "INSERT INTO employee_details(
    name, mobile, dob, pan, address, location, photo_path, eff_date, email, 
    designation, salary, supervisor, status, role, currency
) VALUES (
    '$name','$mobile','$dob','$pan','$addr','$location','$photo','$date','$user',
    '$job', '$pay', '$head', 1, '$role', '$currency'
)";

if (mysqli_query($connect, $sql)) {
    // Insert into users
    $paymentsql = "INSERT INTO `users`(
        `username`, `password`, `role`, `name`, `status`, `designation`, 
        `salary`, `supervisor`, `currency`
    ) VALUES (
        '$user','$pass','$role','$name',1,'$job','$pay','$head','$currency'
    )";

    mysqli_query($connect, $paymentsql);
    $response = ['status' => 'success', 'message' => 'Record inserted successfully!'];
} else {
    $response['message'] = 'Error inserting record: ' . mysqli_error($connect);
}

echo json_encode($response);
exit;
?>
