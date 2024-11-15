<?php
include_once "../config/dbconnect.php";

$u_id = $_POST['u_id'];
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];

$updateAdmin = mysqli_query($conn, "UPDATE users SET
        first_name='$first_name',
        last_name='$last_name',
        email='$email',
        password='$password'
        WHERE user_id=$u_id");


if ($updateAdmin) {
    echo "true";
}
