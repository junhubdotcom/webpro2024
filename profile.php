<?php
session_start();
include 'connect.php';
include 'orderdb.php';

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
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
// $password = htmlspecialchars($rt['password']); // Consider not displaying the password for security reasons
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
    <div>
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
    </div>

    <div class="row">
        <div class="container-fluid col-sm-12 col-md-12 col-lg-12 profile">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <h2>My Profile</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn editbtn" onclick="navToEditPage()">
                            <i class="fas fa-pen"></i> Edit
                        </button>
                    </div>
                </div>

                <p><b>Name:</b> <?php echo $fname; ?> <?php echo $lname; ?></p>
                <p><b>Email:</b> <?php echo $mail; ?></p>
            </div>
        </div>
    </div>
    <hr>
    <div class="my-sub">
        <h2>My Subscription</h2>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Order Status</th>
                    <th>Order Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM order_history";
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                $result = $stmt->fetchAll();
                if ($result) {

                    foreach ($result as $row) {
                ?>
                        <tr>
                            <td><a href="order_history.php?order_id=<?= $row['order_id'];?>"><?= $row['order_id'];?></a></td>
                            <td><?= $row['productName'];?></td>
                            <td><?= $row['date'];?></td>
                            <td><?= $row['productPrice'];?></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4">No Record Found</td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>

</body>
<script>
    function navToEditPage() {
        window.location.href = 'editProfile.php';
    }
</script>

</html>