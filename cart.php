<?php
    include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IU Canteen - Cart</title>
    <link rel="stylesheet" href="style/cart.css">
    <link rel="icon" type="image/png" href="images/iu_favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="navbar">
            <h1>IU Canteen</h1>
            <nav>
                <a href="menu.php">Menu</a>
                <a href="about_us.php">About us</a>
                <a href="profile.php">My profile</a>
            </nav>
        </div>
    </header>
    <main>
        <h2>Cart</h2>
        <div class="cart-container">
            <div class="cart-items">
                <div class="item">
                    <div class="item-details">
                    <?php
                        $sql = "SELECT * FROM product WHERE product.product_id = 1";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                                echo '<p>' . htmlspecialchars($row['price']) . ' VND</p>';
                                echo '<i class="fa fa-trash" id="cart-remove"></i>';
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="order-summary">
                <h3>Order summary</h3>
                <p>Subtotal: <span><?php
                        $sql = "SELECT * FROM product WHERE product.product_id = 1";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo $row['price'];
                            }
                        }
                    ?> VND</span></p>
                <p>Shipping: <span>5000 VND</span></p>
                <p>Promotion: <span>0 VND</span></p>
                <p class="total">Total: <span>40000 VND</span></p>
                <a href="pmp.html"><button class="continue-button">Continue to payment →</button></a>
            </div>
        </div>
    </main>
    <script scr="addtocart.js"></script>
</body>
</html>
