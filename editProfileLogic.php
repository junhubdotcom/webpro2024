<?php
session_start();
include 'connect.php';

if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword']) ){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_SESSION['email'];
    // echo "<script>alert('Hello');<script>";
    $oldPassword = $_POST['oldPassword'];
    $oldPassword= md5($oldPassword);
    $newPassword = $_POST['newPassword'];
    $newPassword= md5($newPassword);
    $confirmPassword = $_POST['confirmPassword'];
    $confirmPassword= md5($confirmPassword);

    

    $getPassword = "SELECT password From users WHERE email='$email'" ;
    $getPasswordResult = $conn -> query($getPassword);
    if($getPasswordResult->num_rows>0){
        $row = $getPasswordResult->fetch_assoc();
        $storedPassword = $row['password'];
        if($storedPassword==$oldPassword){ 
            // Update the user's profile data in the database
            $updateQuery = "UPDATE users SET firstName='$firstName', lastName='$lastName', password='$newPassword' WHERE email='$email'";
            if($conn->query($updateQuery) === TRUE){
                // $_SESSION['email'] = $email; // Update session email if changed
                echo "<script>alert('Profile updated successfully!'); window.location.href='profile.php';</script>";
                
            } else {
                echo "Error updating record: " . $conn->error;
            }

        }else{
            echo "<script>alert('Old password is not valid!'); window.location.href='editProfile.php';</script>";
        }
       
    }else{
        echo "Error updating record: " . $conn->error;
    }

    
} else {
    echo "<script>alert('Invalid request!'); window.location.href='editProfile.php';</script>";
}
?>
