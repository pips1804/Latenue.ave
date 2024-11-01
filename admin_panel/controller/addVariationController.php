<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {

    $product = $_POST['product'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];
    $unit_price = $_POST['unit_price'];

    $insert = mysqli_query($conn, "INSERT INTO product_size_variation
         (product_id,size_id,quantity_in_stock,unit_price) VALUES ('$product','$size','$qty','$unit_price')");

    if (!$insert) {
        echo mysqli_error($conn);
        header("Location: ../admin.php?variation=error");
    } else {
        echo "Records added successfully.";
        header("Location: ../admin.php?variation=success");
    }
}
