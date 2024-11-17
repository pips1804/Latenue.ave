<?php
include_once "../../admin_panel/config/dbconnect.php";
session_start();

if (isset($_POST['upload'])) {
    $user_id = $_SESSION['user_id'];
    $recipient_name = $_POST['recipient_name'];
    $contact_number = $_POST['contact_number'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $municipality = $_POST['municipality'];
    $province = $_POST['province'];
    $postcode = $_POST['postcode'];
    $payment_method_id = $_POST['payment_method_id'];
    $subtotal = $_POST['sub_total'];

    $shipping_fee = 100;
    $tax_rate = 0.12;
    $total_amount = ($subtotal * $tax_rate) + $subtotal + $shipping_fee;

    // File upload validation
    if (isset($_FILES['pay_slip']) && $_FILES['pay_slip']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['pay_slip']['tmp_name'];
        $fileName = $_FILES['pay_slip']['name'];
        $fileSize = $_FILES['pay_slip']['size'];
        $fileType = mime_content_type($fileTmpPath);
        $allowedFileTypes = ['image/jpeg', 'image/png', 'image/jpg'];

        // Validate file type and size
        if (in_array($fileType, $allowedFileTypes) && $fileSize <= 5 * 1024 * 1024) { // 5MB limit
            $uploadDir = '../payment_slip/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true); // Create directory if it doesn't exist
            }

            // Sanitize and rename the file
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid('pay_slip_', true) . '.' . $fileExt;
            $destPath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Insert shipping address
                $stmt = $conn->prepare("INSERT INTO shipping_address (ship_add_street, ship_add_barangay, ship_add_municipality, ship_add_province, ship_add_postalcode) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssi", $street, $barangay, $municipality, $province, $postcode);

                if ($stmt->execute()) {
                    $ship_id = $conn->insert_id;

                    // Insert order details
                    $stmt_order = $conn->prepare("INSERT INTO orders (user_id, ship_id, delivered_to, phone_no, payment_method_id, subtotal, total_amount, payment_slip) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt_order->bind_param("iissidss", $user_id, $ship_id, $recipient_name, $contact_number, $payment_method_id, $subtotal, $total_amount, $newFileName);

                    if ($stmt_order->execute()) {
                        $order_id = $conn->insert_id;

                        // Handle cart items
                        $cart_sql = "SELECT variation_id, quantity FROM cart WHERE user_id = ?";
                        $stmt_cart = $conn->prepare($cart_sql);
                        $stmt_cart->bind_param("i", $user_id);
                        $stmt_cart->execute();
                        $result_cart = $stmt_cart->get_result();

                        while ($row_cart = $result_cart->fetch_assoc()) {
                            $variation_id = $row_cart['variation_id'];
                            $quantity = $row_cart['quantity'];

                            // Insert into order_details
                            $stmt_order_details = $conn->prepare("INSERT INTO order_details (order_id, variation_id, quantity) VALUES (?, ?, ?)");
                            $stmt_order_details->bind_param("iii", $order_id, $variation_id, $quantity);
                            $stmt_order_details->execute();

                            // Update stock
                            $stmt_update_stock = $conn->prepare("UPDATE product_size_variation SET quantity_in_stock = quantity_in_stock - ? WHERE variation_id = ?");
                            $stmt_update_stock->bind_param("ii", $quantity, $variation_id);
                            $stmt_update_stock->execute();
                            $stmt_update_stock->close();
                        }

                        $stmt_order_details->close();

                        // Clear cart
                        $clear_cart_sql = "DELETE FROM cart WHERE user_id = ?";
                        $stmt_clear_cart = $conn->prepare($clear_cart_sql);
                        $stmt_clear_cart->bind_param("i", $user_id);
                        $stmt_clear_cart->execute();
                        $stmt_clear_cart->close();

                        header("Location: ../mainpage.php?order=success");
                    } else {
                        echo "Error inserting into orders: " . $stmt_order->error;
                    }
                    $stmt_order->close();
                } else {
                    echo "Error inserting into shipping_address: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error moving uploaded file.";
            }
        } else {
            echo "Invalid file type or size. Only JPEG/PNG files under 5MB are allowed.";
        }
    } else {
        echo "Error uploading file: " . $_FILES['pay_slip']['error'];
    }
}
