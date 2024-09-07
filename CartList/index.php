<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/CartList.css">
    <title>Cart - Pineapple</title>
</head>

<body>
    <?php include('../includes/navigationHeader.php'); ?>
    <div id="cart_wrapper">
        <h2>Your Cart</h2>
        <div id="cartItems">
            <?php include('FetchInCart.php'); ?>
        </div>

        <div class="total-price">
            Total Price: $<span id="totalPrice"></span>
        </div>
        <button class="btn-payment" onclick="navigateToPayment()">Proceed to Payment</button>
    </div>

    <script>
        // Function to change quantity with AJAX
        function changeQuantity(event, change) {
            const itemElement = event.target.closest('.cart-item');
            const itemId = itemElement.getAttribute('data-item-id'); // Use product id for unique identifier
            const quantityInput = itemElement.querySelector('input[type="text"]');
            let quantity = parseInt(quantityInput.value, 10);
            quantity += change;
            if (quantity < 1) quantity = 1; // Prevent negative or zero quantity
            quantityInput.value = quantity;
        
            // AJAX request to update the quantity in the database
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "updateQuantity.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status == 200) {
                    updateTotalPrice(); // Update total price after successful database update
                }
            };
            xhr.send(`item_id=${itemId}&quantity=${quantity}`);
        }
        
        // Function to remove item with AJAX
        function removeItem(event) {
            const itemElement = event.target.closest('.cart-item');
            const itemId = itemElement.getAttribute('data-item-id'); // Use product id for unique identifier
        
            // AJAX request to remove the item from the database
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "removeItem.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status == 200) {
                    itemElement.remove(); // Remove the item from the DOM
                    updateTotalPrice();   // Update total price after removal
                }
            };
            xhr.send(`item_id=${itemId}`); // Send the unique id
        }
        
        // Function to update total price
        function updateTotalPrice() {
            console.log("Updating total price..."); // Debugging line
            let totalPrice = 0;
            const cartItems = document.querySelectorAll('.cart-item');
            
            cartItems.forEach(item => {
                // Select the price element by its class
                const priceElement = item.querySelector('.cart-item-details h3.price');
            
                if (priceElement) {
                    // Extract and parse the price
                    const priceText = priceElement.textContent.replace('Price: $', '');
                    const price = parseFloat(priceText);
                
                    if (isNaN(price)) {
                        console.error("Invalid price format:", priceText);
                        return;
                    }
                
                    // Get and parse the quantity
                    const quantity = parseInt(item.querySelector('input[type="text"]').value, 10);
                
                    if (isNaN(quantity) || quantity < 1) {
                        console.error("Invalid quantity:", quantity);
                        return;
                    }
                
                    // Add to total price
                    totalPrice += price * quantity;
                } else {
                    console.error("Price element not found for item:", item);
                }
            });
            
            console.log("Total price calculated:", totalPrice); // Debugging line
            document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
        }
        
        // Show total price when the page is loaded
        document.addEventListener('DOMContentLoaded', function() {
            updateTotalPrice();
        });
        
        // Function to navigate to payment page
        function navigateToPayment() {
            window.location.href = 'payment.html'; // Change this to your actual payment page URL
        }

        // Function to navigate to payment page
        function navigateToPayment() {
            window.location.href = 'payment.html'; // Change this to your actual payment page URL
        }
    </script>
</body>
<?php include('../includes/footer.php'); ?>

</html>
