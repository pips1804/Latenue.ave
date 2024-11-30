<?php
include_once "./config/dbconnect.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DATE_FORMAT(order_date, '%Y-%m') AS month, SUM(total_amount) AS total_sales
        FROM orders
        GROUP BY month
        ORDER BY month";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);
