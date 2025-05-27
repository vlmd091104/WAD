<?php
session_start();
include("connect.php");

if (isset($_POST['update'])) {
    $email = $_SESSION['email'];
    $newFullname = $_POST['fullname'];
    $newPhone = $_POST['phone'];
    
    // Update user information
    $updateQuery = "UPDATE users SET fullname=?, phone=? WHERE email=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sss", $newFullname, $newPhone, $email);
    
    if ($stmt->execute()) {
        header("Location: profile.php?success=1");
    } else {
        header("Location: profile.php?error=1");
    }
    exit();
}
?> 