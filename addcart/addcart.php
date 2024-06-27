<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['productName']) && isset($_POST['productPlan']) && isset($_POST['productPrice']) && isset($_POST['productDiscount'])){
            $productName = $_POST['productName'];
            $productPlan = $_POST['productPlan'];
            $productPrice = $_POST['productPrice'];
            $productDiscount = $_POST['productDiscount'];
        }

        try{
            require_once "../orderdb.php";
    
            $query = "INSERT INTO cart (productName, productPlan, productPrice, productDiscount) 
                        VALUES (:productName, :productPlan, :productPrice, :productDiscount);";
    
            $stmt = $pdo->prepare($query);
    
            $stmt->bindParam(':productName', $productName);
            $stmt->bindParam(':productPlan', $productPlan);
            $stmt->bindParam(':productPrice', $productPrice);
            $stmt->bindParam(':productDiscount', $productDiscount);
    
            $stmt->execute();
    
            $pdo = null;
            $stmt = null;
    
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }

    }


    



?>