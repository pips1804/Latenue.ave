<?php
session_start();
include_once "../../admin_panel/config/dbconnect.php";

if (isset($_POST['upload'])) {

    $v_id = $_POST['v_id'];
    settype($v_id, "integer");
    echo gettype($v_id);
    echo $v_id;
    $user_id = $_SESSION['user_id'];


    $insert = mysqli_query($conn, "INSERT INTO cart
         (variation_id, user_id)    
         VALUES ('$v_id','$user_id' )");

    if (!$insert) {
        echo mysqli_error($conn);
        header("Location: ../mainpage.php?cart=error");
    } else {
        header("Location: ../mainpage.php?cart=success");
    }
}
