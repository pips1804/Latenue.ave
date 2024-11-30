<div>
    <p class="section-title">Suppliers</p>
    <div class="scrollable-table">
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">S.N.</th>
                    <th class="text-center">Supplier Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Contact</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <?php
            include_once "../config/dbconnect.php";
            $sql = "SELECT * from supplier";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row["supp_name"] ?></td>
                        <td><?= $row["supp_email"] ?></td>
                        <td><?= $row["supp_contact"] ?></td>
                        <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
                        <td><button class="btn btn-danger" style="height:40px" onclick="supplierDelete('<?= $row['supplier_id'] ?>')">Delete</button></td>
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
        Add Supplier
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="./controller/addSuppController.php" method="POST">
                        <div class="form-group">
                            <label for="s_name" class="modal-title">Supplier Name:</label>
                            <input type="text" class="form-control" name="s_name" required>
                        </div>
                        <div class="form-group">
                            <label for="s_email" class="modal-title">Supplier Email:</label>
                            <input type="text" class="form-control" name="s_email" required>
                        </div>
                        <div class="form-group">
                            <label for="s_contact" class="modal-title">Supplier Contact:</label>
                            <input type="text" class="form-control" name="s_contact" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Supplier</button>
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
