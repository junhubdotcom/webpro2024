<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cartID = $_POST['cartID'];
    $updates = [];
    if (isset($_POST['productName'])) {
        $productName = $_POST['productName'];
        $updates[] = "productName = '$productName'";
    }
    if (isset($_POST['productPlan'])) {
        $productPlan = $_POST['productPlan'];
        $updates[] = "productPlan = '$productPlan'";
    }

    try {
        require_once "../orderdb.php";

        // Prepare SQL statement to update cart item
        $sql = "UPDATE cart SET " . implode(", ", $updates) . " WHERE cartID = :cartID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cartID', $cartID);
        $stmt->execute();

        // Respond with success message
        echo "Product details updated successfully";

    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

?>
