<?php

include_once "../config/dbconnect.php";

$b_id = $_POST['record'];
$query = "DELETE FROM bank_account_info where bank_id='$b_id'";

$data = mysqli_query($conn, $query);

if ($data) {
    echo "Bank Account Details Deleted";
} else {
    echo "Not able to delete";
}
