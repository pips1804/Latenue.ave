<?php
session_start();
include 'config/dbconnect.php';

function logLogout()
{
    global $conn;
    $user_id = $_SESSION['admin_user_id'];
    $session_id = $_SESSION['session_id'];

    if (isset($_SESSION['admin_log_id'])) {

        $log = $conn->prepare("INSERT INTO user_sessions (user_id, session_id, status) VALUES (?, ?, 'logout')");
        $log->bind_param("is", $user_id, $session_id);
        $log->execute();

        unset($_SESSION['admin_log_id']);
        unset($_SESSION['admin_user_id']);
        unset($_SESSION['admin_user_email']);
        unset($_SESSION['admin_first_name']);
        header("Location: ../landing-page/index.php?logout=success");
        exit();
    }
}

logLogout();
