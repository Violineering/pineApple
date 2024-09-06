<?php
session_start();

// Database connection details
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

// Retrieve form data
$pineapple_id = trim($_POST['pineapple_id']);
$password = trim($_POST['password']);

// Prepare and execute the query
$stmt = $conn->prepare("SELECT password FROM users WHERE pineapple_id = ?");
$stmt->bind_param("s", $pineapple_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify password
    if (password_verify($password, $row['password'])) {
        // Successful login
        $_SESSION['session_id'] = $pineapple_id; // Set session variable
        header("Location: ../Index.php"); // Redirect to the main page
        exit();
    }
}

// If login fails
header("Location: ../Login.php?error=invalid");
exit();

// Close the database connection
$conn->close();
?>
