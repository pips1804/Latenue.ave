<?php
include_once "../config/dbconnect.php";

$b_id = $_POST['b_id'];
$bank_name = $_POST['bname'];
$first_name = $_POST['fname'];
$middle_name = $_POST['mname'];
$last_name = $_POST['lname'];
$bank_number = $_POST['bnum'];

$updateBank = mysqli_query($conn, "UPDATE bank_account_info SET
        bank_name='$bank_name',
        first_name='$first_name',
        last_name='$last_name',
        middle_name='$middle_name',
        bank_acct_no='$bank_number'
        WHERE bank_id=$b_id");


if ($updateBank) {
    echo "true";
}
