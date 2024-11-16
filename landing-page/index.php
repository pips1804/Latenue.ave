<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Latenue.ave</title>
    <link
        rel="shortcut icon"
        href="../bg-logo-img/logo.jpg"
        type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="landing-page.css" />
    <link rel="stylesheet" href="form.css" />
</head>

<body>
    <header class="nav-container">
        <div class="logo-container">
            <p>LA</p>
        </div>
        <div class="nav-links-container">
            <div class="log-in-container">
                <button class="log-in-drop-btn" onclick="displayLogIn()">
                    Log In
                </button>
                <!-- <div class="log-in-dropdown" id="login-dropdown">
                    <a href="#" onclick="displayAdminLogIn()">As Admin</a>
                    <a href="#" onclick="displayCustomerLogIn()">As Customer</a>
                </div> -->
            </div>

            <div class="sign-up-container">
                <button class="sign-up-drop-btn" onclick="displayCustomerSignUp()">
                    Sign Up
                </button>
                <!-- <div class="sign-up-dropdown" id="signup-dropdown">
                    <a href="#" onclick="displayCustomerSignUp()">As Customer</a>
                </div> -->
            </div>

            <div class="sign-up-container">
                <button class="sign-up-drop-btn" onclick="verifyEmailForm()">
                    Verify Email
                </button>
            </div>
        </div>
    </header>
    <main class="main-container">
        <div class="title-container">Latenue.ave</div>
        <div class="desc-container">
            Latenue.ve is an online clothing business offering a range of apparel,
            including pants, skirts, dresses, and bags. The name derives from the
            French phrase "La tenue," translating to 'the outfit' or 'the attire,'
            reflecting the brand's focus on dressing individuals with style and
            elegance. Latenue.ve aims to provide a convenient and accessible
            platform for customers to explore and purchase fashion items from the
            comfort of their homes.
        </div>

        <!-- Temporary Shit ---------------------------- -->

        <div class="verify-email-form-container" id="verify-email">
            <p>Verify your Email</p>
            <form method="POST" action="script/verify-code.php" class="email-verification-form">
                <div class="email-verification">
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Input the email you used" required>
                </div>
                <div class="verification-code">
                    <label for="">Verification Code</label>
                    <input type="text" name="verification_code" placeholder="Enter verification code" required />
                </div>
                <div class="button-container">
                    <input type="submit" name="verify" value="Verify" class="verify-button">
                </div>
            </form>
        </div>

        <!-- ------------------------------------------ -->

        <div class="customer-signup-form-container" id="customer-sign-up">
            <p>Sign Up</p>
            <form action="script/signup.php" class="customer-sign-up" method="post">
                <div class="last-name">
                    <label for="">Last Name</label>
                    <input type="text" name="last-name" />
                </div>

                <div class="first-name">
                    <label for="">First Name</label>
                    <input type="text" name="first-name" />
                </div>

                <div class="email">
                    <label for="">Email</label>
                    <input type="text" name="email" />
                </div>

                <div class="email">
                    <label for="">Street</label>
                    <input type="text" name="street" />
                </div>

                <div class="email">
                    <label for="">Barangay</label>
                    <input type="text" name="barangay" />
                </div>

                <div class="email">
                    <label for="">Municipality</label>
                    <input type="text" name="municipality" />
                </div>

                <div class="email">
                    <label for="">Province</label>
                    <input type="text" name="province" />
                </div>

                <div class="email">
                    <label for="">Country</label>
                    <input type="text" name="country" />
                </div>

                <div class="email">
                    <label for="">Postal Code</label>
                    <input type="text" name="postalcode" />
                </div>

                <div class="email">
                    <label for="">Phone Number</label>
                    <input type="text" name="phone-number" />
                </div>

                <div class="password">
                    <div class="show-password-container">
                        <label for="">Password</label>
                        <input type="checkbox" onclick="cusSignUp()" />
                    </div>
                    <input type="password" name="password" id="cusSignUpPass" />
                </div>

                <div class="repeat-password">
                    <div class="show-password-container">
                        <label for="">Repeat Password</label>
                        <input type="checkbox" onclick="cusSignUpRep()" />
                    </div>
                    <input
                        type="password"
                        name="repeat-password"
                        id="cusSignUpRepPass" />
                </div>

                <div class="button-container">
                    <input type="submit" value="Sign Up" class="sign-up-button" name="sign-up" />
                </div>
            </form>
        </div>

        <div class="customer-login-form-container" id="log-in">
            <p>Log In</p>
            <form action="script/login.php" class="customer-log-in" method="post">
                <div class="email">
                    <label for="">Email</label>
                    <input type="text" name="email" />
                </div>

                <div class="password">
                    <div class="show-password-container">
                        <label for="">Password</label>
                        <input type="checkbox" onclick="cusPass()" />
                    </div>
                    <input type="password" name="password" id="cusLogPass" />
                </div>

                <div class="button-container">
                    <input type="submit" value="Log In" class="log-in-button" name="login" />
                </div>
            </form>
        </div>

        <!-- <div class="admin-login-form-container" id="admin-log-in">
            <p>Log In as Admin</p>
            <form action="script/admin-login.php" class="admin-log-in" method="post">
                <div class="email">
                    <label for="">Email</label>
                    <input type="text" name="admin-email" />
                </div>

                <div class="password">
                    <div class="show-password-container">
                        <label for="">Password</label>
                        <input type="checkbox" onclick="adminPass()" />
                    </div>
                    <input type="password" name="admin-password" id="adminLogPass" />
                </div>

                <div class="button-container">
                    <input type="submit" value="Log In" class="log-in-button" name="admin-login" />
                </div>
            </form>
        </div> -->
    </main>
    <script src="landing-page.js"></script>

    <?php
    if (isset($_GET['login']) && $_GET['login'] == "error") {
        echo '<script> alert("Incorrect Email or Password")</script>';
    } else if (isset($_GET['login']) && $_GET['login'] == "required") {
        echo '<script> alert("Login is required to view this page")</script>';
    } else if (isset($_GET['login']) && $_GET['login'] == "error1") {
        echo '<script> alert("You are using an admin account!")</script>';
    } else if (isset($_GET['login']) && $_GET['login'] == "error2") {
        echo '<script> alert("You are using an customer account!")</script>';
    } else if (isset($_GET['login']) && $_GET['login'] == "notverified") {
        echo '<script> alert("You need to verify your email!")</script>';
    }
    if (isset($_GET['signup']) && $_GET['signup'] == "success") {
        echo '<script> alert("Signup Succesfully")</script>';
    } else if (isset($_GET['signup']) && $_GET['signup'] == "pwnotmatched") {
        echo '<script> alert("Password not matched!")</script>';
    } else if (isset($_GET['signup']) && $_GET['signup'] == "error") {
        echo '<script> alert("Email Already Exist!")</script>';
    }
    if (isset($_GET['logout']) && $_GET['logout'] == "success") {
        echo '<script> alert("Logout Succesfully")</script>';
    }
    if (isset($_GET['code']) && $_GET['code'] == "success") {
        echo '<script> alert("Code Sent Succesfully!")</script>';
    } else if (isset($_GET['code']) && $_GET['code'] == "matched") {
        echo '<script> alert("Email Succesfully Verified, You can now log in your account!")</script>';
    } else if (isset($_GET['code']) && $_GET['code'] == "notmatched") {
        echo '<script> alert("Incorrect verification Code!")</script>';
    } else if (isset($_GET['code']) && $_GET['code'] == "emailmismatch") {
        echo '<script> alert("This is not the email you used!")</script>';
    }


    ?>

</body>

</html>
