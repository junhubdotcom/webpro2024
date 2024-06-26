<?php
session_start();
include 'connect.php';

// Check if the user is logged in
if(!isset($_SESSION['email'])){
    echo "<script>alert('Please log in to view your profile.'); window.location.href='login.html';</script>";
    exit();
}

// Fetch user details from the database using prepared statements
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT firstName, lastName FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$rt = $result->fetch_assoc();

$fname = htmlspecialchars($rt['firstName']);
$lname = htmlspecialchars($rt['lastName']);
$stmt->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/61bf9d238a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <title>Profile</title>
</head>
<body>
    <nav class="navbar navbar-expand-md">
        <div class="logo-navbar">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
            <a id="clock"></a>
        </div>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.html">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="subscription.html">Subscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="help.html">Help</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="profile.php">
                        <i class="fa-solid fa-user"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row">
    <div class="container-fluid col-sm-12 col-md-12 col-lg-12 profile">
            
                <h2>Edit Profile</h2>
                <form id="editProfileForm" action="editProfileLogic.php" method="POST">
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $fname; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lname; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="oldPassword">Old Password:</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                    </div>

                    <div class="form-group">
                        <label for="newPassword">New Password:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        <span style="color: red" id="new_password_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        <span style="color: red" id="confirm_password_error"></span>
                    </div>

                    <div>
                        <button type="submit" class="btn savebtn">Save Changes</button>
                        <button type="button" class="btn backbtn" onclick="backToProfile()">Back</button>
                    </div>

                    
                </form>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function(){
        const newPassword= document.getElementById('newPassword');
        const confirmPassword= document.getElementById('confirmPassword');
        const newPasswordError= document.getElementById('new_password_error');
        const confirmPasswordError= document.getElementById('confirm_password_error');

        // Optional: Add JavaScript for form submission confirmation using SweetAlert2
        document.getElementById('editProfileForm').addEventListener('submit', function(event) {
            event.preventDefault();
            newPasswordError.innerHTML = "";
            confirmPasswordError.innerHTML = "";
            if(!(newPassword.value.length >= 6)){
                event.preventDefault();
                newPasswordError.innerHTML = "Password must be more than 6 characters";
                return;
            }

            if(!(/[a-z]/.test(newPassword.value))){
                event.preventDefault();
                newPasswordError.innerHTML = "Password must contain at least one lowercase letter";
                return;
            }

            if(!(/[A-Z]/.test(newPassword.value))){
                event.preventDefault();
                newPasswordError.innerHTML = "Password must contain at least one uppercase letter";
                return;
            }

            if(!(/[0-9]/.test(newPassword.value))){
                event.preventDefault();
                newPasswordError.innerHTML = "Password must contain at least one number";
                return;
            }

            if(!(/[^a-zA-Z0-9]/.test(newPassword.value))){
                event.preventDefault();
                newPasswordError.innerHTML = "Password must contain at least one special character";
                return;
            }

            if(newPassword.value !== confirmPassword.value){
                event.preventDefault();
                confirmPasswordError.innerHTML = "Confirm password does not match with new password";
                return;
            }
            Swal.fire({
                title: 'Are you sure you want to update your profile?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Submit the form
                }
            });
        });

        function backToProfile(){
            window.location.href = "profile.php";
        }

    });
    </script>
</body>
</html>
