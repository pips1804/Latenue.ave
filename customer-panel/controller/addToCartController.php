<?php
session_start();
include_once "../../admin_panel/config/dbconnect.php";

if (isset($_POST['upload'])) {

    $v_id = $_POST['v_id'];
    settype($v_id, "integer");
    $user_id = $_SESSION['user_id'];

    // $insert = mysqli_query($conn, "INSERT INTO cart
    //      (variation_id, user_id)    
    //      VALUES ('$v_id','$user_id' )");

    // if (!$insert) {
    //     echo mysqli_error($conn);
    //     header("Location: ../mainpage.php?cart=error");
    // } else {
    //     header("Location: ../mainpage.php?cart=success");
    // }

    // Check if the product already exists in the cart
    $check_cart = mysqli_query($conn, "SELECT * FROM cart WHERE variation_id = '$v_id' AND user_id = '$user_id'");

    if (mysqli_num_rows($check_cart) > 0) {
        // If the product exists, update the quantity
        $update = mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE variation_id = '$v_id' AND user_id = '$user_id'");

        if (!$update) {
            echo mysqli_error($conn);
            header("Location: ../mainpage.php?cart=error");
        } else {
            header("Location: ../mainpage.php?cart=success");
        }
    } else {
        // If the product does not exist, insert a new row
        $insert = mysqli_query($conn, "INSERT INTO cart (variation_id, user_id, quantity) VALUES ('$v_id', '$user_id', 1)");

        if (!$insert) {
            echo mysqli_error($conn);
            header("Location: ../mainpage.php?cart=error");
        } else {
            header("Location: ../mainpage.php?cart=success");
        }
    }
}
