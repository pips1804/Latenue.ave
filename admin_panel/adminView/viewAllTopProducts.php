<div>
    <p class="section-title">Best-Selling Products</p>
    <div class="scrollable-table">
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">Product Image</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Product Description</th>
                    <th class="text-center">Quantity Sold</th>
                </tr>
            </thead>
            <?php
            include_once "../config/dbconnect.php";
            $sql = "SELECT *
            FROM top_selling_products
            LIMIT 5";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><img height='100px' src='<?= $row["product_image"] ?>'></td>
                        <td><?= $row["product_name"] ?></td>
                        <td><?= $row["product_desc"] ?></td>
                        <td><?= $row["total_quantity"] ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
