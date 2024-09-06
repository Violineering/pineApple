<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['session_id'])) {
    die("Unauthorized access. Please log in.");
}

$pineapple_id = $_SESSION['session_id'];

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pineappleusers";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize form data
$email = trim($_POST['email']);
$phone = trim($_POST['phoneNo']);
$birthday = trim($_POST['birthday']);
$errorMessages = [];

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMessages['email'] = 'Invalid email format.';
}

// Validate phone number
if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $phone)) {
    $errorMessages['phoneNo'] = 'Invalid phone number. Please enter a valid phone number (e.g., 123-456-7890).';
}

// Validate birthday
$birthdayDate = DateTime::createFromFormat('Y-m-d', $birthday);
if (!$birthdayDate || $birthdayDate->format('Y-m-d') !== $birthday || $birthdayDate > new DateTime()) {
    $errorMessages['birthday'] = 'Invalid birthday. Please enter a valid date in the past.';
}

// If there are errors, store them in the session and redirect
if (!empty($errorMessages)) {
    $_SESSION['error_messages'] = $errorMessages;
    $_SESSION['form_data'] = $_POST;
    $_SESSION['form_submitted'] = true; // Mark form as submitted
    header("Location: ../Profile.php");
    exit();
}

// If validation passes, update the database
$sql = "UPDATE users SET email = ?, phoneNo = ?, birthday = ? WHERE pineapple_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $email, $phone, $birthday, $pineapple_id);
$updateSuccessful = $stmt->execute();
$stmt->close();

// Check if the update was successful
if ($updateSuccessful) {
    $_SESSION['update_message'] = 'Profile updated successfully!';
    unset($_SESSION['form_data']);
    unset($_SESSION['error_messages']);
} else {
    $_SESSION['error_messages']['general'] = 'Failed to update profile. Please try again.';
}

$_SESSION['form_submitted'] = true;
header("Location: ../Profile.php");
exit();
