<div class="container p-5 edit-container">

    <p class="section-title edit-title">Edit Administrator Details</p>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * from users Where user_id='$ID' and users.isAdmin = 1");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
    ?>
            <form id="update-Items" onsubmit="updateAdmin()" enctype='multipart/form-data'>
                <div class="form-group">
                    <input type="text" class="form-control" id="u_id" value="<?= $row1['user_id'] ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" id="fname" value="<?= $row1['first_name'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control" id="lname" value="<?= $row1['last_name'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" value="<?= $row1['email'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="text" class="form-control" id="password" value="<?= $row1['password'] ?>" required>
                </div>

                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-primary">Update User</button>
                </div>
        <?php
        }
    }
        ?>
            </form>
</div>