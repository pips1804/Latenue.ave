<div>
    <p class="section-title">E-Wallet</p>
    <div class="scrollable-table admin-table">
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">E.N</th>
                    <th class="text-center">E-Wallet Name</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Middle Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">E-Wallet No.</th>
                    <th class="text-center">QR Code</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <?php
            include_once "../config/dbconnect.php";
            $sql = "SELECT * FROM e_wallet_info";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row["e_wallet_name"] ?></td>
                        <td><?= $row["first_name"] ?></td>
                        <td><?= $row["middle_name"] ?></td>
                        <td><?= $row["last_name"] ?></td>
                        <td><?= $row["e_wallet_no"] ?></td>
                        <td><a href='<?= $row["e_wallet_qrcode"] ?>' target="_blank">
                                <img height='100px' src='<?= $row["e_wallet_qrcode"] ?>'>
                            </a></td>
                        <td><button class="btn btn-primary" style="height:40px" onclick="eWalletEditForm('<?= $row['e_wallet_id'] ?>')">Edit</button></td>
                        <td><button class="btn btn-danger" style="height:40px" onclick="eWalletDelete('<?= $row['e_wallet_id'] ?>')">Archive</button></td>
                    </tr>
            <?php
                    $count = $count + 1;
                }
            }
            ?>
        </table>
    </div>

    <button type="button" class="btn" style="height:40px" data-toggle="modal" data-target="#myModal">
        Add E-Wallet
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New E-Wallet Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' onsubmit="addEWallet()" method="POST">
                        <div class="form-group">
                            <label for="name" class="modal-title">E-Wallet Name:</label>
                            <input type="text" class="form-control" id="e_name" required>
                        </div>
                        <div class="form-group">
                            <label for="qty" class="modal-title">First Name:</label>
                            <input type="text" class="form-control" id="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="qty" class="modal-title">Middle Name:</label>
                            <input type="text" class="form-control" id="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="qty" class="modal-title">Last Name:</label>
                            <input type="text" class="form-control" id="middle_name" required>
                        </div>
                        <div class="form-group">
                            <label for="qty" class="modal-title">E-Wallet No:</label>
                            <input type="text" class="form-control" id="e_number" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Choose Image:</label>
                            <input type="file" class="form-control-file" id="file">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add E-Wallet</button>
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
