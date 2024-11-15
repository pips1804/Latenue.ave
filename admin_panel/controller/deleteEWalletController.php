<?php

include_once "../config/dbconnect.php";

$e_id = $_POST['record'];
$query = "DELETE FROM e_wallet_info where e_wallet_id='$e_id'";

$data = mysqli_query($conn, $query);

if ($data) {
    echo "Product Item Deleted";
} else {
    echo "Not able to delete";
}
