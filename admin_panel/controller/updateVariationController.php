<?php
include_once "../config/dbconnect.php";

$v_id = $_POST['v_id'];
$product = $_POST['product'];
$size = $_POST['size'];
$qty = $_POST['qty'];
$unit_price = $_POST['unit_price'];

$updateItem = mysqli_query($conn, "UPDATE product_size_variation SET 
        product_id=$product, 
        size_id=$size,
        quantity_in_stock=$qty,
        unit_price=$unit_price
        WHERE variation_id=$v_id");


if ($updateItem) {
    echo "true";
}
