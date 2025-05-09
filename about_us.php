<?php
    include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link rel="icon" type="image/png" href="images/iu_favicon.png">
    <link rel="stylesheet" href="styles/aboutus.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html" title="Home"><pre>Home</pre></a></li>
                <li><a href="about_us.php" title="About Us"><pre>About Us</pre></a></li>
                <li><a href="mailto:vuleminhduc19@gmail.com" target="_blank" title="Contact"><pre>Contact</pre></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>About Us</h1>
        <pre>
            The IU Canteen app is designed to enhance the dining experience for students and staff at International University. 
            With a user-friendly interface, the app allows users to browse the menu, place orders, and view nutritional 
            information all in one place. Users can easily check the daily specials and working hours, making it convenient to 
            plan their meals. Whether you’re in a hurry between classes or looking to explore new dishes, the IU Canteen app is
            your go-to solution for a seamless and enjoyable dining experience.
        </pre>

        <h1>Working Hours</h1>
        <table>
            <tr>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
            </tr>
            <tr>
                <td>7:00 am - 5:00 pm</td>
                <td>7:00 am - 5:00 pm</td>
                <td>7:00 am - 5:00 pm</td>
                <td>7:00 am - 5:00 pm</td>
                <td>7:00 am - 5:00 pm</td>
                <td>7:00 am - 5:00 pm</td>
                <td>Closed</td>
            </tr>
        </table>

        <h1>Our Cooperate Restaurant</h1>
        <?php
            $sql = "SELECT * FROM restaurant";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    echo '<pre>' . htmlspecialchars($row['name']) . '</pre>';
                }
            }
        ?>
    </main>

    <footer>
        <p>Author: Group 8</p>
        <p>&copy; Copyright Reserved</p>
        <small><a href="mailto:vuleminhduc19@gmail.com">vuleminhduc19@gmail.com</a></small>
    </footer>
</body>
</html>