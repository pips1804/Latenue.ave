<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latenue.Ave</title>
</head>


<body>
    <h1>MAIN PAGE</h1>

<?php
            if (isset($_GET['login']) && $_GET['login'] == "success") {
                echo '<script> alert("Login Successfully")</script>';
            }
    ?>

</body>


</html>