<?php
session_start();
include '../../admin_panel/config/dbconnect.php';

function logLogout()
{
    global $conn;

    if (isset($_SESSION['log_id'])) {

        $stmt = $conn->prepare("UPDATE audit_trail_log SET logout_time = NOW() WHERE log_id = ?");
        $stmt->bind_param("i", $_SESSION['log_id']);
        $stmt->execute();

        unset($_SESSION['log_id']);
        session_unset();
        session_destroy();
        header("Location: ../../landing-page/index.php?logout=success");
        exit();
    }
}

logLogout();
echo "function not run!";
