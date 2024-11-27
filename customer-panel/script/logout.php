<?php
session_start();
include '../../admin_panel/config/dbconnect.php';

function logLogout()
{
    global $conn;
    $user_id = $_SESSION['user_id'];
    $session_id = $_SESSION['session_id'];

    if (isset($_SESSION['user_log_id'])) {

        $log = $conn->prepare("INSERT INTO user_sessions (user_id, session_id, status) VALUES (?, ?, 'logout')");
        $log->bind_param("is", $user_id, $session_id);
        $log->execute();

        unset($_SESSION['user_log_id']);
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['first_name']);
        header("Location: ../../landing-page/index.php?logout=success");
        exit();
    }
}

logLogout();

