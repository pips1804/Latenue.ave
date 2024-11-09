<?php
// Start session and include the database connection
session_start();
include_once '../../admin_panel/config/dbconnect.php';
$cart_id = intval($_POST['record']);
$user_id = $_SESSION['user_id'];
$query = "DELETE FROM cart where cart_id='$cart_id' and user_id = $user_id";

$data = mysqli_query($conn, $query);

if ($data) {
    echo "Cart Item Deleted";
} else {
    echo "Not able to delete";
}
