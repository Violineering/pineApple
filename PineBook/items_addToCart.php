<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pineapple";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $storage = $_POST['storage'];
    $color = $_POST['color'];
    $price = $_POST['price'];

    // $query = "INSERT INTO orders (product_name, storage, color, price) VALUES (?, ?, ?, ?)";
    // $stmt = $conn->prepare($query);
    // $stmt->bind_param("sdss", $product_name, $storage, $color, price);

    // if ($stmt->execute()) {
    //     echo "Order successfully placed!";
    // } else {
    //     echo "Error: " . $stmt->error;
    // }

    echo "Order created successfully!<br>";
    echo 
        "Product Name: " . $product_name . "<br>" .
        "Storage: " . $storage . "<br>" .
        "Color: " . $color . "<br>" .
        "Price: " . $price;

    // $stmt->close();
    $conn->close();
}
?>
