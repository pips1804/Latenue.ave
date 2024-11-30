<?php
include_once "./config/dbconnect.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT CONCAT(YEAR(order_date), '-W', WEEK(order_date)) AS week,
               SUM(total_amount) AS total_sales
        FROM orders
        GROUP BY YEAR(order_date), WEEK(order_date)
        ORDER BY YEAR(order_date), WEEK(order_date)";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);
