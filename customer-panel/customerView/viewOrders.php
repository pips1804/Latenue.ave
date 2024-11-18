<?php
include_once "../../admin_panel/config/dbconnect.php";

session_start();
?>
<div id="ordersBtn" class="cart-section">
    <p class="cart-title">Your Orders</p>
    <div class="scrollable-table cart-table-container">
        <table class="">
            <thead>
                <tr>
                    <th class="text-center">O.N.</th>
                    <th class="text-center">Recipient Name</th>
                    <th class="text-center">Contact</th>
                    <th class="text-center">Order Date</th>
                    <th class="text-center">Payment Method</th>
                    <th class="text-center">Order Status</th>
                    <th class="text-center">Payment Slip</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <?php
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * from orders, mode_of_payment WHERE orders.payment_method_id = mode_of_payment.payment_method_id AND orders.user_id = $user_id";
            $result = $conn->query($sql);
            $count = 1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row["delivered_to"] ?></td>
                        <td><?= $row["phone_no"] ?></td>
                        <td><?= $row["order_date"] ?></td>
                        <td><?= $row["payment_method"] ?></td>
                        <?php
                        if ($row["order_status"] == 0) {

                        ?>
                            <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?= $row['order_id'] ?>')">Pending </button></td>
                        <?php

                        } elseif ($row["order_status"] == 1) {
                        ?>
                            <td><button class="btn btn-warning" onclick="ChangeOrderStatus('<?= $row['order_id'] ?>')">Processing</button></td>
                        <?php
                        } elseif ($row["order_status"] == 2) {
                        ?>
                            <td><button class="btn btn-info" onclick="ChangeOrderStatus('<?= $row['order_id'] ?>')">Shipped</button></td>
                        <?php
                        } elseif ($row["order_status"] == 3) {
                        ?>
                            <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?= $row['order_id'] ?>')">Delivered</button></td>
                        <?php
                        }
                        ?>

                        <td><a href='../customer-panel/payment_slip/<?= $row["payment_slip"] ?>' target="_blank">
                                <img height='100px' src='../customer-panel/payment_slip/<?= $row["payment_slip"] ?>'>
                            </a></td>

                        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?= $row['order_id'] ?>" href="javascript:void(0);">View Order</a>
                            <a class="btn btn-primary">Cancel Order</a>
                        </td>
                    </tr>
            <?php
                    $count += 1;
                }
            }
            ?>

        </table>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Order Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="order-view-modal modal-body">

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.openPopup').on('click', function() {
            var dataURL = $(this).attr('data-href');

            $('.order-view-modal').load(dataURL, function() {
                $('#viewModal').modal({
                    show: true
                });
            });
        });
    });
</script>
