<?php 

include '../connect.php';

if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Use prepared statement to check email
    $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email Address Already Exists!');window.location.href='login.html';</script>";
    } else {
        // Use prepared statement to insert user
        $insertQuery = $conn->prepare("INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
        $insertQuery->bind_param("ssss", $firstName, $lastName, $email, $password);
        if ($insertQuery->execute()) {
            echo "<script>alert('Sign Up successfully! Please Sign In using your email and password.'); window.location.href='login.html';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Use prepared statement for sign in
    $sql = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $sql->bind_param("ss", $email, $password);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        echo "<script>alert('Sign In successfully!'); window.location.href='../index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Not Found, Incorrect Email or Password'); window.location.href='login.html';</script>";
    }
}

?>