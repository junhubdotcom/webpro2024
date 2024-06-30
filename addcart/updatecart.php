<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cartID = $_POST['cartID'];
    $productName = $_POST['productName'];

    try {
        require_once "../orderdb.php";

        // Prepare SQL statement to update cart item
        $query = "UPDATE cart SET productName = :productName; WHERE cartID = :cartID"; ;
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':cartID', $cartID);
        $stmt->execute();

        $pdo = null;
        $stmt = null;
        // Respond with success message
        echo "Product details updated successfully";

    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

?>
