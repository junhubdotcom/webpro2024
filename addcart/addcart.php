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

            $checkQuery = "SELECT cartID FROM cart LIMIT 1";
            $checkStmt = $pdo->prepare($checkQuery);
            $checkStmt->execute();
            $cartID = $checkStmt->fetchColumn();

            if ($cartID) {
                // If a record exists, update the existing record
                $query = "UPDATE cart SET productName = :productName, productPlan = :productPlan, productPrice = :productPrice, productDiscount = :productDiscount WHERE cartID = :cartID";
            } else {
                // If no record exists, insert a new record
                $query = "INSERT INTO cart (productName, productPlan, productPrice, productDiscount) 
                        VALUES (:productName, :productPlan, :productPrice, :productDiscount);";
            }
    
            $stmt = $pdo->prepare($query);
    
            $stmt->bindParam(':productName', $productName);
            $stmt->bindParam(':productPlan', $productPlan);
            $stmt->bindParam(':productPrice', $productPrice);
            $stmt->bindParam(':productDiscount', $productDiscount);

            if ($cartID) {
                $stmt->bindParam(':cartID', $cartID, PDO::PARAM_INT);
            }
    
            $stmt->execute();
    
            $pdo = null;
            $stmt = null;
    
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }

    }


    



?>