<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - IU Canteen</title>
    <link rel="icon" type="image/png" href="images/iu_favicon.png">
    <link rel="stylesheet" href="styles/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <div class="navbar">
            <h1>IU Canteen</h1>
            <nav>
                <a href="index.html">Home</a>
                <a href="menu.php">Menu</a>
                <a href="#">Promotion</a>
                <a href="about_us.php">About Us</a>
            </nav>
            <div class="icons">
                <a href="cart.php"><img src="https://www.coykendallchiropractic.com/wp-content/uploads/2021/09/food.png" alt="Cart"></a>
                <a href="profile.php"><img src="https://th.bing.com/th/id/R.8e2c571ff125b3531705198a15d3103c?rik=muXZvm3dsoQqwg&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fpng-user-icon-person-icon-png-people-person-user-icon-2240.png&ehk=MfHYkGonqy7I%2fGTKUAzUFpbYm9DhfXA9Q70oeFxWmH8%3d&risl=&pid=ImgRaw&r=0" alt="User Icon"></a>
            </div>
        </div>

       
        <!-- Content Section -->
        <div class="content">
            <!-- Order Section -->
    
        <div class="menu-section">
            <h2>HD food</h2>
            <?php
                $sql = "SELECT * FROM product WHERE product.restaurant_id = 1";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="menu-item">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                        echo '<p>Price: ' . htmlspecialchars($row['price']) . ' VND</p>';
                        echo '<i class="fa fa-cart-plus add-to-cart-icon" 
                        data-id="' . htmlspecialchars($row['product_id']) . '" 
                        data-name="' . htmlspecialchars($row['name']) . '" 
                        data-price="' . htmlspecialchars($row['price']) . '"></i>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
    
        <div class="menu-section">
            <h2>Big U</h2>
            <?php
                $sql = "SELECT * FROM product WHERE product.restaurant_id = 2";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="menu-item">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                        echo '<p>Price: ' . htmlspecialchars($row['price']) . ' VND</p>';
                        echo '<i class="fa fa-cart-plus add-to-cart-icon" 
                        data-id="' . htmlspecialchars($row['product_id']) . '" 
                        data-name="' . htmlspecialchars($row['name']) . '" 
                        data-price="' . htmlspecialchars($row['price']) . '"></i>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
    
        <div class="menu-section">
            <h2>Com Viet</h2>
            <?php
                $sql = "SELECT * FROM product WHERE product.restaurant_id = 3";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="menu-item">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                        echo '<p>Price: ' . htmlspecialchars($row['price']) . ' VND</p>';
                        echo '<i class="fa fa-cart-plus add-to-cart-icon" 
                        data-id="' . htmlspecialchars($row['product_id']) . '" 
                        data-name="' . htmlspecialchars($row['name']) . '" 
                        data-price="' . htmlspecialchars($row['price']) . '"></i>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
        <div class="menu-section">
            <h2>T&D</h2>
            <?php
                $sql = "SELECT * FROM product WHERE product.restaurant_id = 4";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="menu-item">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                        echo '<p>Price: ' . htmlspecialchars($row['price']) . ' VND</p>';
                        echo '<i class="fa fa-cart-plus add-to-cart-icon" 
                        data-id="' . htmlspecialchars($row['restaurant_id']) . '" 
                        data-name="' . htmlspecialchars($row['name']) . '" 
                        data-price="' . htmlspecialchars($row['price']) . '"></i>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
        <div class="menu-section">
            <h2>Coffee Story</h2>
            <?php
                $sql = "SELECT * FROM product WHERE product.restaurant_id = 5";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="menu-item">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                        echo '<p>Price: ' . htmlspecialchars($row['price']) . ' VND</p>';
                        echo '<i class="fa fa-cart-plus add-to-cart-icon" 
                        data-id="' . htmlspecialchars($row['restaurant_id']) . '" 
                        data-name="' . htmlspecialchars($row['name']) . '" 
                        data-price="' . htmlspecialchars($row['price']) . '"></i>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
        <script class="addtocart.js"></script>
        </div>
    </div>
</body>
</html>
