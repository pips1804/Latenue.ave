<?php
session_start();
include '../../admin_panel/config/dbconnect.php';

function logLogout()
{
    global $conn;

    if (isset($_SESSION['user_log_id'])) {

        $stmt = $conn->prepare("UPDATE audit_trail_log SET logout_time = NOW() WHERE log_id = ?");
        $stmt->bind_param("i", $_SESSION['user_log_id']);
        $stmt->execute();

        unset($_SESSION['user_log_id']);
        $_SESSION['user_id'];
        $_SESSION['user_email'];
        $_SESSION['first_name'];
        header("Location: ../../landing-page/index.php?logout=success");
        exit();
    }
}

logLogout();

