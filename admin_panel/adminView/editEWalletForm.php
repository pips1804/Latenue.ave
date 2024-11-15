<div class="container edit-container">
    <p class="section-title edit-title">Edit E-Wallet Details</p>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * FROM e_wallet_info WHERE e_wallet_id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
    ?>
            <form id="update-Items" onsubmit="updateEWallet()" enctype='multipart/form-data'>
                <div class="form-group">
                    <input type="text" class="form-control" id="e_wallet_id" value="<?= $row1['e_wallet_id'] ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="name">E-Wallet Name:</label>
                    <input type="text" class="form-control" id="e_name" value="<?= $row1['e_wallet_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" value="<?= $row1['first_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="name">Middle Name:</label>
                    <input type="text" class="form-control" id="middle_name" value="<?= $row1['middle_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" value="<?= $row1['last_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="name">E-Wallet No:</label>
                    <input type="text" class="form-control" id="e_number" value="<?= $row1['e_wallet_no'] ?>">
                </div>
                <div class="form-group">
                    <img width='200px' height='150px' src='<?= $row1["e_wallet_qrcode"] ?>' style="margin-bottom: 20px;">
                    <div>
                        <label for="file">Choose Image:</label>
                        <input type="text" id="existingImage" class="form-control" value="<?= $row1['e_wallet_qrcode'] ?>" hidden>
                        <input type="file" id="newImage" value="">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
                </div>
        <?php
        }
    }
        ?>
            </form>

</div>
