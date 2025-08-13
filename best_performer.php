<?php
require './config/conn.php';
error_reporting(0);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['form_token']) || $_POST['form_token'] !== $_SESSION['form_token']) {
        echo "<script>alert('Invalid form submission or duplicate submit.'); window.location.href='best_performer.php';</script>";
        exit;
    }

    // Invalidate token to prevent reuse
    unset($_SESSION['form_token']);

    $p1 = isset($_POST['performer1']) ? trim($_POST['performer1']) : '';
    $p2 = isset($_POST['performer2']) ? trim($_POST['performer2']) : '';
    $month = isset($_POST['month']) ? trim($_POST['month']) : '';

    if (empty($p1) || empty($p2) || empty($month)) {
        echo "<script>alert('All fields are required.'); window.location.href='best_performer.php';</script>";
        exit;
    }

    if ($p1 === $p2) {
        echo "<script>alert('Error: Same person cannot be selected twice.'); window.location.href='best_performer.php';</script>";
        exit;
    }

    // Check if performers already selected for this month
    $checkQ = "SELECT COUNT(*) as cnt FROM best_performers WHERE month='$month'";
    $checkR = mysqli_query($connect, $checkQ);
    $row = mysqli_fetch_assoc($checkR);

    if ($row['cnt'] >= 2) {
        echo "<script>alert('Best performers already selected for $month'); window.location.href='best_performer.php';</script>";
        exit;
    }

    // Insert performers
    $incentive = 500;
    $insert1 = "INSERT INTO best_performers (name, month, incentive) VALUES ('$p1', '$month', $incentive)";
    $insert2 = "INSERT INTO best_performers (name, month, incentive) VALUES ('$p2', '$month', $incentive)";

    $r1 = mysqli_query($connect, $insert1);
    $r2 = mysqli_query($connect, $insert2);

    if ($r1 && $r2) {
        echo "<script>alert('Best performers selected successfully!'); window.location.href='bestPerformer.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error saving best performers.'); window.location.href='bestPerformer.php';</script>";
        exit;
    }
}
?>
