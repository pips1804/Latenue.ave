<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {

    $suppname = $_POST['s_name'];
    $suppemail = $_POST['s_email'];
    $suppcontact = $_POST['s_contact'];

    $insert = mysqli_query($conn, "INSERT INTO supplier
         (supp_name, supp_email, supp_contact) 
         VALUES ('$suppname', '$suppemail', '$suppcontact')");

    if (!$insert) {
        echo mysqli_error($conn);
        header("Location: ../sidebar.php?supplier=error");
    } else {
        header("Location: ../admin.php?supplier=success");
    }
}
