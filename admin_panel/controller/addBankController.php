<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {

    $bank_name = $_POST['b_name'];
    $first_name = $_POST['f_name'];
    $middle_name = $_POST['m_name'];
    $last_name = $_POST['l_name'];
    $bank_number = $_POST['b_number'];

    $insert = mysqli_query($conn, "INSERT INTO bank_account_info
         (bank_name, first_name, middle_name, last_name, bank_acct_no)
         VALUES ('$bank_name', '$first_name', '$middle_name', '$last_name', '$bank_number')");

    if (!$insert) {
        echo mysqli_error($conn);
        header("Location: ../sidebar.php?category=error");
    } else {
        header("Location: ../admin.php?category=success");
    }
}
