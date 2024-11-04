<?php
session_start();
include '../../admin_panel/config/dbconnect.php';

if (isset($_POST['admin-login'])) {


    $email = $_POST['admin-email'];
    $password = $_POST['admin-password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND password=? AND users.isAdmin = 1");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: ../../admin_panel/admin.php");
        exit();
    } else {
        header("Location: ../index.php?login=error");
    }

    $stmt->close();
    $conn->close();
}
