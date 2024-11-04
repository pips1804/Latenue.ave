<div>
    <p class="section-title">Admininstrator</p>
    <div class="scrollable-table admin-table">
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">A.N.</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Password</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <?php
            include_once "../config/dbconnect.php";
            $sql = "SELECT * from users where users.isAdmin = 1";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row["first_name"] ?></td>
                        <td><?= $row["last_name"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["password"] ?></td>
                        <td><button class="btn btn-primary" style="height:40px" onclick="adminEditForm('<?= $row['user_id'] ?>')">Edit</button></td>
                        <td><button class="btn btn-danger" style="height:40px" onclick="adminDelete('<?= $row['user_id'] ?>')">Delete</button></td>
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
        Add User
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New User Admin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="./controller/addAdminController.php" method="POST">
                        <div class="form-group">
                            <label for="size" class="modal-title">First Name</label>
                            <input type="text" class="form-control" name="fname" required>
                        </div>

                        <div class="form-group">
                            <label for="size" class="modal-title">Last Name</label>
                            <input type="text" class="form-control" name="lname" required>
                        </div>

                        <div class="form-group">
                            <label for="size" class="modal-title"> Email</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="size" class="modal-title">Password</label>
                            <input type="text" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="upload" style="height:40px" class="modal-title">Add User</button>
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