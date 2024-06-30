<!DOCTYPE html>
<html>

<head>

    <title>Checkout Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/61bf9d238a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/order_confirmation.css">

</head>

<body class="bg-light">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <div class=container-fluid>
        <div class="checkout-form py-5">
            <div class="text-center">
                <img class="mx-auto" src="images/oLogo.png" width="360" height="180">
                <h2>Checkout</h2>
                <p class="lead text-muted">Please fill in your details below</p>
            </div>

            <form action="order_confirmation.php" method="POST">

                <h4 class="mb-3">Contact Information</h4>

                <div class="form-floating col-12 mt-3">
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email Address" required>
                    <label for="email" class="form-label text-muted">Email Address</label>
                    <div class="invalid-feedback">Please enter a valid email address</div>
                </div>

                <h4 class="mt-3 mb-3">Shipping Address</h4>

                <div class="row g-2">
                    <div class="form-floating col-sm-6 mb-3">
                        <input id="firstName" name="firstName" type="text" class="form-control" placeholder="First Name" required>
                        <label for="firstName" class="form-label text-muted">First Name</label>
                        <div class="invalid-feedback">Please enter your first name</div>
                    </div>
                    <div class="form-floating col-sm-6 mb-3">
                        <input id="lastName" name="lastName" type="text" class="form-control" placeholder="Last Name" required>
                        <label for="lastName" class="form-label text-muted">Last Name</label>
                        <div class="invalid-feedback">Please enter your last name</div>
                    </div>
                </div>

                <div class="form-floating col-12 mb-3">
                    <input id="phone" name="phone" type="tel" class="form-control" placeholder="Phone" pattern="[0-9]{3}-[0-9]{7}" title="Example: 123-4567890" required>
                    <label for="phone" class="form-label text-muted">Phone</label>
                </div>

                <div class="form-floating col-12 mb-3">
                    <input id="address" name="address" type="text" class="form-control" placeholder="Address" required>
                    <label for="address" class="form-label text-muted">Address</label>
                </div>

                <div class="row g-2">
                    <div class="form-floating col-sm-6 mb-3">
                        <input id="postalCode" name="postalCode" type="text" class="form-control" placeholder="Postal Code" pattern="[0-9]{5}" title="Example: 12345" required>
                        <label for="postalCode" class="form-label text-muted">Postal Code</label>
                        <div class="invalid-feedback">Please enter your postal code</div>
                    </div>

                    <div class="form-floating col-sm-6 mb-3">
                        <input id="state" name="state" type="text" class="form-control" placeholder="State" required>
                        <label for="state" class="form-label text-muted">State</label>
                        <div class="invalid-feedback">Please enter your state</div>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-sm-6 mb-3">
                        <div class="form-floating">
                            <select id="city" name="city" class="form-control" required>
                                <option value="">Select City...</option>
                                <option value="Perak">Perak</option>
                                <option value="Melacca">Melacca</option>
                                <option value="Selangor">Selangor</option>
                                <option value="Kuala Lumpur">Kuala Lumpur</option>
                            </select>
                            <label for="city" class="form-label text-muted">City</label>
                            <div class="invalid-feedback">Please enter your city</div>
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <div class="form-floating">
                            <select id="country" name="country" class="form-control" required>
                                <option value="">Select Country...</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Japan">Japan</option>
                                <option value="Korea">Korea</option>
                            </select>
                            <label for="country" class="form-label text-muted">Country</label>
                            <div class="invalid-feedback">Please enter your Country</div>
                        </div>
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="saveInfo">
                    <label class="form-check-label" for="saveInfo">Save this information</label>
                </div>

                <hr class="my-4">

                <h4 class="mb-3">Payment Method</h4>

                <div class="form-check mb-3">
                    <input type="radio" name="paymentMethod" value="Credit Card/Debit Card" class="form-check-input" id="creditDebitCard" check>
                    <label class="form-check-label" for="creditDebitCard">Credit Card/Debit Card</label>
                </div>
                <div class="form-check mb-3">
                    <input type="radio" name="paymentMethod" value="Paypal" class="form-check-input" id="paypal" check>
                    <label class="form-check-label" for="paypal">PayPal</label>
                </div>

                <div class="row g-2">
                    <div class="form-floating col-sm-6 mb-3">
                        <input id="cardName" name="cardName" type="text" class="form-control" placeholder="Name on Card" required>
                        <label for="cardName" class="form-label text-muted">Name on Card</label>
                        <small class="text-muted">Full name as displayed on card</small>
                    </div>

                    <div class="form-floating col-sm-6 mb-3">
                        <input id="cardNo" name="cardNo" type="text" class="form-control" placeholder="Card Number" maxlength="19" required>
                        <label for="cardNo" class="form-label text-muted">Card Number</label>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="form-floating col-sm-6 mb-3">
                        <input id="expiredDate" name="expiredDate" type="text" class="form-control" placeholder="MM / YY" maxlength="5" required>
                        <label for="expiredDate" class="form-label text-muted">MM / YY</label>
                        <div class="invalid-feedback">Please enter your card expired date</div>
                    </div>

                    <div class="form-floating col-sm-6 mb-3">
                        <input id="cardVerification" name="cardVerification" type="text" class="form-control" placeholder="CVV" maxlength="3" required>
                        <label for="cardVerification" class="form-label text-muted">CVV</label>
                        <div class="invalid-feedback">Please enter your card verification</div>
                    </div>
                </div>

                <input type="hidden" name="selectedPlanTotalPrice" id="selectedPlanTotalPrice">
                <input type="hidden" name="selectedPlanSaveAmount" id="selectedPlanSaveAmount">
                <input type="hidden" name="selectedPlanName" id="selectedPlanName">
                <input type="hidden" name="selectedPlanPrice" id="selectedPlanPrice">

                <div class="d-flex justify-content-between align-items-center">
                    <a href="subscription.html" class="btn1 btn-primary btn-lg">&lt; Back to cart</a>
                    <button class="btn2 btn-primary btn-lg" type="submit">Checkout</button>
                </div>


            </form>
        </div>


        <div class="summary-form py-5 px-4">
            <div class="order-md-last">
                <h4 class="d-flex justify-content-between mb-5">
                    <span>Order Summary</span>
                    <span class="badge bg-secondary rounded-pill">1</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item align-item-center">
                        <div class="d-flex justify-content-between">
                            <h5><span>Product name</span></h5>
                        </div>
                        <div class="ml-5 d-flex justify-content-between">
                            <h6><span class="text-muted" id="productName">Product description</span></h6>
                            <h6><span class="text-muted" id="productPrice">RM </span></h6>
                        </div>
                    </li>
                    <hr class="my-2">
                    <li class="list-group-item align-item-center">
                        <div class="d-flex justify-content-between">
                            <h5><span>Product discount</span></h5>
                        </div>
                        <div class="ml-5 d-flex justify-content-between">
                            <h6><span class="text-muted" id="productDiscount">Discount description</span></h6>
                            <h6><span class="text-muted" id="productDiscountPrice">RM </span></h6>
                        </div>
                    </li>
                    <hr class="my-2">
                </ul>
                <div class="d-flex justify-content-between align-item-center">
                    <h4 class="font-weight-bold"><span>Total</span></h4>
                    <h4 class="font-weight-bold">
                        <oran id="totalPrice">RM</oran>
                    </h4>
                </div>
                <hr class="my-2">
                <div class="justify-content-between align-item-center">

                </div>
            </div>
        </div>

    </div>

    <script src="summary.js"></script>
    <script>

        document.addEventListener('DOMContentLoaded', (event) => {

            let cart_data = [];

            fetch('./addcart/readcart.php')
            .then(response => response.json())
            .then(data => {
            cart_data = data;
            updateSummaryPage(cart_data);
            })
            .catch(error => console.error('Error fetching cart data:', error));

            function updateSummaryPage(cart_data) {
                const selectedItem = cart_data[0];

                const totalPrice = selectedItem.productPrice;
                const saveAmount = selectedItem.productDiscount;
                const planName = selectedItem.productName;
                const planPackage = selectedItem.productPlan;

                if (totalPrice && saveAmount && planPackage) {

                const totalPriceInt = parseFloat(totalPrice);
                const saveAmountInt = parseFloat(saveAmount);
                // Update the summary page with the selected plan details
                document.getElementById('productName').textContent = planName + " " + planPackage;
                document.getElementById('productPrice').textContent = 'RM' + (totalPriceInt + saveAmountInt);
                document.getElementById('productDiscount').textContent = 'You Saved';
                document.getElementById('productDiscountPrice').textContent = 'RM' + saveAmount;
                document.getElementById('totalPrice').textContent = 'RM' + totalPrice;

                document.getElementById('selectedPlanTotalPrice').value = totalPrice;
                document.getElementById('selectedPlanSaveAmount').value = saveAmount;
                document.getElementById('selectedPlanName').value = planName + " " + planPackage;
                document.getElementById('selectedPlanPrice').value = totalPriceInt + saveAmountInt;
                }
            }
        });
    </script>

</body>


</html>