<div id="ordersBtn">
    <p class="section-title">Cancelled Orders</p>
    <div class="scrollable-table">
        <table class="table">
            <thead>
                <tr>
                    <th>O.N.</th>
                    <th>Customer</th>
                    <th>Contact</th>
                    <th>Order Date</th>
                    <th>Payment Method</th>
                    <th>Order Status</th>
                    <th>Payment Status</th>
                    <th>Payment Slip</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php
            include_once "../config/dbconnect.php";
            $sql = "SELECT * from orders, mode_of_payment WHERE orders.payment_method_id = mode_of_payment.payment_method_id AND orders.order_status = 4";
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
                        } elseif ($row["order_status"] == 4) {
                        ?>
                            <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?= $row['order_id'] ?>')">Cancelled</button></td>
                        <?php
                        }
                        if ($row["pay_status"] == 0) {
                        ?>
                            <td><button class="btn btn-danger" onclick="ChangePay('<?= $row['order_id'] ?>')">Unpaid</button></td>
                        <?php

                        } else if ($row["pay_status"] == 1) {
                        ?>
                            <td><button class="btn btn-success" onclick="ChangePay('<?= $row['order_id'] ?>')">Paid </button></td>
                        <?php
                        }
                        ?>

                        <td><a href='../customer-panel/payment_slip/<?= $row["payment_slip"] ?>' target="_blank">
                                <img height='100px' src='../customer-panel/payment_slip/<?= $row["payment_slip"] ?>'>
                            </a></td>

                        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?= $row['order_id'] ?>" href="javascript:void(0);">View</a></td>
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
        </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
</div>
<script>
    //for view order modal
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
