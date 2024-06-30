<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['cartID'])){
            $cartID = $_POST['cartID'];
        }

        try{
            require_once "../orderdb.php";

            $query = "DELETE FROM cart WHERE cartID = :cartID";
    
            $stmt = $pdo->prepare($query);
    
            $stmt->bindParam(':cartID', $cartID, PDO::PARAM_INT);
    
            $stmt->execute();
    
            $pdo = null;
            $stmt = null;

            echo "Deleted cart item with ID: $cartID";
    
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }

    }

?>