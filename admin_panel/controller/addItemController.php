<?php
include_once "../config/dbconnect.php";
if (isset($_POST['upload'])) {
    $ProductName = $_POST['p_name'];
    $desc = $_POST['p_desc'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier'];
    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $location = "./uploads/";
    $image = $location . $name;
    $target_dir = "../uploads/";
    $finalImage = $target_dir . $name;
    move_uploaded_file($temp, $finalImage);
    $insert = mysqli_query($conn, "INSERT INTO product
         (product_name,product_image,product_desc,category_id,supplier_id) 
         VALUES ('$ProductName','$image','$desc','$category','$supplier')");
    if (!$insert) {
        echo mysqli_error($conn);
    } else {
        echo "Records added successfully.";
    }
}
