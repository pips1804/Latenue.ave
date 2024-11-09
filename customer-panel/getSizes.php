<?php
include_once "../admin_panel/config/dbconnect.php";

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    $sql = "SELECT s.size_id, s.size_name, ps.unit_price
          FROM product_size_variation ps 
          JOIN sizes s ON ps.size_id = s.size_id 
          WHERE ps.product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    $sizes = [];
    while ($row = $result->fetch_assoc()) {
        $sizes[] = $row;
    }

    echo json_encode($sizes);
}
