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

// Initialize arrays to store validation errors and form data
$errors = [];
$form_data = $_POST;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $pineapple_id = trim($_POST['pineapple_id']);
    $phoneNo = trim($_POST['phoneNo']);
    $birthday = trim($_POST['birthday']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate PineAppleID and email
    $stmt = $conn->prepare("SELECT * FROM users WHERE pineapple_id = ? OR email = ?");
    $stmt->bind_param("ss", $pineapple_id, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['pineapple_id'] == $pineapple_id) {
            $errors['pineapple_id'] = "PineApple ID already exists. Please choose a different one.";
        }
        if ($row['email'] == $email) {
            $errors['email'] = "Email already registered. Please use a different email address.";
        }
    }

    // Validate Phone Number
    if (empty($phoneNo) || !preg_match('/^\d{3}-\d{3}-\d{4}$/', $phoneNo)) {
        $errors['phoneNo'] = 'Phone number is required and must be a valid phone number (e.g., 123-456-7890).';
    }

    // Validate Birthday
    if (empty($birthday) || !DateTime::createFromFormat('Y-m-d', $birthday)) {
        $errors['birthday'] = 'Birthday is required and must be in YYYY-MM-DD format.';
    }

    // Validate Password
    if (empty($password)) {
        $errors['password'] = 'Password is required.';
    }

    // If no errors, insert data into database
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

        // Set the default profile picture
        $default_profilepic = '../image/default_profile_pic.jpg'; // Change this to your default image filename

        $stmt = $conn->prepare("INSERT INTO users (pineapple_id, phoneNo, birthday, email, password, profilepic) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $pineapple_id, $phoneNo, $birthday, $email, $hashed_password, $default_profilepic);

        if ($stmt->execute()) {
            // Successful signup, clear session data and redirect with success flag
            unset($_SESSION['errors']);
            unset($_SESSION['form_data']);
            header("Location: ../signup.php?signup=success");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        // Pass errors back to the form
        $_SESSION['errors'] = $errors;
        $_SESSION['form_data'] = $form_data; // Save form data to preserve user input
        header("Location: ../signup.php");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
