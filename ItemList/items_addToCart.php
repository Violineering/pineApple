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
        echo "Order successfully placed!";
    } else {
        echo "Error: " . $stmt->error;
    }

    echo "Order created successfully!<br>";
    echo 
        "Pineapple ID: " . $pineapple_id . "<br>" .
        "Product Name: " . $product_name . "<br>" .
        "Storage: " . $storage . "<br>" .
        "Color: " . $color . "<br>" .
        "Price: " . $price;

    // $stmt->close();
    $conn->close();
}
?>
