<?php
include('config/conn.php');

if (isset($_POST['revoke_ids']) && is_array($_POST['revoke_ids'])) {
    $ids = $_POST['revoke_ids'];
    $idList = implode(",", array_map('intval', $ids)); // sanitize

    $sql = "UPDATE leave_request SET approved_status = 0 WHERE sl_id IN ($idList)";
    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Selected requests have been revoked to Pending!'); window.location.href=document.referrer;</script>";
    } else {
        echo "Error updating records: " . $connect->error;
    }
} else {
    echo "<script>alert('No requests selected!'); window.location.href=document.referrer;</script>";
}
?>
