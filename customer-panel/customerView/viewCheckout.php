<?php
include_once "../../admin_panel/config/dbconnect.php";

session_start();
?>

<div class="checkout-section">
    <p class="checkout-title">Checkout</p>
    <div class="order-details-container">
        <table class="">
            <!-- <thead>
                <tr>
                    <th class="text-center">Product Image</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center">Total Price</th>
                </tr>
            </thead> -->
            <tbody>
                <?php
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT c.cart_id, c.quantity, ps.unit_price, p.product_name, p.product_image
                        FROM cart c
                        JOIN product_size_variation ps ON ps.variation_id = c.variation_id
                        JOIN product p ON ps.product_id = p.product_id
                        WHERE c.user_id = $user_id";
                $result = $conn->query($sql);
                $sub_total = 0;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $total_price = $row["quantity"] * $row["unit_price"];
                        $cart_id = $row["cart_id"];
                ?>
                        <tr>
                            <td class="text-center"><img height='100px' src='../admin_panel<?= $row["product_image"] ?>'></td>
                            <td class="text-center"><?= htmlspecialchars($row["product_name"]) ?></td>
                            <td class="text-center" id="quantity-<?= $cart_id ?>"><?= $row["quantity"] ?></td>
                            <td class="text-center" id="unit-price-<?= $cart_id ?>">₱<?= number_format($row["unit_price"], 2) ?></td>
                            <td class="text-center" id="total-price-<?= $cart_id ?>">₱<?= number_format($total_price, 2) ?></td>
                        </tr>
                <?php
                        $sub_total += $total_price;
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Your cart is empty.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="price-container">
            <p>Sub Total: ₱<?= number_format($sub_total, 2) ?></p>
            <?php
            $shipping_fee = 70;
            $tax_rate = .12;
            $total_amount = ($sub_total * $tax_rate) + $sub_total + $shipping_fee;
            ?>
            <p>Shipping Fee: ₱<?= number_format($shipping_fee, 2) ?></p>
            <p>Tax Rate: 12%</p>
            <p>Total Amount: ₱<?= number_format($total_amount, 2) ?></p>
        </div>
    </div>

    <div class="form-container">
        <form method="POST" action="./controller/checkoutController.php" enctype='multipart/form-data'>
            <input type="hidden" name="sub_total" value="<?= $sub_total; ?>">
            <div class="form-group">
                <label>Recipient Name:</label>
                <input type="text" name="recipient_name" required><br>
            </div>
            <div class="form-group"> <label>Contact Number:</label>
                <input type="text" name="contact_number" required><br>
            </div>
            <div class="form-group"> <label>Street:</label>
                <input type="text" name="street" required><br>
            </div>
            <div class="form-group"> <label>Barangay:</label>
                <input type="text" name="barangay" required><br>
            </div>
            <div class="form-group"> <label>Municipality:</label>
                <input type="text" name="municipality" required><br>
            </div>
            <div class="form-group"> <label>Province:</label>
                <input type="text" name="province" required><br>
            </div>
            <div class="form-group">
                <label>Country:</label>
                <input type="text" name="country" required><br>
            </div>
            <div class="form-group">
                <label>Postcode:</label>
                <input type="text" name="postcode" required><br>
            </div>
            <div class="form-group">
                <label>Payment Method:</label>
                <select name="payment_method_id">
                    <?php
                    $sql_payment = "SELECT * FROM mode_of_payment";
                    $result = $conn->query($sql_payment);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['payment_method_id'] . "'>" . $row['payment_method'] . "</option>";
                    }
                    ?>
                </select><br>
            </div>
            <!-- <div class="form-group">
                <label for="file">Upload Payment Slip:</label>
                <input type="file" class="form-control-file" id="file" name="pay_slip">
            </div> -->
            <div class="form-group">
                <input type="submit" value="Place Order" class="btn placeorder-btn" name="upload">
            </div>

        </form>
    </div>
</div>
