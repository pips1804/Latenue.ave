<?php
include '../../admin_panel/config/dbconnect.php';
session_start();

if (isset($_POST["verify"])) {

    $input_email = $_POST["verify-email"];
    $verification_code = $_POST["verification_code"];
    $getemail = $conn->prepare("SELECT email FROM users WHERE email=? AND email_verified_at IS NULL");
    $getemail->bind_param("s", $input_email);
    $getemail->execute();
    $result = $getemail->get_result();

    if ($result->num_rows > 0) {
        $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $input_email. "' AND verification_code = '" . $verification_code . "'";
        $result1 = mysqli_query($conn, $sql);

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
