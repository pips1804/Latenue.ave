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
                            <td>Pending</td>
                        <?php
                        } elseif ($row["order_status"] == 1) {
                        ?>
                            <td>Processing</td>
                        <?php
                        } elseif ($row["order_status"] == 2) {
                        ?>
                            <td>Shipped</td>
                        <?php
                        } elseif ($row["order_status"] == 3) {
                        ?>
                            <td>Delivered</td>
                        <?php
                        } else {
                        ?>
                            <td>Cancelled</td>
                        <?php
                        }
                        ?>

                        <td><a href='../customer-panel/payment_slip/<?= $row["payment_slip"] ?>' target="_blank">
                                <img height='100px' src='../customer-panel/payment_slip/<?= $row["payment_slip"] ?>'>
                            </a></td>

                        <td>
                            <a class="btn btn-primary openPopup" data-href="./customerView/viewEachOrders.php?orderID=<?= $row['order_id'] ?>" href="javascript:void(0);" data-toggle="modal" data-target="#viewOrders">View Order</a>
                            <?php
                            if ($row['order_status'] == 0) {
                            ?>
                                <a class="btn btn-primary" onclick="cancelOrder(<?= $row['order_id'] ?>)">Cancel Order</a>
                            <?php
                            } else {
                            ?>
                                <a class="btn btn-primary" onclick="cancelOrder(<?= $row['order_id'] ?>" aria-disabled="true)">Cancel Order Unavailable</a>
                            <?php
                            }
                            ?>
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
<div class="modal fade" id="viewOrders" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
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
                $('#viewOrders').modal('show');
            });
        });
    });
</script>
