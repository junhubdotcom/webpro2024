<?php
session_start();
include 'connect.php';

if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    // Update the user's profile data in the database
    $updateQuery = "UPDATE users SET firstName='$firstName', lastName='$lastName' WHERE email='$email'";
    if($conn->query($updateQuery) === TRUE){
        $_SESSION['email'] = $email; // Update session email if changed
        echo "<script>alert('Profile updated successfully!'); window.location.href='profile.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='profile.php';</script>";
}
?>
