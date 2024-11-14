<?php
    
    include '../../admin_panel/config/dbconnect.php';
    session_start();

    if (isset($_POST["verify"]))
    {
        $email = $_SESSION["email"];
        $verification_code = $_POST["verification_code"];
 

        $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);
 
        if (mysqli_affected_rows($conn) == 0)
        {
            header("Location: ../index.php?code=notmatched");
        }

        header("Location: ../index.php?code=matched");
        exit();
    }
 
?>