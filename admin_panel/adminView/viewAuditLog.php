<div>
    <p class="section-title">Audit Trail Log</p>
    <div class="scrollable-table admin-table">
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">A.N</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Log In Time</th>
                    <th class="text-center">Log Out Time</th>
                    <th class="text-center">Role</th>
                </tr>
            </thead>
            <?php
            include_once "../config/dbconnect.php";
            $sql = "SELECT a.*, u.first_name, u.last_name, u.isAdmin
            FROM audit_trail_log a
            JOIN users u
            ON a.user_id = u.user_id ORDER by a.login_time";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $role = $row["isAdmin"] == 1 ? "Administrator" : "Customer";
            ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row["first_name"] ?></td>
                        <td><?= $row["last_name"] ?></td>
                        <td><?= $row["login_time"] ?></td>
                        <td><?= $row["logout_time"] ?></td>
                        <td><?= $role ?></td>
                    </tr>
            <?php
                    $count = $count + 1;
                }
            }
            ?>
        </table>
    </div>
</div>
