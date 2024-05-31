<?php
// order_confirmation.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $postalCode = htmlspecialchars($_POST['postalCode']);
    $state = htmlspecialchars($_POST['state']);
    $city = htmlspecialchars($_POST['city']);
    $country = htmlspecialchars($_POST['country']);
    $paymentMethod = htmlspecialchars($_POST['paymentMethod']);
    $cardName = htmlspecialchars($_POST['cardName']);
    $cardNo = htmlspecialchars($_POST['cardNo']);
    $expiredDate = htmlspecialchars($_POST['expiredDate']);
    $cardVerification = htmlspecialchars($_POST['cardVerification']);
    $saveInfo = isset($_POST['saveInfo']) ? 'Yes' : 'No';
    // Assume order details and discounts are fetched from the session or database
    $productName = "Product name";
    $productPrice = 400;
    $productDiscount = 100;
    $totalPrice = $productPrice - $productDiscount;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <h2>Order Confirmation</h2>
            <p class="lead">Thank you for your order! Below are the details of your purchase.</p>
        </div>
        <div class="row">
            <div class="col-md-6 order-md-1">
                <h4 class="mb-3">Shipping Details</h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <strong>Email:</strong> <?php echo $email; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Name:</strong> <?php echo $firstName . ' ' . $lastName; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Phone:</strong> <?php echo $phone; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Address:</strong> <?php echo $address; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Postal Code:</strong> <?php echo $postalCode; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>State:</strong> <?php echo $state; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>City:</strong> <?php echo $city; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Country:</strong> <?php echo $country; ?>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 order-md-2">
                <h4 class="mb-3">Order Summary</h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <h5><?php echo $productName; ?></h5>
                            <h5>$<?php echo $productPrice; ?></h5>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <h5>Product Discount</h5>
                            <h5>-$<?php echo $productDiscount; ?></h5>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <h4>Total</h4>
                            <h4>$<?php echo $totalPrice; ?></h4>
                        </div>
                    </li>
                </ul>
                <h4 class="mb-3">Payment Details</h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <strong>Payment Method:</strong> <?php echo $paymentMethod; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Name on Card:</strong> <?php echo $cardName; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Card Number:</strong> <?php echo str_repeat('*', strlen($cardNo) - 4) . substr($cardNo, -4); ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Expiration Date:</strong> <?php echo $expiredDate; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>CVV:</strong> <?php echo str_repeat('*', strlen($cardVerification)); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>