<?php
session_start();
include 'config/dbconnect.php';

function logLogout()
{
    global $conn;

    if (isset($_SESSION['admin_log_id'])) {

        $stmt = $conn->prepare("UPDATE audit_trail_log SET logout_time = NOW() WHERE log_id = ?");
        $stmt->bind_param("i", $_SESSION['admin_log_id']);
        $stmt->execute();

        unset($_SESSION['admin_log_id']);
        $_SESSION['admin_user_id'];
        $_SESSION['admin_user_email'];
        $_SESSION['admin_first_name'];
        header("Location: ../landing-page/index.php?logout=success");
        exit();
    }
}

logLogout();
