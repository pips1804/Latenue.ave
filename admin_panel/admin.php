<?php
session_start();

if (!isset($_SESSION['admin_email'])) {

    header("Location: ../landing-page/index.php?login=required");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link
        rel="shortcut icon"
        href="../bg-logo-img/logo.jpg"
        type="image/x-icon" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link rel="stylesheet" href="./assets/css/media.css">
</head>

<body>
    <nav class="nav-bar">
        <p class="logo">LA</p>
        <a href="admin_logout.php" class="logout-icon"> <i class="fa-solid fa-right-from-bracket"></i></a>
    </nav>

    <div class="sidebar" id="mySidebar" style="background-color: #6c4e31; ">
        <div class="sidebar-container" style="overflow-y: auto; max-height: 90vh;">
            <div class="side-header">
                <img
                    src="../bg-logo-img/logo.jpg"
                    width="120"
                    height="120"
                    alt=""
                    class="admin-profile" />
                <h5 style="margin-top: 10px">Hello, <?= $_SESSION['admin_first_name'] ?>!</h5>
            </div>

            <hr
                style="
          border: 1px solid;
          background-color: #ffdbb5;
          border-color: #603f26;
          margin: 12px 0;
        " />
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="./admin.php"><i class="fa fa-home"></i> Dashboard</a>

            <a href="javascript:void(0)" class="dropdown-btn" onclick="toggleProdInfoDropdown()">
                <i class="fa fa-shirt"></i> Product Info. <i class="fa fa-caret-down"></i>
            </a>
            <div class="prod-info-container" style="display: none; margin-left: 20px;">
                <a href="#category" onclick="showCategory(); closeNav()"><i class="fa fa-th-large"></i> Category</a>
                <a href="#sizes" onclick="showSizes(); closeNav()"><i class="fa fa-th"></i> Sizes</a>
            </div>

            <a href="javascript:void(0)" class="dropdown-btn" onclick="toggleInventoryDropdown()">
                <i class="fa fa-warehouse"></i> Inventory <i class="fa fa-caret-down"></i>
            </a>
            <div class="inventory-container" style="display: none; margin-left: 20px;">
                <a href="#products" onclick="showProductItems(); closeNav()"><i class="fa fa-th"></i> Products</a>
                <a href="#productsizes" onclick="showProductSizes(); closeNav()"><i class="fa fa-th-list"></i> Product Stocks</a>
            </div>

            <a href="javascript:void(0)" class="dropdown-btn" onclick="togglePaymentDropdown()">
                <i class="fa fa-money-bills"></i> Payments <i class="fa fa-caret-down"></i>
            </a>
            <div class="bank-container" style="display: none; margin-left: 20px;">
                <!-- <a href="#products" onclick="showBank(); closeNav()"><i class="fa fa-credit-card"></i> Bank Account</a> -->
                <a href="#productsizes" onclick="showEWallet(); closeNav()"><i class="fa fa-wallet"></i> E-Wallet</a>
            </div>

            <a href="#customers" onclick="showCustomers(); closeNav()"><i class="fa fa-users"></i> Customers</a>

            <a href="#products" onclick="showSupplier(); closeNav()"><i class="fa fa-user-tag"></i> Suppliers</a>

            <a href="javascript:void(0)" class="dropdown-btn" onclick="toggleOrderDropdown()">
                <i class="fa fa-bag-shopping"></i> Orders <i class="fa fa-caret-down"></i>
            </a>
            <div class="order-container" style="display: none; margin-left: 20px;">
                <a href="#pending" onclick="showPending(); closeNav()"><i class="fa fa-spinner"></i> Pending</a>
                <a href="#processing" onclick="showProcessing(); closeNav()"><i class="fa fa-hourglass-half"></i> Processing</a>
                <a href="#shipped" onclick="showShipped(); closeNav()"><i class="fa fa-hourglass-end"></i> Shipped</a>
                <a href="#delivered" onclick="showDelivered(); closeNav()"><i class="fa fa-square-check"></i> Delivered</a>
                <a href="#cancelled" onclick="showCancelled(); closeNav()"><i class="fa fa-xmark"></i> Cancelled</a>
            </div>

            <hr
                style="
          border: 1px solid;
          background-color: #ffdbb5;
          border-color: #603f26;
          margin: 4px 0;
        " />

            <a href="#admin" onclick="showAdmin(); closeNav()"> <i class="fa fa-user"></i> Administrator</a>

            <a href="#audit-trail" onclick="showAudit(); closeNav()"> <i class="fa-solid fa-newspaper"></i> Audit Trail Log</a>

            <a href="admin_logout.php"> <i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
        </div>


    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()">
            <i class="fa fa-home"></i>
        </button>
    </div>

    <?php
    include_once "./config/dbconnect.php";
    ?>

    <div class="container allContent-section py-4">
        <div class="row cards-container">
            <div class="col-sm-6 card-container">
                <div class="card" style="width: 100%; height: 400px;">
                    <p style="color: #ffeac5; font-size: 24px;">Weekly Sales</p>
                    <canvas id="weeklySalesChart" width="500" height="300"></canvas>
                </div>
            </div>

            <div class="col-sm-6 card-container">
                <div class="card" style="width: 100%; height: 400px;">
                    <p style="color: #ffeac5; font-size: 24px;">Monthly Sales</p>
                    <canvas id="monthlySalesChart" width="500" height="300"></canvas>
                </div>
            </div>

            <div class="col-sm-3 card-container">
                <div class="card">
                    <i class="fa fa-users mb-2" style="font-size: 70px"></i>
                    <p style="color: #ffeac5; font-size: 24px;">Total Users</p>
                    <p style="color: #ffeac5; font-size: 30px">
                        <?php
                        $sql = "SELECT * from users where isAdmin=0";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-sm-3 card-container">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px"></i>
                    <p style="color: #ffeac5; font-size: 24px;">Total Category</p>
                    <p style="color: #ffeac5; font-size: 30px">
                        <?php

                        $sql = "SELECT * from category";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-sm-3 card-container">
                <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px"></i>
                    <p style="color: #ffeac5; font-size: 24px;">Total Products</p>
                    <p style="color: #ffeac5; font-size: 30px">
                        <?php

                        $sql = "SELECT * from product";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-sm-3 card-container">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 70px"></i>
                    <p style="color: #ffeac5; font-size: 24px;">Pending Orders</p>
                    <p style="color: #ffeac5; font-size: 30px">
                        <?php

                        $sql = "SELECT * from orders WHERE orders.order_status = 0";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['category']) && $_GET['category'] == "success") {
        echo '<script> alert("Category Successfully Added")</script>';
    } else if (isset($_GET['category']) && $_GET['category'] == "error") {
        echo '<script> alert("Adding Unsuccess");</script>';
    }
    if (isset($_GET['size']) && $_GET['size'] == "success") {
        echo '<script> alert("Size Successfully Added")</script>';
    } else if (isset($_GET['size']) && $_GET['size'] == "error") {
        echo '<script> alert("Adding Unsuccess")</script>';
    }
    if (isset($_GET['variation']) && $_GET['variation'] == "success") {
        echo '<script> alert("Variation Successfully Added")</script>';
    } else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
        echo '<script> alert("Adding Unsuccess")</script>';
    }
    if (isset($_GET['supplier']) && $_GET['supplier'] == "success") {
        echo '<script> alert("Supplier Successfully Added")</script>';
    } else if (isset($_GET['supplier']) && $_GET['supplier'] == "error") {
        echo '<script> alert("Adding Unsuccess")</script>';
    }
    if (isset($_GET['bank']) && $_GET['bank'] == "success") {
        echo '<script> alert("Bank Details Successfully Added!")</script>';
    } else if (isset($_GET['bank']) && $_GET['bank'] == "error") {
        echo '<script> alert("Adding Unsuccess")</script>';
    }
    ?>
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="./assets/js/sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script
        src="https://kit.fontawesome.com/28c1079d43.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fetch data from backend
        fetch('./monthly_sales_chart.php')
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.month);
                const sales = data.map(item => parseFloat(item.total_sales));

                // Render the Chart
                const ctx = document.getElementById('monthlySalesChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar', // or 'bar'
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Monthly Sales',
                            data: sales,
                            borderColor: 'rgb(96, 63, 38)',
                            backgroundColor: 'rgb(255, 234, 197)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                labels: {
                                    color: 'rgb(255, 219, 181)' // Change legend text color
                                },
                                display: true
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: 'rgb(255, 219, 181)' // Change x-axis text color
                                }
                            },
                            y: {
                                ticks: {
                                    color: 'rgb(255, 219, 181)' // Change y-axis text color
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            });

        fetch('./weekly_sales_chart.php')
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.week);
                const sales = data.map(item => parseFloat(item.total_sales));

                // Render the Chart
                const ctx = document.getElementById('weeklySalesChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar', // or 'bar'
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Weekly Sales',
                            data: sales,
                            borderColor: 'rgb(96, 63, 38)',
                            backgroundColor: 'rgb(255, 234, 197)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                labels: {
                                    color: 'rgb(255, 219, 181)' // Change legend text color
                                },
                                display: true
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: 'rgb(255, 219, 181)' // Change x-axis text color
                                }
                            },
                            y: {
                                ticks: {
                                    color: 'rgb(255, 219, 181)' // Change y-axis text color
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
</body>

</html>
