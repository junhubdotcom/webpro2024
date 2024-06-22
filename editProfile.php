<?php
session_start();
include 'connect.php';

// Check if the user is logged in
if(!isset($_SESSION['email'])){
    echo "<script>alert('Please log in to view your profile.'); window.location.href='login.html';</script>";
    exit();
}

// Fetch user details from the database using the email stored in the session
$email = $_SESSION['email'];
$dbinfo = "SELECT firstName, lastName, email, password FROM users WHERE email='$email'";
$dbresult = mysqli_query($conn, $dbinfo);
$rt = mysqli_fetch_array($dbresult);

$fname = htmlspecialchars($rt['firstName']);
$lname = htmlspecialchars($rt['lastName']);
$mail = htmlspecialchars($rt['email']);
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
                <!-- <li class="nav-item">
                    <a class="nav-link" href="profile.html">Profile</a>
                </li> -->
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
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $mail; ?>" required>
                    </div>
                    <button type="submit" class="btn savebtn">Save Changes</button>
                </form>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        // Optional: Add JavaScript for form submission confirmation using SweetAlert2
        document.getElementById('editProfileForm').addEventListener('submit', function(event) {
            event.preventDefault();
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
    </script>
</body>
</html>
