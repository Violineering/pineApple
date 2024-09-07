<?php
header('Content-Type: application/json');

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pineappleusers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Get the JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

// Check if JSON data was received
if ($data === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON data.']);
    exit();
}

// Extract shipping and payment data
$shipping = $data['shipping'];
$payment = $data['payment'];

// Generate a unique order ID
$orderListId = uniqid();

// Insert payment details
$sql_payment = "INSERT INTO payment_details (
    order_list_id, email, first_name, last_name, address, city, country, region, phoneNo, zip,
    name_on_card, credit_card_number, exp_month, exp_year, cvv, subtotal, shipping, sales_tax, total_price
) VALUES (
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
)";

$stmt_payment = $conn->prepare($sql_payment);
$stmt_payment->bind_param(
    'issssssssssssssdds',
    $orderListId,
    $shipping['email'],
    $shipping['firstName'],
    $shipping['lastName'],
    $shipping['address'],
    $shipping['city'],
    $shipping['country'],
    $shipping['region'],
    $shipping['phone'],
    $shipping['zip'],
    $payment['cardName'],
    $payment['cardNumber'],
    $payment['expMonth'],
    $payment['expYear'],
    $payment['cvv'],
    $payment['subtotal'],
    $payment['shippingCost'],
    $payment['salesTax'],
    $payment['total']
);

if (!$stmt_payment->execute()) {
    echo json_encode(['success' => false, 'message' => 'Error inserting payment details.']);
    exit();
}

// Insert order details (example)
$sql_orders = "INSERT INTO orders_confirmed (
    pineapple_id, product_name, storage, color, price, quantity, order_list_id
) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt_orders = $conn->prepare($sql_orders);

// Ensure $cartData is properly initialized
$cartData = json_decode(file_get_contents('path/to/cartData.json'), true) ?? [];

foreach ($cartData as $item) {
    $stmt_orders->bind_param(
        'ssssdis',
        $shipping['pineappleId'],
        $item['product_name'],
        $item['storage'],
        $item['color'],
        $item['price'],
        $item['quantity'],
        $orderListId
    );

    if (!$stmt_orders->execute()) {
        echo json_encode(['success' => false, 'message' => 'Error inserting order details.']);
        exit();
    }
}

echo json_encode(['success' => true, 'message' => 'Order processed successfully.']);

$stmt_payment->close();
$stmt_orders->close();
$conn->close();
?>
