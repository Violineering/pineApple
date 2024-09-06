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
$productName = isset($_GET['product']) ? $_GET['product'] : '';

// Define a mapping of product types to their corresponding tables
$productTables = [
    'PineBook' => [
        'details' => 'PineBook',
        'images' => 'pinebook_image_path'
    ],
    'PinePad' => [
        'details' => 'PinePad',
        'images' => 'pinepad_image_path'
    ],
    'PinePhone' => [
        'details' => 'PinePhone',
        'images' => 'pinephone_image_path'
    ],
    'PinePods' => [
        'details' => 'PinePods',
        'images' => 'pinepods_image_path'
    ]
];

// Determine the product type based on the product name
$productType = '';
foreach ($productTables as $type => $tables) {
    if (strpos($productName, $type) !== false) {
        $productType = $type;
        break;
    }
}

// If the product type is found, proceed with fetching details and images
if ($productType) {
    // Fetch product details
    $sql = "SELECT * FROM " . $productTables[$productType]['details'] . " WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $productName);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    // Fetch image paths
    $sqlImages = "SELECT image_path FROM " . $productTables[$productType]['images'] . " WHERE name = ?";
    $stmtImages = $conn->prepare($sqlImages);
    $stmtImages->bind_param("s", $productName);
    $stmtImages->execute();
    $resultImages = $stmtImages->get_result();

    $imagePaths = [];
    if ($resultImages->num_rows > 0) {
        while($row = $resultImages->fetch_assoc()) {
            $imagePaths[] = $row['image_path'];
        }
    }
} else {
    $product = null;
    $imagePaths = [];
}

// Close the connection
$conn->close();
?>
