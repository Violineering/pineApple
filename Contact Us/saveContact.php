<?php
session_start(); // Start session before anything else

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
    // Retrieve form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phoneNo = trim($_POST['phone']);
    $comments = trim($_POST['comments']);

    // Validate form input
    if (empty($name) || empty($email) || empty($phoneNo) || empty($comments)) {
        $_SESSION['error'] = "All fields are required!";
        header('Location: index.php');
        exit;
    }

    // SQL query to insert data into contact_us table
    $sql = "INSERT INTO contact_us (name, email, phoneNo, comments) VALUES (?, ?, ?, ?)";

    // Prepare and bind parameters
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('ssss', $name, $email, $phoneNo, $comments);

        // Execute the query
        if ($stmt->execute()) {
            $_SESSION['success'] = "Your message has been sent successfully!";
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['error'] = "Error: Could not save your message.";
        }

        // Close the statement
        $stmt->close();
    } else {
        $_SESSION['error'] = "Error in preparing the query.";
    }
}

// Close the database connection
$conn->close();
?>
