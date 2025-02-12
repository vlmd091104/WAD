<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styleprofile.css">
    <link rel="icon" type="image/png" href="images/iu_favicon.png">
</head>
<body>
    <div>
        <p>
        Hello <?php
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = mysqli_query($conn, "SELECT user.* FROM `user` WHERE user.email='$email'");
            $row = mysqli_fetch_array($query);
            echo htmlspecialchars($row['fullname']);
        }
        ?>
        </p>
        <p>
            Your email: <?php
            if (isset($row)) { // Check if $row is set
                echo htmlspecialchars($row['email']);
            }
            ?>
        </p>
        <p>
            Your phone: <?php
            if (isset($row)) { // Check if $row is set
                echo htmlspecialchars($row['phone']);
            }
            ?>
        </p>
        <a href="logout.php">Logout</a>
        <a href="menu.php">Menu</a>
    </div>
</body>
</html>