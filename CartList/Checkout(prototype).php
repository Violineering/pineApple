<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/Checkout.css">
    <title>Checkout - Order Summary and Multi-Step Form</title>

</head>

<body>
    <div class="container">
        <!-- Multi-Step Form -->
        <div class="form-section">
            <!-- Shipping Details Form -->
            <div id="form1">
                <h2>Shipping Details</h2>
                <form id="shippingForm">
                    <label for="email">Email*</label>
                    <input type="email" id="email" name="email" required>

                    <label for="firstName">First Name*</label>
                    <input type="text" id="firstName" name="firstName" required>

                    <label for="lastName">Last Name*</label>
                    <input type="text" id="lastName" name="lastName" required>

                    <label for="address">Address*</label>
                    <input type="text" id="address" name="address" required>

                    <label for="city">City*</label>
                    <input type="text" id="city" name="city">

                    <label for="country">Country*</label>
                    <select id="country" name="country" required>
                        <option value="">Select Country</option>
                        <option value="us">United States</option>
                        <option value="ca">Canada</option>
                        <option value="uk">United Kingdom</option>
                    </select>

                    <label for="region">Region/State*</label>
                    <select id="region" name="region" required>
                        <option value="">Select Region</option>
                        <option value="ny">New York</option>
                        <option value="ca">California</option>
                        <option value="tx">Texas</option>
                    </select>

                    <label for="phone">Phone Number*</label>
                    <input type="text" id="phone" name="phone" required>

                    <label for="zip">Zip Code*</label>
                    <input type="text" id="zip" name="zip" required>

                    <button type="button" id="continueToPayment">Continue to Payment</button>
                    <div class="error" id="shippingError"></div>
                </form>
            </div>

            <!-- Payment Details Form (Initially Hidden) -->
            <div id="form2" style="display: none;">
                <h2>Payment Details</h2>
                <form id="paymentForm" action="/action_page.php">

                    <div class="row">

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September">
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352">
                                </div>
                            </div>
                        </div>

                    </div>
                    <input type="submit" value="Continue to checkout" class="btn">
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="order-summary">
            <h3>Order Summary</h3>

            <div class="order-item">
                <img src="item-image.jpg" alt="Item Image">
                <div class="item-details">
                    <p class="item-name">Classic Cleaver</p>
                    <p>Qty: 1</p>
                </div>
                <p>$124.95</p>
            </div>

            <div class="promo-code">
                <p>Enter a promo code</p>
                <input type="text" id="promocode" name="promocode">
            </div>

            <div class="price-details">
                <hr>
                <p>Subtotal: $124.95</p>
                <p>Shipping: $80.96</p>
                <p>Sales Tax: $0.00</p>
                <hr>
                <p class="total">Total: $205.91</p>
            </div>
        </div>
    </div>

    <script>
        function validateShippingForm() {
            let email = document.getElementById('email').value;
            let phone = document.getElementById('phone').value;
            let firstName = document.getElementById('firstName').value;
            let lastName = document.getElementById('lastName').value;
            let address = document.getElementById('address').value;
            let error = document.getElementById('shippingError');

            // Regular expression for validating email
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            // Regular expression for validating phone (only digits, length between 7-15)
            let phonePattern = /^\d{7,15}$/;

            // Validation logic
            if (email === '' || firstName === '' || lastName === '' || address === '') {
                error.textContent = "Please fill out all required fields.";
                return false;
            }
            if (!emailPattern.test(email)) {
                error.textContent = "Please enter a valid email address.";
                return false;
            }
            if (!phonePattern.test(phone)) {
                error.textContent = "Please enter a valid phone number (7 to 15 digits).";
                return false;
            }

            // Clear any previous error messages
            error.textContent = "";
            return true;
        }
        // Switch to the payment form if shipping validation passes
        document.getElementById('continueToPayment').addEventListener('click', function () {
            if (validateShippingForm()) {
                document.getElementById('form1').style.display = 'none';
                document.getElementById('form2').style.display = 'block';
            }
        });

    </script>
</body>

</html>