<?php
include_once "../../admin_panel/config/dbconnect.php";

session_start();
?>

<div class="cart-section">
    <p class="cart-title">Your Cart</p>
    <div class="cart-table-container scrollable-table">
        <table class="">
            <thead>
                <tr>
                    <th class="text-center">Product Image</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center">Total Price</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT c.cart_id, c.quantity, ps.unit_price, p.product_name, p.product_image
                        FROM cart c
                        JOIN product_size_variation ps ON ps.variation_id = c.variation_id
                        JOIN product p ON ps.product_id = p.product_id
                        WHERE c.user_id = $user_id";
                $result = $conn->query($sql);

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
                            <td class="text-center">
                                <button onclick="quantityPlus(<?= $cart_id ?>)" class="btn btn-success cart-btn">+</button>
                                <button onclick="quantityMinus(<?= $cart_id ?>)" class="btn btn-danger cart-btn">-</button>
                                <button class="btn cart-btn" onclick="cartDelete(<?= $cart_id ?>);">Delete</button>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Your cart is empty.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>