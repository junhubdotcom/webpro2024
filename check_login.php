<?php
session_start();

if(!isset($_SESSION['email'])){
    header('Location: login&register/login.html');
    exit();
}


?>