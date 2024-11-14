<?php
include '../../admin_panel/config/dbconnect.php';
session_start();

if (isset($_POST["verify"])) {
    $session_email = $_SESSION["email"];
    $input_email = $_POST["email"];
    $verification_code = $_POST["verification_code"];

    // Check if the input email matches the session email
    if ($session_email == $input_email) {
        $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $session_email . "' AND verification_code = '" . $verification_code . "'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == 0) {
            header("Location: ../index.php?code=notmatched");
            exit();
        }

        header("Location: ../index.php?code=matched");
        exit();
    } else {
        // Redirect if the emails do not match
        header("Location: ../index.php?code=emailmismatch");
        exit();
    }
}
