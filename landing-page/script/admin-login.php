<?php
session_start();
include '../../admin_panel/config/dbconnect.php';

function logLogin($user_id)
{
    global $conn;

    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $sessionId = session_id();

    $log = $conn->prepare("INSERT INTO audit_trail_log (user_id, ip_address, session_id) VALUES (?, ?, ?)");
    $log->bind_param("iss", $user_id, $ipAddress, $sessionId);
    $log->execute();

    $_SESSION['log_id'] = $conn->insert_id;
}

if (isset($_POST['admin-login'])) {
    $email = $_POST['admin-email'];
    $password = $_POST['admin-password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();


        if ($row['password'] === $password) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['first_name'] = $row['first_name'];
            logLogin($row['user_id']);

            if ($row['isAdmin'] == 1) {
                header("Location: ../../admin_panel/admin.php");
            } else {
                header("Location: ../index.php?login=error2");
            }
            exit();
        } else {
            header("Location: ../index.php?login=error");
        }
    } else {
        header("Location: ../index.php?login=error");
    }

    $stmt->close();
    $conn->close();
}
