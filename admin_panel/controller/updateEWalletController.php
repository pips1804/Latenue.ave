<?php
include_once "../config/dbconnect.php";
define('UPLOAD_PATH', '../payments/');

$e_id = $_POST['e_id'];
$e_name = $_POST['e_name'];
$f_name = $_POST['f_name'];
$m_name = $_POST['m_name'];
$l_name = $_POST['l_name'];
$e_num = $_POST['e_num'];

if (isset($_FILES['newImage'])) {

    $location = "./payments/";
    $img = $_FILES['newImage']['name'];
    $tmp = $_FILES['newImage']['tmp_name'];
    $dir = '../payments/';
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
$updateItem = mysqli_query($conn, "UPDATE e_wallet_info SET
        e_wallet_name='$e_name',
        last_name='$l_name',
        first_name='$f_name',
        middle_name='$m_name',
        e_wallet_no='$e_num',
        e_wallet_qrcode='$final_image'
        WHERE e_wallet_id=$e_id");


if ($updateItem) {
    echo "true";
}
// else
// {
//     echo mysqli_error($conn);
// }
