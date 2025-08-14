<?php
include('config/conn.php');

$ltype  = $_POST['ltype'];
$fdate  = $_POST['frdate'];
$tdate  = $_POST['todate'];
$ename  = $_POST['employee_name'];
$reason = $_POST['reason'];

// Format dates
$fdate_formatted = date('d-m-Y', strtotime($fdate));
$tdate_formatted = date('d-m-Y', strtotime($tdate));

// Check for overlap
$check_sql = "
    SELECT 1 
    FROM leave_request 
    WHERE name = '$ename'
    AND (
        (STR_TO_DATE(from_date, '%d-%m-%Y') <= STR_TO_DATE('$tdate_formatted', '%d-%m-%Y') 
        AND STR_TO_DATE(to_date, '%d-%m-%Y') >= STR_TO_DATE('$fdate_formatted', '%d-%m-%Y'))
    )
";

$result = $connect->query($check_sql);

if ($result && $result->num_rows > 0) {
    echo "Duplicate request: You already has a leave request in this date range!";
} else {
    $sql = "INSERT INTO leave_request (leave_type, name, from_date, to_date, reason)
            VALUES ('$ltype', '$ename', '$fdate_formatted', '$tdate_formatted', '$reason')";

    if ($connect->query($sql) === TRUE) {
        echo "Leave request submitted!";
    } else {
        echo "Error inserting record: " . mysqli_error($connect);
    }
}
?>
