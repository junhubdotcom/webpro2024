<?php
    //这个要看你的database的资料没有错的话
    $servername = "localhost";
    $dbUsername = "root";
    $dbpassword = "";
    $dbname = "geturl";

    $conn = mysqli_connect($servername, $dbUsername, $dbpassword, $dbname);

    if(!$conn) {
        die("Connection To Database Failed:".mysqli_connect_error());
    }

    if(isset(($_GET["id"]))) {
        $mm = $_GET['id'];

        $dbinfo = "SELECT firstName, lastName, email, password FROM users WHERE id='$mm'";
        $dbresult = mysqli_query($conn, $dbinfo);
        $rt = mysqli_fetch_array($dbresult);

        $fname = $rt['firstName'];
        $lname = $rt['lastName'];
        $mail = $rt['email'];
        $password = $rt['password'];
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/61bf9d238a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <script src="https://kit.fontawesome.com/61bf9d238a.js" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>

<body>
    <nav class="navbar navbar-expand-md">
        <div class="logo-navbar">
            <a class="navbar-brand" href="index.html"><img src="images/logo.png"></a>
            <a id=clock></a>
        </div>

        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.html">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.html">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="subscription.html">Subscription</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="order.html">Order</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="help.html">Help</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row">

        <div class="container col-lg-5 col-md-6 col-md-6 profileimg">
            <img src="images/about.png">
        </div>

        <div class="container col-lg-7 col-md-6 col-md-6 profile">
            <div class="container profiledetail">
                <h1>My Profile</h1>
                <h3>First Name: <span><?php echo $fname; ?></span></h3>
                <h3>Last Name: <span><?php echo $lname; ?></span></h3>
                <h3>Email: <span><?php echo $mail; ?></span></h3>
                <h3>Password: <span><?php echo $password; ?></span></h3>
            </div>
        </div>
    </div>

</body>

</html>
