<?php
include 'check_login.php';
?>

<!DOCTYPE html>
<html>
    <head>

        <title>Surprize Box</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/61bf9d238a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/main_style.css">
        <script src="https://kit.fontawesome.com/61bf9d238a.js" crossorigin="anonymous"></script>
    
    </head>

    <body>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
            integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="main.js"></script>

    <!--Navbar-->
    <nav class="navbar navbar-expand-md">
        <div class="logo-navbar">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
            <a id = clock></a>
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
                <!-- <li class="nav-item">
                    <a class="nav-link" href="order.html">Order</a>
                </li> -->
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

    <header class="sub-header jumbotron jumbotron-fluid text-white">
        <div class="sub-description">
            <h1>FILL YOUR NIGHT WITH SUPRIZE</h1>
            <p>Delight in <span>exclusive</span> snack experiences from <span>around the globe</span> with <span>SUB-prize</span>! Indulge in limited edition snack boxes delivered straight to your door, adding a dose of excitement to your nights.</p>
            <a href = "gallery.html"><button class="btn btn-outline-secondary btn-lg">Tell Me More!</button></a>
        </div>
    </header>

    <div class="aboutUs">
        <div class="container-fluid py-5">
            <div class="row py-3">
                <div class="col-md-6 col-xs-12 aboutUsDesc">
                    <h1 class = "text-uppercase mb-3">About Us</h1>
                    <p>Surprize Box is a subscription-based service that delivers a box of unique 
                        snacks to your doorstep every month. Each box contains a variety of snacks 
                        from around the world, allowing you to discover new and exciting flavors without 
                        leaving your home. Our mission is to bring joy and excitement to snack time, 
                        making it a fun and memorable experience for everyone. Whether you're a foodie 
                        looking to expand your palate or just someone who loves trying new things, Surprize
                            Box has something for you. Sign up today and start your snacking adventure!</p>
                    <a href = "subscription.html"><button class = 'btn btn-outline-secondary btn-lg'>Subscribe Now!</button></a>
                </div>
            </div>
        </div>
    </div>
 

    <!--How to Order-->
    <div class = "how2" id = "how2">
        <div class = "container-fluid py-5">
            <div class = "row py-3" >
                <div class = "col-md-4 col-lg-7 mx-auto text-center">
                    <h1 class = "text-uppercase mb-4">How to Order</h1>
                    <h3>Get Your Personalized Party Box</h>
                </div>

            </div>
            <div class = "row algin-items-center">
                <div class = " col-md-4 col-lg-4 text-center">
                    <h2>Step 1</h2>
                    <div class = "card border-0 bg-light">
                        <div class = "class-body">
                            <img src = "images/step2.png" class ="img-fluid" alt= "step 1" >
                        </div> 
                    </div>
                    <h2>Customize</h2>
                </div>

                <div class = " col-md-4 col-lg-4 text-center">
                    <h2>Step 2</h2>
                    <div class = "card border-0 bg-light rounded">
                        <div class = "class-body">
                            <img src = "images/step1.png" class ="img-fluid rounded-10" alt= "step 2" >
                        </div> 
                    </div>
                    <h2>Subscribe</h2>
                </div>

                <div class = " col-md-4 col-lg-4 text-center">
                    <h2>Step 3</h2>
                    <div class = "card border-0 bg-light">
                        <div class = "class-body">
                            <img src = "images/step3.png" class ="img-fluid" alt= "step 3" >
                        </div> 
                    </div>
                    <h2>Enjoy</h2>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer class="footer text-white pt-5 pb-4">

        <div class="container text-center text-md-left">

            <div class="row text-center text-md-left">

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-success">
                        <oran>SUB-Prize</oran>
                    </h5>
                    <p>Accessing snack from different regions all time with SUB-prize</p>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-success">
                            <oran>Services</oran>
                        </h5>
                        <p><a href="index.html">Home</a></p>
                        <p><a href="gallery.html">Gallery</a></p>
                        <p><a href="subscription.html">Subscription</a></p>
                        <p><a href="help.html">Help</a></p>
                    </div>

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3 subscribe">
                    <h4>Let's have a surprise!</h4>
                    <p>Join our newsletter and receive tasty news and deals!</p>

                    <div class="container">
                        <div class="email">
                            <form action="send.php" method="post">
                                <input type="hidden" name="referrer" value="index.php">
                                <input type="text" class="emailinp" name="emailinp" placeholder="Enter your email" required>
                                <button type="submit" name="submit" onclick="openPopup()"><i
                                        class="fa-solid fa-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <hr class="mb-4 text-warning">

            <div class="row algin-items-center">

                <div class="col-md-7 col-lg-8">
                    <p>Copyright ©2020 All rights reserved by:
                        <a href="#" style="text-decoration: none;">
                            <strong>
                                <oran>SUB-Prize</oran>
                            </strong></a>
                    </p>
                </div>

                <div class="col-md-5 col-lg-4">
                    <div class="text-center text-md-right">

                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-lg text-white" style="font-size: 23px;">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-lg text-white" style="font-size: 23px;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-lg text-white" style="font-size: 23px;">
                                    <i class="fab fa-google-plus"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-lg text-white" style="font-size: 23px;">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-lg text-white" style="font-size: 23px;">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

    </footer>

    <!--Pop UP-->
    <div class="popup" id="popup">
        <h2>Thank You!</h2>
        <p>We will send update information to your email.</p>
        <button type="button" class="okbutton" onclick="closePopup()">OK</button>
    </div>

    <script>
        let popup = document.getElementById("popup");

        function openPopup() {
            popup.classList.add("open-popup");
        }
        function closePopup() {
            popup.classList.remove("open-popup");
        }

    </script>

    <div id="mouse-trailer"></div>
    
    </body>


</html>