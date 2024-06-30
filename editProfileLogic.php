<?php
session_start();
include 'connect.php';

if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_SESSION['email'];
    $oldPassword = md5($_POST['oldPassword']);
    $newPassword = md5($_POST['newPassword']);
    $confirmPassword = md5($_POST['confirmPassword']);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        if($storedPassword == $oldPassword) {
            // Update user's profile data with prepared statement
            $stmtUpdate = $conn->prepare("UPDATE users SET firstName=?, lastName=?, password=? WHERE email=?");
            $stmtUpdate->bind_param("ssss", $firstName, $lastName, $newPassword, $email);

            if($stmtUpdate->execute()) {
                echo "<script>alert('Profile updated successfully!'); window.location.href='profile.php';</script>";
            } else {
                echo "<script>alert('Error updating profile!'); window.location.href='editProfile.php';</script>";
            }

            $stmtUpdate->close();
        } else {
            echo "<script>alert('Old password is not valid!'); window.location.href='editProfile.php';</script>";
        }
    } else {
        echo "<script>alert('Error fetching data!'); window.location.href='editProfile.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request!'); window.location.href='editProfile.php';</script>";
}
?>
