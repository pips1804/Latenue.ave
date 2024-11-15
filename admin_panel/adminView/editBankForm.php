<div class="container p-5 edit-container">

    <p class="section-title edit-title">Edit Bank Details</p>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * from bank_account_info Where bank_id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
    ?>
            <form id="update-Items" onsubmit="updateBank()" enctype='multipart/form-data'>
                <div class="form-group">
                    <input type="text" class="form-control" id="b_id" value="<?= $row1['bank_id'] ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="bname">Bank Name:</label>
                    <input type="text" class="form-control" id="bname" value="<?= $row1['bank_name'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" id="fname" value="<?= $row1['first_name'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="mmame">Middle Name:</label>
                    <input type="text" class="form-control" id="mname" value="<?= $row1['middle_name'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control" id="lname" value="<?= $row1['last_name'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="bnum">Bank Account No:</label>
                    <input type="text" class="form-control" id="bnum" value="<?= $row1['bank_acct_no'] ?>" required>
                </div>

                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-primary">Update Bank</button>
                </div>
        <?php
        }
    }
        ?>
            </form>
</div>
