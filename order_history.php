<?php 
session_start();
include 'orderdb.php';

if (!isset($_GET['order_id'])) {
    echo "<script>alert('No order ID provided.'); window.location.href='profile.php';</script>";
    exit();
}

$order_id = $_GET['order_id'];

$query = "SELECT * FROM order_history WHERE order_id = :order_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['order_id' => $order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    echo "<script>alert('Order not found.'); window.location.href='profile.php';</script>";
    exit();
}

$email = htmlspecialchars($order['email']);
$firstName = htmlspecialchars($order['firstName']);
$lastName = htmlspecialchars($order['lastName']);
$phone = htmlspecialchars($order['phone']);
$address = htmlspecialchars($order['address']);
$postalCode = htmlspecialchars($order['postalCode']);
$state = htmlspecialchars($order['state']);
$city = htmlspecialchars($order['city']);
$country = htmlspecialchars($order['country']);
$paymentMethod = htmlspecialchars($order['paymentMethod']);
$productName = htmlspecialchars($order['productName']);
$productPrice = htmlspecialchars($order['productPrice']);
$productDiscount = htmlspecialchars($order['productDiscount']);
$totalPrice = htmlspecialchars($order['totalPrice']);
$date = htmlspecialchars($order['date']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Order History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/order_history.css">

</head>

<body class="bg-light">
    <div class="container" id="SUM">
        <div class="py-5 text-center">
            <img class="mx-auto" src="images/oLogo.png" width="360" height="180">
            <h2>Order History</h2>
            <p class="lead">Thank you for your order! Below are the details of your purchase.</p>
        </div>
        <div class="row">
            <div class="col-md-6 order-md-1">
                <h4 class="mb-3">Shipping Details</h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <strong>Email:</strong><?php echo $email;?>
                    </li>
                    <li class="list-group-item">
                        <strong>Name:</strong><?php echo $firstName;?><?php echo $lastName;?>
                    </li>
                    <li class="list-group-item">
                        <strong>Phone:</strong><?php echo $phone;?>
                    </li>
                    <li class="list-group-item">
                        <strong>Address:</strong><?php echo $address;?>
                    </li>
                    <li class="list-group-item">
                        <strong>Postal Code:</strong><?php echo $postalCode;?>
                    </li>
                    <li class="list-group-item">
                        <strong>State:</strong><?php echo $state;?>
                    </li>
                    <li class="list-group-item">
                        <strong>City:</strong><?php echo $city;?>
                    </li>
                    <li class="list-group-item">
                        <strong>Country:</strong><?php echo $country;?>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 order-md-2">
                <h4 class="mb-3">Order Summary</h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <h5><?php echo $productName;?></h5>
                            <h5>RM<?php echo $productPrice;?></h5>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <h5>Product Discount</h5>
                            <h5>RM<?php echo $productDiscount;?></h5>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <h4>
                                <oran>Total</oran>
                            </h4>
                            <h4>
                                <oran>RM<?php echo $totalPrice;?></oran>
                            </h4>
                        </div>
                    </li>
                </ul>
                <h4 class="mb-3">Payment Details</h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <strong>Payment Method:</strong><?php echo $paymentMethod;?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="confirm-page-button">

        <div class="printButton text-center">
            <div class="row d-flex justify-content-center mt-5">
                <a href="subscription.html" class="btn1 btn-primary btn-lg me-5">&lt; Back to cart</a>
                <button class="btn-print btn-outline-secondary btn-lg" type="button">Print Me</button>
            </div>
        </div>
    </div>

    <br>

    <script>
        const btnPrint = document.querySelector('.btn-print');

        btnPrint.addEventListener('click', () => {
            window.print();
        });
    </script>

</body>

</html>