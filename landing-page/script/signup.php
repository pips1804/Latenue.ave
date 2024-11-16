<?php

include '../../admin_panel/config/dbconnect.php';
session_start();

if (isset($_POST['sign-up'])) {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phone-number'];

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        header("Location: ../index.php?signup=error");
    } else {
        if ($_POST["password"] === $_POST["repeat-password"]) {

            $address_id = $conn->insert_id;
            $insertUserQuery = "INSERT INTO users(first_name, last_name, email, contact_no, password, address_id)
                                VALUES ('$firstName', '$lastName', '$email', '$phonenumber', '$password', '$address_id')";

                if ($conn->query($insertUserQuery) === TRUE) {
                    $user_id = $conn->insert_id;
                    $_SESSION['first-name'] = $firstName;
                    $_SESSION['email'] = $email;
                    $_SESSION['user_id'] = $user_id;
                    header("Location: send-code.php");
                } else {
                    echo "Error: " . $conn->error;
                }
        } else {
            header("Location: ../index.php?signup=pwnotmatched");
        }
    }
}
