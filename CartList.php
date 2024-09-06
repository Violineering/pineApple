<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/CartList.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cart - Pineapple</title>
    
    
</head>

<body>
    <?php include('includes/navigationHeader.php'); ?>
    <div id="cart_wrapper">
        <h2>Your Cart</h2>
        <div id="cartItems">
            <!-- Example item, duplicate this block for each item in the cart -->
            <div class="cart-item" data-item-id="1">
                <img src="image/PinePhone/PinePhone Pro Ultimate - 4.png" alt="Product Image">
                <div class="cart-item-details">
                    <h3>Pinephone Pro Ultimate</h3>
                    <p>Price: $20.00</p>
                </div>
                <div class="cart-controls">
                    <div class="quantity-controls">
                        <button onclick="changeQuantity(event, -1)">-</button>
                        <input type="text" value="1" readonly>
                        <button onclick="changeQuantity(event, 1)">+</button>
                    </div>
                    <button class="btn-delete" onclick="removeItem(event)">Delete</button>
                </div>
            </div>

            <div class="cart-item" data-item-id="2">
                <img src="image/PineBook/PineBook King - 1.png" alt="Product Image">
                <div class="cart-item-details">
                    <h3>PineBook King</h3>
                    <p>Price: $35.00</p>
                </div>
                <div class="cart-controls">
                    <div class="quantity-controls">
                        <button onclick="changeQuantity(event, -1)">-</button>
                        <input type="text" value="1" readonly>
                        <button onclick="changeQuantity(event, 1)">+</button>
                    </div>
                    <button class="btn-delete" onclick="removeItem(event)">Delete</button>
                </div>
            </div>

            <div class="cart-item" data-item-id="3">
                <img src="image/PinePad/PinePad Pro - 1.png" alt="Product Image">
                <div class="cart-item-details">
                    <h3>PinePad Pro</h3>
                    <p>Price: $50.00</p>
                </div>
                <div class="cart-controls">
                    <div class="quantity-controls">
                        <button onclick="changeQuantity(event, -1)">-</button>
                        <input type="text" value="1" readonly>
                        <button onclick="changeQuantity(event, 1)">+</button>
                    </div>
                    <button class="btn-delete" onclick="removeItem(event)">Delete</button>
                </div>
            </div>

            <div class="cart-item" data-item-id="4">
                <img src="image/PinePods/PinePods Ultimate - 1.png" alt="Product Image">
                <div class="cart-item-details">
                    <h3>PinePods Ultimate</h3>
                    <p>Price: $25.00</p>
                </div>
                <div class="cart-controls">
                    <div class="quantity-controls">
                        <button onclick="changeQuantity(event, -1)">-</button>
                        <input type="text" value="1" readonly>
                        <button onclick="changeQuantity(event, 1)">+</button>
                    </div>
                    <button class="btn-delete" onclick="removeItem(event)">Delete</button>
                </div>
            </div>
            <!-- End of example items -->
        </div>

        <div class="total-price">
            Total Price: $130.00
        </div>
        <button class="btn-payment" onclick="navigateToPayment()">Proceed to Payment</button>
    </div>

    <script>
        // Function to change quantity
        function changeQuantity(event, change) {
            const itemElement = event.target.closest('.cart-item');
            const quantityInput = itemElement.querySelector('input[type="text"]');
            let quantity = parseInt(quantityInput.value, 10);
            quantity += change;
            if (quantity < 1) quantity = 1; // Prevent negative or zero quantity
            quantityInput.value = quantity;

            updateTotalPrice();
        }

        // Function to remove item
        function removeItem(event) {
            const itemElement = event.target.closest('.cart-item');
            itemElement.remove();

            updateTotalPrice();
        }

        // Function to update total price
        function updateTotalPrice() {
            let totalPrice = 0;
            const cartItems = document.querySelectorAll('.cart-item');
            cartItems.forEach(item => {
                const price = parseFloat(item.querySelector('.cart-item-details p').textContent.replace('Price: $', ''));
                const quantity = parseInt(item.querySelector('input[type="text"]').value, 10);
                totalPrice += price * quantity;
            });
            document.querySelector('.total-price').textContent = `Total Price: $${totalPrice.toFixed(2)}`;
        }

        // Function to navigate to payment page
        function navigateToPayment() {
            window.location.href = 'payment.html'; // Change this to your actual payment page URL
        }
    </script>
</body>
<?php include('includes/footer.php'); ?>

</html>
