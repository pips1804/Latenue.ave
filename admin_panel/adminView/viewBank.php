<div>
    <p class="section-title">Bank Account</p>
    <div class="scrollable-table admin-table">
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">B.N</th>
                    <th class="text-center">Bank Name</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Middle Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Bank No.</th>
                    <th class="text-center" colspan="2">Action</th>

                </tr>
            </thead>
            <?php
            include_once "../config/dbconnect.php";
            $sql = "SELECT * FROM bank_account_info";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row["bank_name"] ?></td>
                        <td><?= $row["first_name"] ?></td>
                        <td><?= $row["middle_name"] ?></td>
                        <td><?= $row["last_name"] ?></td>
                        <td><?= $row["bank_acct_no"] ?></td>
                        <td><button class="btn btn-primary" style="height:40px" onclick="bankEditForm('<?= $row['bank_id'] ?>')">Edit</button></td>
                        <td><button class="btn btn-danger" style="height:40px" onclick="bankDelete('<?= $row['bank_id'] ?>')">Delete</button></td>
                    </tr>
            <?php
                    $count = $count + 1;
                }
            }
            ?>
        </table>
    </div>

    <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Bank Account
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Bank Account</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="./controller/addBankController.php" method="POST">
                        <div class="form-group">
                            <label for="b_name" class="modal-title">Bank Name:</label>
                            <input type="text" class="form-control" name="b_name" required>
                        </div>
                        <div class="form-group">
                            <label for="f_name" class="modal-title">First Name:</label>
                            <input type="text" class="form-control" name="f_name" required>
                        </div>
                        <div class="form-group">
                            <label for="m_name" class="modal-title">Middle Name:</label>
                            <input type="text" class="form-control" name="m_name" required>
                        </div>
                        <div class="form-group">
                            <label for="l_name" class="modal-title">Last Name:</label>
                            <input type="text" class="form-control" name="l_name" required>
                        </div>
                        <div class="form-group">
                            <label for="b_number" class="modal-title">Bank Account Number:</label>
                            <input type="text" class="form-control" name="b_number" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Bank Account</button>
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
