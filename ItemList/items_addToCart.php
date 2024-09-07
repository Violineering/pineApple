<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pineappleusers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pineapple_id = $_SESSION['session_id'];
    $product_name = $_POST['product_name'];
    $storage = $_POST['storage'];
    $color = $_POST['color'];
    $price = $_POST['price'];

    $query = "INSERT INTO orders_in_cart (pineapple_id, product_name, storage, color, price, quantity) VALUES (?, ?, ?, ?, ?, 1)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssd", $pineapple_id, $product_name, $storage, $color, $price);

    if ($stmt->execute()) {
        echo '
        <div class="overlay" id="overlay"></div>
        <div class="popup" id="popup">
            <div class="success-icon">✔️</div>
            <h2>Product has been successfully added to your cart!</h2>
            <p>
                ' . $product_name . '<br>
                Storage: ' . $storage . '<br>
                Color: ' . $color . '<br>
                Price: $' . $price . '
            </p>
            <h4>Click anywhere to return to the previous page</h4>
        </div>

        <script>
            function showPopup() {
                document.getElementById("popup").style.display = "block";
                document.getElementById("overlay").style.display = "block";
                document.getElementById("popup").classList.add("show-popup"); // Add animation
            }

            function closePopup(event) {
                const popup = document.getElementById("popup");
                if (event.target !== popup && !popup.contains(event.target)) {
                    popup.classList.remove("show-popup");
                    setTimeout(() => {
                        popup.style.display = "none";
                        document.getElementById("overlay").style.display = "none";
                    }, 300); // Wait for the animation to finish
                }
            }

            window.onload = function() {
                showPopup();

                // Automatically go back to the previous page after 5 seconds
                setTimeout(function() {
                    window.history.go(-2);
                }, 3000);
            };

            document.getElementById("overlay").addEventListener("click", closePopup);
        </script>
    ';

    } else {
        echo "Error: " . $stmt->error;
    }

    // $stmt->close();
    $conn->close();
}
?>
