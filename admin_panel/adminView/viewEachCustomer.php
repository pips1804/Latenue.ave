<div class="container">
    <div class="scrollable-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Street</th>
                    <th>Barangay</th>
                    <th>Municipality</th>
                    <th>Province</th>
                    <th>Country</th>
                    <th>Postal Code</th>
                </tr>
            </thead>
            <?php
            include_once "../config/dbconnect.php";
            $ID = $_GET['userID'];
            //echo $ID;
            $sql = "SELECT * from users u, users_address ud
        where u.address_id=ud.address_id AND u.user_id=$ID";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?= $count ?></td>
                        <?php

                        ?>
                        <td><?= $row["street"] ?></td>
                        <td><?= $row["barangay"] ?></td>
                        <td><?= $row["municipality"] ?></td>
                        <td><?= $row["province"] ?></td>
                        <td><?= $row["country"] ?></td>
                        <td><?= $row["postalcode"] ?></td>
                    </tr>
            <?php
                    $count = $count + 1;
                }
            } else {
                echo "error";
            }
            ?>
        </table>
    </div>
</div>
