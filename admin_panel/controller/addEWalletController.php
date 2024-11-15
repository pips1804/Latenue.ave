<?php
include_once "../config/dbconnect.php";
if (isset($_POST['upload'])) {
    $e_name = $_POST['e_name'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $l_name = $_POST['l_name'];
    $e_num = $_POST['e_num'];
    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $location = "./payments/";
    $image = $location . $name;
    $target_dir = "../payments/";
    $finalImage = $target_dir . $name;
    move_uploaded_file($temp, $finalImage);
    $insert = mysqli_query($conn, "INSERT INTO e_wallet_info
         (e_wallet_name,last_name,first_name,middle_name,e_wallet_no,e_wallet_qrcode)
         VALUES ('$e_name','$l_name','$f_name','$m_name','$e_num' , '$image')");
    if (!$insert) {
        echo mysqli_error($conn);
    } else {
        echo "Records added successfully.";
    }
}
