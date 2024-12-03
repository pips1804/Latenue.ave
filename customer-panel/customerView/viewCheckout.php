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
            $shipping_fee = 100;
            $tax_rate = .12;
            $total_amount = ($sub_total * $tax_rate) + $sub_total + $shipping_fee;
            ?>
            <p>Shipping Fee: ₱<?= number_format($shipping_fee, 2) ?></p>
            <p>Tax Rate: 12%</p>
            <p>Total Amount: ₱<?= number_format($total_amount, 2) ?></p>
        </div>

        <div class="ewallet-container">
            <?php
            $sql = "SELECT * FROM e_wallet_info";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <p class="e-wallet-name"><?= $row['e_wallet_name'] ?></p>
                    <p class="e-wallet-owner"><?= $row['first_name'] ?> <?= $row['middle_name'] ?> <?= $row['last_name'] ?></p>
                    <p class="e-wallet-no"><?= $row['e_wallet_no'] ?></p>
                    <a href="../admin_panel/<?= $row['e_wallet_qrcode'] ?>" target="_blank">
                        <img src="../admin_panel.<?= $row['e_wallet_qrcode'] ?>" alt="" height='100px'>
                    </a>
            <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="form-container">
        <form method="POST" action="./controller/checkoutController.php" enctype='multipart/form-data'>
            <input type="hidden" name="sub_total" value="<?= $sub_total ?>">

            <div class="form-group">
                <label>Recipient Name:</label>
                <input type="text" name="recipient_name" required><br>
            </div>

            <div class="form-group">
                <label>Contact Number:</label>
                <input type="text" name="contact_number" required><br>
            </div>

            <div class="form-group">
                <label>House No. and Street:</label>
                <input type="text" name="street" required><br>
            </div>

            <div class="form-group">
                <label>Province:</label>
                <select name="province" id="province-dropdown" required>
                    <option value="">Select Province</option>
                    <?php
                    $sql = "SELECT name FROM provinces";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
                </select><br>
            </div>

            <div class="form-group">
                <label>Municipality/City:</label>
                <select name="municipality" id="municipality-dropdown" required>
                    <option value="">Select Municipality</option>
                </select><br>
            </div>

            <div class="form-group">
                <label>Barangay:</label>
                <select name="barangay" id="barangay-dropdown" required>
                    <option value="">Select Barangay</option>
                </select><br>
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

            <div class="form-group">
                <label for="file">Upload Payment Slip:</label>
                <input type="file" class="form-control-file" id="file" name="pay_slip">
            </div>

            <div class="form-group">
                <input type="submit" value="Place Order" class="btn placeorder-btn" name="upload">
            </div>
        </form>
    </div>
</div>

<script>
    // Fetching the data (you can optimize by serving this data from PHP directly)
    const data = {
        municipalities: <?php
                        $sql = "SELECT name, province_name FROM municipalities";
                        $result = $conn->query($sql);
                        $municipalities = [];
                        while ($row = $result->fetch_assoc()) {
                            $municipalities[] = $row;
                        }
                        echo json_encode($municipalities);
                        ?>,
        barangays: <?php
                    $sql = "SELECT name, municipality_name FROM barangays";
                    $result = $conn->query($sql);
                    $barangays = [];
                    while ($row = $result->fetch_assoc()) {
                        $barangays[] = $row;
                    }
                    echo json_encode($barangays);
                    ?>
    };

    const provinceDropdown = document.getElementById("province-dropdown");
    const municipalityDropdown = document.getElementById("municipality-dropdown");
    const barangayDropdown = document.getElementById("barangay-dropdown");

    // Update municipalities based on selected province
    provinceDropdown.addEventListener("change", function() {
        const selectedProvince = this.value;

        // Clear existing options
        municipalityDropdown.innerHTML = '<option value="">Select Municipality</option>';
        barangayDropdown.innerHTML = '<option value="">Select Barangay</option>';

        // Filter municipalities
        const filteredMunicipalities = data.municipalities.filter(
            (item) => item.province_name === selectedProvince
        );

        // Populate municipality dropdown
        filteredMunicipalities.forEach((municipality) => {
            const option = document.createElement("option");
            option.value = municipality.name;
            option.textContent = municipality.name;
            municipalityDropdown.appendChild(option);
        });
    });

    // Update barangays based on selected municipality
    municipalityDropdown.addEventListener("change", function() {
        const selectedMunicipality = this.value;

        // Clear existing options
        barangayDropdown.innerHTML = '<option value="">Select Barangay</option>';

        // Filter barangays
        const filteredBarangays = data.barangays.filter(
            (item) => item.municipality_name === selectedMunicipality
        );

        // Populate barangay dropdown
        filteredBarangays.forEach((barangay) => {
            const option = document.createElement("option");
            option.value = barangay.name;
            option.textContent = barangay.name;
            barangayDropdown.appendChild(option);
        });
    });
</script>
