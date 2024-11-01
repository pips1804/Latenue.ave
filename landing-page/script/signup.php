<?php

include '../../admin_panel/config/dbconnect.php';

if (isset($_POST['sign-up'])) {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $municipality = $_POST['municipality'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    $postalcode = $_POST['postalcode'];
    $phonenumber = $_POST['phone-number'];

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        header("Location: ../index.php?signup=error");
    } else {
        if ($_POST["password"] === $_POST["repeat-password"]) {

            $insertAddressQuery = "INSERT INTO users_address(street, barangay, municipality, province, country, postalcode) 
                                    VALUES ('$street', '$barangay', '$municipality', '$province', '$country', '$postalcode')";

            if ($conn->query($insertAddressQuery) === TRUE) {

                $address_id = $conn->insert_id;
                $insertUserQuery = "INSERT INTO users(first_name, last_name, email, contact_no, password, address_id)
                                        VALUES ('$firstName', '$lastName', '$email', '$phonenumber', '$password', '$address_id')";

                if ($conn->query($insertUserQuery) === TRUE) {
                    header("Location: ../index.php?signup=success");
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            header("Location: ../index.php?signup=pwnotmatched");
        }
    }
}
