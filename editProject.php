<?php
require('config/conn.php');
error_reporting(0);
header('Content-Type: application/json'); // ✅ tell browser it's JSON
ob_clean(); // ✅ clear anything accidentally printed before

if ($_POST) {
    $p_id = (int)$_POST['edit_p_id'];
    $prj_name = mysqli_real_escape_string($connect, $_POST['edit_prj_name']);
    $s_date = mysqli_real_escape_string($connect, $_POST['edit_s_date']);
    $e_date = mysqli_real_escape_string($connect, $_POST['edit_e_date']);
    $name = mysqli_real_escape_string($connect, $_POST['edit_name']);

    $sql = "SELECT * FROM project_allocation 
            WHERE e_date = '$e_date' AND status = 1 AND p_id <> $p_id";
    $result = $connect->query($sql);
    $row_cnt = $result->num_rows;    

    if ($row_cnt == 0) {
        $sql = "UPDATE project_allocation 
                SET 
                    prj_name = '$prj_name',
                    s_date = '$s_date',
                    e_date = '$e_date',
                    name = '$name',
                    approved_status = '0'
                WHERE p_id = $p_id";

        $success = ($connect->query($sql) === TRUE) ? 1 : 0;
    } else {
        $success = 2;
    }

    $connect->close();
    echo json_encode($success); // ✅ send only JSON
    exit;
}
?>
