<?php
session_start();
include '../../admin_panel/config/dbconnect.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND password=? AND users.isAdmin = 0");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $checkifadmin = $conn->prepare("SELECT * FROM users WHERE email=? AND password=? AND users.isAdmin = 1");
    $checkifadmin->bind_param("ss", $email,$password);
    $checkifadmin->execute();
    $result1 = $checkifadmin->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: ../../customer-panel/mainpage.php");
        exit();
    }
    else {
        if($result1->num_rows>0){
            header("Location: ../index.php?login=error1");
        }

        else{
        header("Location: ../index.php?login=error");
        }
    }

    $stmt->close();
    $conn->close();
}
