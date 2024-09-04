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

// Get the product name from the query parameter
$productName = isset($_GET['product']) ? $_GET['product'] : 'PinePad OG'; 

// SQL query to fetch product details
$sql = "SELECT * FROM PinePad WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $productName);
$stmt->execute();
$result = $stmt->get_result();

// Fetch product details
$product = $result->fetch_assoc();

// SQL query to fetch image paths
$sqlImages = "SELECT image_path FROM pad_image_path WHERE name = ?";
$stmtImages = $conn->prepare($sqlImages);
$stmtImages->bind_param("s", $productName);
$stmtImages->execute();
$resultImages = $stmtImages->get_result();

$imagePaths = [];

if ($resultImages->num_rows > 0) {
    // Fetch all image paths
    while($row = $resultImages->fetch_assoc()) {
        $imagePaths[] = $row['image_path'];
    }
}

// Close the connection
$conn->close();
?>
