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
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="icon" type="image/png" href="images/iu_favicon.png">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_GET['success'])) {
            echo '<div class="alert success">Profile updated successfully!</div>';
        } elseif (isset($_GET['error'])) {
            echo '<div class="alert error">Failed to update profile. Please try again.</div>';
        }
        ?>
        
        <?php
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
            $row = mysqli_fetch_array($query);
            
            if ($row) {
        ?>
                <div class="profile-info">
                    <h2>Your Profile</h2>
                    <form action="update_profile.php" method="POST">
                        <div class="form-group">
                            <label for="fullname">Full Name:</label>
                            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($row['fullname']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" value="<?php echo htmlspecialchars($row['email']); ?>" disabled>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required>
                        </div>
                        
                        <div class="button-group">
                            <button type="submit" name="update" class="update-btn">Update Profile</button>
                            <a href="menu.php" class="menu-btn">Menu</a>
                            <a href="logout.php" class="logout-btn">Logout</a>
                        </div>
                    </form>
                </div>
        <?php
            }
        }
        ?>
    </div>
</body>
</html>