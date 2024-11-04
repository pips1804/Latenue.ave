<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {

    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $insert = mysqli_query($conn, "INSERT INTO users
         (first_name, last_name, email, password, isAdmin) 
         VALUES ('$first_name', '$last_name', '$email', '$password', 1)");

    if (!$insert) {
        echo mysqli_error($conn);
        header("Location: ../sidebar.php?category=error");
    } else {
        header("Location: ../admin.php?category=success");
    }
}
