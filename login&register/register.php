<?php 

include 'connect.php';

if(isset($_POST['signUp'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

     $checkEmail="SELECT * From users where email='$email'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        echo "<script>alert('Email Address Already Exists !');window.location.href='login.html';</script>";
     }
     else{
        $insertQuery="INSERT INTO users(firstName,lastName,email,password)
                       VALUES ('$firstName','$lastName','$email','$password')";
            if($conn->query($insertQuery)==TRUE){
                echo "<script>alert('Sign Up successfully! Please Sign In using your email and password.'); window.location.href='login.html';</script>";
                // header("location: ../summary.html");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}

if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password) ;
   
   $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    echo "<script>alert('Sign In successfully!');window.location.href='../summary.php';</script>";
    // header("Location: ../summary.html");
    exit();
   }
   else{
    echo "<script>alert('Not Found, Incorrect Email or Password'); window.location.href='login.html';</script>";
   }

}
?>