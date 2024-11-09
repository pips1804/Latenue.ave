<?php
// Start session and include the database connection
session_start();
include_once '../../admin_panel/config/dbconnect.php';

// Check if the ID is set in the POST request
if (isset($_POST['record'])) {
    $cartId = intval($_POST['record']);
    $userId = $_SESSION['user_id']; // Replace with your method of getting the current user ID

    // Ensure the quantity doesn't go below 1
    $sql = "UPDATE cart SET quantity = quantity - 1 
            WHERE user_id = $userId AND cart_id = $cartId AND quantity > 1";
    if ($conn->query($sql) === TRUE) {
        $result = $conn->query("SELECT quantity FROM cart WHERE user_id = $userId AND cart_id = $cartId");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode(['status' => 'success', 'quantity' => $row['quantity']]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to retrieve updated quantity']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update quantity']);
    }
}
