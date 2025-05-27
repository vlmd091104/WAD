<?php

include 'connect.php';

if(isset($_POST['signUp'])){
    $fullName=$_POST['fName'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $password=md5($password);//encrypt md5 password

    $checkEmail="SELECT * From users where email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows> 0){
        echo"Email Address Already Exists!";
    } else{
        $insertQuery="INSERT INTO users(fullname,email,phone,password) VALUES ('$fullName','$email','$phone','$password')";
        if($conn->query($insertQuery)==TRUE){
            header("location: index.html");
        }else{
            echo "Error:".$conn->error;
        }
    }
}

if(isset($_POST['signIn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $sql="SELECT * FROM users WHERE email=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['logged_in'] = true;
        header("location: menu.php");
        exit();
    } else {
        echo"Incorrect Email or Password. Try again!";
    }
}
?>