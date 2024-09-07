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

        <button class="btn-payment" onclick="storeCartDataAndNavigate()">Proceed to Payment</button>
    </div>

    <script>
        function changeQuantity(event, change) {
            const itemElement = event.target.closest('.cart-item');
            const itemId = itemElement.getAttribute('data-item-id');
            const quantityInput = itemElement.querySelector('input[type="text"]');
            let quantity = parseInt(quantityInput.value, 10);
            quantity += change;
            if (quantity < 1) quantity = 1;
            quantityInput.value = quantity;

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "updateQuantity.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status == 200) {
                    updateTotalPrice();
                }
            };
            xhr.send(`item_id=${itemId}&quantity=${quantity}`);
        }

        function removeItem(event) {
            const itemElement = event.target.closest('.cart-item');
            const itemId = itemElement.getAttribute('data-item-id');

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "removeItem.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status == 200) {
                    itemElement.remove();
                    updateTotalPrice();
                }
            };
            xhr.send(`item_id=${itemId}`);
        }

        function updateTotalPrice() {
            let totalPrice = 0;
            const cartItems = document.querySelectorAll('.cart-item');

            cartItems.forEach(item => {
                const priceElement = item.querySelector('.cart-item-details h3.price');
                if (priceElement) {
                    const priceText = priceElement.textContent.replace('Price: $', '');
                    const price = parseFloat(priceText);
                    if (isNaN(price)) return;

                    const quantity = parseInt(item.querySelector('input[type="text"]').value, 10);
                    if (isNaN(quantity) || quantity < 1) return;

                    totalPrice += price * quantity;
                }
            });

            document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
        }

        function storeCartDataAndNavigate() {
            const cartItems = [];
            document.querySelectorAll('.cart-item').forEach(item => {
                cartItems.push({
                    id: item.getAttribute('data-item-id'),
                    name: item.querySelector('.cart-item-details h3').textContent,
                    storage: item.querySelector('.cart-item-details p:nth-of-type(1)').textContent.replace('Storage: ', ''),
                    color: item.querySelector('.cart-item-details p:nth-of-type(2)').textContent.replace('Color: ', ''),
                    price: item.querySelector('.cart-item-details h3.price').textContent.replace('Price: $', ''),
                    quantity: item.querySelector('input[type="text"]').value
                });
            });
            sessionStorage.setItem('cartData', JSON.stringify(cartItems));
            window.location.href = 'checkout.php';
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateTotalPrice();
        });
    </script>

    <?php include('../includes/footer.php'); ?>

</body>
</html>
