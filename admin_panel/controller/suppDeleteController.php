<?php

include_once "../config/dbconnect.php";

$s_id = $_POST['record'];
$query = "DELETE FROM supplier where supplier_id='$s_id'";

$data = mysqli_query($conn, $query);

if ($data) {
    echo "Supplier Deleted";
} else {
    echo "Not able to delete";
}
