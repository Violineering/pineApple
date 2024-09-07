<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/Checkout.css">
    <title>Checkout - Order Summary and Multi-Step Form</title>
</head>
<body>
    <?php include('../includes/navigationHeader.php'); ?>

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
                    <input type="text" id="city" name="city" required>

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

            <!-- Payment Details Form -->
            <div id="form2" style="display: none;">
                <h2>Payment Details</h2>
                <form id="paymentForm">
                    <label for="cname">Name on Card</label>
                    <input type="text" id="cname" name="cardname" required>
                    <label for="ccnum">Credit Card Number</label>
                    <input type="text" id="ccnum" name="cardnumber" required>
                    <label for="expmonth">Exp Month</label>
                    <input type="text" id="expmonth" name="expmonth" required>
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" required>
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" required>
                    <input type="button" id="submitPayment" value="Complete Order" class="btn">
                    <div class="error" id="paymentError"></div>
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="order-summary">
            <h3>Order Summary</h3>
            <div id="checkoutItems"></div>
            <div class="price-details">
                <hr>
                <p>Subtotal: $<span id="subtotal"></span></p>
                <p>Shipping: $<span id="shippingCost"></span></p>
                <p>Sales Tax: $<span id="salesTax"></span></p>
                <hr>
                <p class="total">Total: $<span id="total"></span></p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartData = JSON.parse(sessionStorage.getItem('cartData')) || [];
            const checkoutItems = document.getElementById('checkoutItems');
            let subtotal = 0;

            cartData.forEach(item => {
                const itemElement = document.createElement('div');
                itemElement.classList.add('order-item');
                itemElement.innerHTML = `
                    <img src="../image/${item.name.split(' ')[0]}/${item.name} - 2.png" alt="Product Image">
                    <div class="item-details">
                        <p class="item-name">${item.name}</p>
                        <p>Storage: ${item.storage}</p>
                        <p>Color: ${item.color}</p>
                        <p>Qty: ${item.quantity}</p>
                        <p>Price: $${item.price}</p>
                    </div>
                `;
                checkoutItems.appendChild(itemElement);
                subtotal += parseFloat(item.price) * parseInt(item.quantity, 10);
            });

            const shippingCost = 20.00;
            const taxCost = subtotal * 0.06;

            document.getElementById('subtotal').textContent = subtotal.toFixed(2);
            document.getElementById('shippingCost').textContent = shippingCost.toFixed(2);
            document.getElementById('salesTax').textContent = taxCost.toFixed(2);
            document.getElementById('total').textContent = (subtotal + shippingCost + taxCost).toFixed(2);
        });

        function validateShippingForm() {
            let email = document.getElementById('email').value;
            let phone = document.getElementById('phone').value;
            let firstName = document.getElementById('firstName').value;
            let lastName = document.getElementById('lastName').value;
            let address = document.getElementById('address').value;
            let city = document.getElementById('city').value;
            let country = document.getElementById('country').value;
            let region = document.getElementById('region').value;
            let zip = document.getElementById('zip').value;
            let error = document.getElementById('shippingError');

            // Regular expressions for validation
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            let phonePattern = /^\d{7,15}$/;
            let zipPattern = /^\d{5}(-\d{4})?$/; // Example for US ZIP codes
            let namePattern = /^[A-Za-z\s]+$/; // Only letters and spaces
            let cityRegionPattern = /^[A-Za-z\s]+$/; // Only letters and spaces, no numbers

            // Clear previous errors
            error.textContent = "";

            // Validation checks
            if (!email || !firstName || !lastName || !address || !city || !country || !region || !zip) {
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
            if (!zipPattern.test(zip)) {
                error.textContent = "Please enter a valid zip code (numbers only).";
                return false;
            }
            if (country === "" || country === "Select Country") {
                error.textContent = "Please select a country.";
                return false;
            }
            if (region === "" || region === "Select Region") {
                error.textContent = "Please select a region.";
                return false;
            }
            if (!cityRegionPattern.test(city)) {
                error.textContent = "City should not contain numbers.";
                return false;
            }
            if (!cityRegionPattern.test(region)) {
                error.textContent = "Region/State should not contain numbers.";
                return false;
            }
            if (!namePattern.test(firstName)) {
                error.textContent = "First name should not contain numbers.";
                return false;
            }
            if (!namePattern.test(lastName)) {
                error.textContent = "Last name should not contain numbers.";
                return false;
            }
        
            // Store shipping data in session storage
            sessionStorage.setItem('shippingData', JSON.stringify({
                email: email,
                firstName: firstName,
                lastName: lastName,
                address: address,
                city: city,
                country: country,
                region: region,
                phone: phone,
                zip: zip
            }));
        
            // Validation passed
            return true;
        }

        function validatePaymentForm() {
            let cardName = document.getElementById('cname').value;
            let cardNumber = document.getElementById('ccnum').value;
            let expMonth = document.getElementById('expmonth').value;
            let expYear = document.getElementById('expyear').value;
            let cvv = document.getElementById('cvv').value;
            let error = document.getElementById('paymentError');

            // Regular expressions for validation
            let cardNamePattern = /^[A-Za-z\s]+$/; // Only letters and spaces
            let cardNumberPattern = /^\d{13,16}$/; // 13 to 16 digits
            let expMonthPattern = /^(0[1-9]|1[0-2])$/; // 01 to 12
            let expYearPattern = /^\d{4}$/; // 4 digits for the year
            let cvvPattern = /^\d{3,4}$/; // 3 or 4 digits

            // Clear previous errors
            error.textContent = "";

            // Validation checks
            if (!cardName || !cardNumber || !expMonth || !expYear || !cvv) {
                error.textContent = "Please fill out all required fields.";
                return false;
            }
            if (!cardNamePattern.test(cardName)) {
                error.textContent = "Name on card should only contain letters and spaces.";
                return false;
            }
            if (!cardNumberPattern.test(cardNumber)) {
                error.textContent = "Credit card number should be between 13 and 16 digits.";
                return false;
            }
            if (!expMonthPattern.test(expMonth)) {
                error.textContent = "Expiration month should be a valid month (01-12).";
                return false;
            }
            if (!expYearPattern.test(expYear) || parseInt(expYear) < new Date().getFullYear()) {
                error.textContent = "Expiration year should be a valid year and cannot be in the past.";
                return false;
            }
            if (!cvvPattern.test(cvv)) {
                error.textContent = "CVV should be a 3 or 4-digit number.";
                return false;
            }
        
            // Store payment data in session storage
            sessionStorage.setItem('paymentData', JSON.stringify({
                cardName: cardName,
                cardNumber: cardNumber,
                expMonth: expMonth,
                expYear: expYear,
                cvv: cvv
            }));
        
            // Validation passed
            return true;
        }

        document.getElementById('continueToPayment').addEventListener('click', function () {
            if (validateShippingForm()) {
                document.getElementById('form1').style.display = 'none';
                document.getElementById('form2').style.display = 'block';
            }
        });

        document.getElementById('submitPayment').addEventListener('click', function () {
            if (validatePaymentForm()) {
                // Get data from session storage
                const shippingData = JSON.parse(sessionStorage.getItem('shippingData'));
                const paymentData = JSON.parse(sessionStorage.getItem('paymentData'));

                // Combine both data
                const combinedData = {
                    shipping: shippingData,
                    payment: paymentData
                };

                // Send combined data to the server
                fetch('path/to/process_order.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(combinedData)
                })

                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Redirect to success page or show success message
                        console.log('Success:', data.message);
                    } else {
                        // Handle error
                        console.error('Error:', data.message);
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
            }
        });
    </script>
</body>
</html>
