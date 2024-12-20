<?php
session_start();

if (!isset($_SESSION['user_email'])) {

    header("Location: ../landing-page/index.php?login=required");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Latenue.ave</title>
    <link rel="stylesheet" href="style.css" />
    <link
        rel="shortcut icon"
        href="../bg-logo-img/logo.jpg"
        type="image/x-icon" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


</head>

<body>
    <?php
    include_once "../admin_panel/config/dbconnect.php";
    $user_id = $_SESSION['user_id'];
    $count = 0;

    $sql = "SELECT COUNT(*) AS cart_count FROM cart WHERE user_id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $count = $row['cart_count'];
    }
    ?>
    <header class="nav-container">
        <div class="logo-container">
            <a href="">
                <p>Hello, <?= $_SESSION['first_name'] ?>!</p>
            </a>
        </div>

        <div class="searh-bar-container">
            <input type="text" placeholder="Search product" />
            <button class="search-btn">
                <i class="fa-solid fa-magnifying-glass fa-xl"></i>
            </button>
        </div>

        <div class="btn-container">
            <a href="#orders" onclick="showOrders()">
                <li class="fa-solid fa-bag-shopping fa-xl"></li>
            </a>
            <div class="add-to-cart-btn">
                <a href="#cart" onclick="showCart()">
                    <li class="fa-solid fa-cart-shopping fa-xl"></li>
                </a>
                <div class="cart-count-container">
                    <p class="cart-count"><?= $count ?></p>
                </div>
            </div>
            <a href="#logout" data-toggle="modal" data-target="#viewLogOut">
                <li class="fa-solid fa-right-from-bracket fa-xl"></li>
            </a>
        </div>
    </header>

    <main class="allContent-section-customer">
        <div class="best-selling-container">
            <p class="title-container">Top Products</p>
            <div class="item-cards-container">
                <div class="card" style="width: 18rem; height: 30rem;">
                    <img
                        src="img/black-long-sleeve.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 300px; object-fit: cover" />
                    <div class="card-body">
                        <h5 class="card-title">Long Sleeve and Skirt</h5>
                        <p class="card-text">
                            Silky sexy long sleeve top with highwaist beaded skirt. Not your
                            ordinary office casual
                        </p>
                        <button class="btn add-to-cart-btn" type="submit">Add to cart</button>
                    </div>
                </div>

                <div class="card" style="width: 18rem; height: 30rem;">
                    <img
                        src="img/line-suit-n-tie.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 300px; object-fit: cover" />
                    <div class="card-body">
                        <h5 class="card-title">Formal Fit</h5>
                        <p class="card-text">
                            Step up your fashion taste with line styled blouse with necktie
                            and high waist skirt.
                        </p>
                        <button class="btn add-to-cart-btn" type="submit">Add to cart</button>
                    </div>
                </div>

                <div class="card" style="width: 18rem; height: 30rem;">
                    <img
                        src="img/longsleevedress.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 300px; object-fit: cover" />
                    <div class="card-body">
                        <h5 class="card-title">Labubu Fit</h5>
                        <p class="card-text">
                            Step up your style with soft chiffon long sleeve top and
                            highwaist skirt with flower. choker
                        </p>
                        <button class="btn add-to-cart-btn" type="submit">Add to cart</button>
                    </div>
                </div>

                <div class="card" style="width: 18rem; height: 30rem;">
                    <img
                        src="img/mini-long-sleeve.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 300px; object-fit: cover" />
                    <div class="card-body">
                        <h5 class="card-title">Black Long Sleeve Dress</h5>
                        <p class="card-text">
                            Double lined textured fabric with low V neck line. Good for
                            casual attire.
                        </p>
                        <button class="btn add-to-cart-btn" type="submit">Add to cart</button>
                    </div>
                </div>

                <div class="card" style="width: 18rem; height: 30rem;">
                    <img
                        src="img/sleeveless-polo.jpg"
                        class="card-img-top"
                        alt="..."
                        style="height: 300px; object-fit: cover" />
                    <div class="card-body">
                        <h5 class="card-title">Black Sleeveless Polo Shirt</h5>
                        <p class="card-text">
                            Sleeveless polo shirt with highwaist black skirt With detachable
                            gold brooch pin.
                        </p>
                        <button class="btn add-to-cart-btn" type="submit">Add to cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="products-container">
            <p class="title-container">Products</p>
            <div class="item-cards-container">
                <?php
                include_once "../admin_panel/config/dbconnect.php";
                $sql = "SELECT p. * FROM product p
        JOIN product_size_variation ps ON ps.product_id = p.product_id
        GROUP BY p.product_id
        ORDER BY p.product_name ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $productId = $row['product_id'];
                ?>
                        <div class="card product" style="width: 14rem; height: 380px;">
                            <img
                                src='../admin_panel<?= $row["product_image"] ?>'
                                height='200px'
                                style="object-fit: cover;">
                            <div class="card-body">
                                <h6 class="card-title"><?= $row["product_name"] ?></h6>


                                <form enctype='multipart/form-data' action="controller/addToCartController.php" method="POST">
                                    <div class="size-section">
                                        <div class="form-group">
                                            <label for="sizeSelect-<?= $productId ?>">Size:</label>
                                            <select id="sizeSelect-<?= $productId ?>" name="size" onchange="updatePrice('<?= $productId ?>')">
                                                <option disabled selected>Select size</option>
                                                <?php
                                                $sizeSql = "SELECT ps.size_id, s.size_name, ps.unit_price, ps.variation_id
              FROM product_size_variation ps
              JOIN sizes s ON ps.size_id = s.size_id
              WHERE ps.product_id = '$productId'";
                                                $sizeResult = $conn->query($sizeSql);
                                                if ($sizeResult->num_rows > 0) {
                                                    while ($sizeRow = $sizeResult->fetch_assoc()) {
                                                        echo "<option value='" . $sizeRow['size_id'] . "' data-price='" . $sizeRow['unit_price'] . "' data-variation-id='" . $sizeRow['variation_id'] . "'>" . $sizeRow['size_name'] . "</option>";
                                                    }
                                                } else {
                                                    echo "<option value=''>No sizes available</option>";
                                                }
                                                ?>
                                            </select>
                                            <!-- Display the price -->
                                            <p id="priceDisplay-<?= $productId ?>">Price: <span class="price-value"></span></p>

                                            <!-- Get the variation id -->
                                            <input type="hidden" class="variationId-<?= $productId ?>" id="variation_id" value="" name="v_id">
                                        </div>

                                    </div>

                                    <div class="buttons-container form-group">
                                        <button
                                            class="btn view-btn"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#viewProduct"
                                            data-name="<?= $row["product_name"] ?>"
                                            data-desc="<?= $row["product_desc"] ?>"
                                            data-image="<?= $row["product_image"] ?>"
                                            id="view-button">
                                            View
                                        </button>
                                        <button
                                            class="btn add-to-cart"
                                            type="submit"
                                            name="upload">
                                            Add to Cart
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>

        <div class="modal fade" id="viewProduct" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="product-details">
                    <div class="modal-header">
                        <h4 class="modal-title">Product Details</h4>
                    </div>
                    <div class="modal-body product-details-body">
                        <img id="modalProductImage" src="" alt="Product Image" class="prod-img">
                        <p id="modalProductName" class="prod-name"></p>
                        <p id="modalProductDescription" class="prod-desc"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default modal-close-btn" data-dismiss="modal" style="height:40px">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="viewLogOut" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="product-details modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Log Out</h4>
                    </div>
                    <div class="modal-body product-details-body">
                        <p class="log-out-warning">Are you sure you want to log out?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="./script/logout.php" class="btn btn-default" style="height:40px">Log Out</a>
                        <button type="button" class="btn btn-default modal-close-btn" data-dismiss="modal" style="height:40px">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <?php
    if (isset($_GET['cart']) && $_GET['cart'] == "success") {
        echo '<script> alert("Product Successfully Added to Cart")</script>';
    } else if (isset($_GET['cart']) && $_GET['cart'] == "error") {
        echo '<script> alert("Adding Unsuccess");</script>';
    }
    if (isset($_GET['order']) && $_GET['order'] == "success") {
        echo '<script> alert("Order Place Successfully")</script>';
    } else if (isset($_GET['order']) && $_GET['order'] == "error") {
        echo '<script> alert("Adding Unsuccess");</script>';
    }
    ?>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script
        src="https://kit.fontawesome.com/28c1079d43.js"
        crossorigin="anonymous"></script>
    <script src="ajaxWork.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
