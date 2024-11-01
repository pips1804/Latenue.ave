<?php
include_once "../config/dbconnect.php";
define('UPLOAD_PATH', '../uploads/');

$product_id = $_POST['product_id'];
$p_name = $_POST['p_name'];
$p_desc = $_POST['p_desc'];
$category = $_POST['category'];
$supplier = $_POST['supplier'];

if (isset($_FILES['newImage'])) {

    $location = "./uploads/";
    $img = $_FILES['newImage']['name'];
    $tmp = $_FILES['newImage']['tmp_name'];
    $dir = '../uploads/';
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
    $image = rand(1000, 1000000) . "." . $ext;
    $final_image = $location . $image;
    if (in_array($ext, $valid_extensions)) {
        $path = UPLOAD_PATH . $image;
        move_uploaded_file($tmp, $dir . $image);
    }
} else {
    $final_image = $_POST['existingImage'];
}
$updateItem = mysqli_query($conn, "UPDATE product SET 
        product_name='$p_name', 
        product_desc='$p_desc', 
        category_id=$category,
        supplier_id=$supplier,
        product_image='$final_image' 
        WHERE product_id=$product_id");


if ($updateItem) {
    echo "true";
}
// else
// {
//     echo mysqli_error($conn);
// }
