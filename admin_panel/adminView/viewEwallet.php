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
                    </tr>
            <?php
                    $count = $count + 1;
                }
            }
            ?>
        </table>
    </div>
</div>
