<div>
    <p class="section-title">Admininstrator</p>
    <div class="scrollable-table admin-table">
        <table class="table ">
            <thead>
                <tr>
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
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?= $row["first_name"] ?></td>
                        <td><?= $row["last_name"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["password"] ?></td>
                        <td><button class="btn btn-primary" style="height:40px" onclick="adminEditForm('<?= $row['user_id'] ?>')">Edit</button></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>