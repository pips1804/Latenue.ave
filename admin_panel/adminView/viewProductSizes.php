<div>
    <p class="section-title">Product Sizes Item</p>
    <div class="scrollable-table prod-size-table">
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">S.N.</th>
                    <th class="text-center">Product Image</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Size</th>
                    <th class="text-center">Stock Quantity</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <?php
            include_once "../config/dbconnect.php";
            $sql = "SELECT * from product_size_variation v, product p, sizes s WHERE p.product_id=v.product_id AND v.size_id=s.size_id ORDER BY p.product_name ASC";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $rowClass = '';
                    if ($row["quantity_in_stock"] == 0) {
                        $rowClass = 'out-of-stock';  // For zero stock
                    } elseif ($row["quantity_in_stock"] < 5) {
                        $rowClass = 'low-stock';     // For stock below 5
                    }

            ?>
                    <tr class="<?= $rowClass ?>">
                        <td><?= $count ?></td>
                        <td><?= $row["product_name"] ?></td>
                        <td><img height='100px' src='<?= $row["product_image"] ?>'></td>
                        <td><?= $row["size_name"] ?></td>
                        <td><?= $row["quantity_in_stock"] ?></td>
                        <td><?= $row["unit_price"] ?></td>
                        <td><button class="btn btn-primary" style="height:40px" onclick="variationEditForm('<?= $row['variation_id'] ?>')">Edit</button></td>
                        <td><button class="btn btn-danger" style="height:40px" onclick="variationDelete('<?= $row['variation_id'] ?>')">Archive</button></td>
                    </tr>
            <?php
                    $count = $count + 1;
                }
            }
            ?>
        </table>
    </div>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Size Variation
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Product Size Variation</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="./controller/addVariationController.php" method="POST">

                        <div class="form-group">
                            <label class="modal-title">Product:</label>
                            <select name="product">
                                <option disabled selected class="modal-title">Select product</option>
                                <?php

                                $sql = "SELECT * from product";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['product_id'] . "'>" . $row['product_name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="modal-title">Size:</label>
                            <select name="size">
                                <option disabled selected class="modal-title">Select size</option>
                                <?php

                                $sql = "SELECT * from sizes";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['size_id'] . "'>" . $row['size_name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qty" class="modal-title">Stock Quantity:</label>
                            <input type="number" class="form-control" name="qty" required>
                        </div>

                        <div class="form-group">
                            <label for="unit_price" class="modal-title">Unit Price:</label>
                            <input type="number" class="form-control" name="unit_price" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Variation</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
                </div>
            </div>

        </div>
    </div>


</div>
