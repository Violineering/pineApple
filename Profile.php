<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Profile.css">
    <title>Edit Profile - Pineapple</title>
    <style>
        .success-message {
            color: green;
            text-align: center;
            margin-top: 10px;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .input-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
<?php
session_start(); // Start the session
include('includes/navigationHeader.php');

// Ensure the user is logged in
if (!isset($_SESSION['session_id'])) {
    die("Unauthorized access. Please log in.");
}

$pineapple_id = $_SESSION['session_id'];

// Fetch current profile info from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pineappleusers";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email, phoneNo, birthday, profilepic FROM users WHERE pineapple_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $pineapple_id);
$stmt->execute();
$stmt->bind_result($emailFromDb, $phoneFromDb, $birthdayFromDb, $profilePic);
$stmt->fetch();
$stmt->close();
$conn->close();

// Retrieve error messages if form was submitted
$formSubmitted = isset($_SESSION['form_submitted']) ? $_SESSION['form_submitted'] : false;
$errorMessages = isset($_SESSION['error_messages']) ? $_SESSION['error_messages'] : [];

// Retrieve form data if available, otherwise fallback to database values
if ($formSubmitted && isset($_SESSION['form_data'])) {
    // After invalid submission, use form data from the session
    $formData = $_SESSION['form_data'];
    $email = $formData['email'];
    $phone = $formData['phoneNo'];
    $birthday = $formData['birthday'];
} else {
    // No form submission or valid submission, use database values
    $email = $emailFromDb;
    $phone = $phoneFromDb;
    $birthday = $birthdayFromDb;
}

// Clear session data after displaying error messages (if necessary)
unset($_SESSION['form_submitted']);
unset($_SESSION['error_messages']);
?>

<div class="edit-profile-container">
    <h1>Edit Profile</h1>

    <form id="editProfileForm" action="database/EditProfileValidation.php" method="post" enctype="multipart/form-data">
        <!-- Profile Picture -->
        <div class="profile-pic">
            <img src="/pineApple/image/<?php echo htmlspecialchars($profilePic); ?>" alt="Profile Picture" id="profilePic">
            <label class="change-pic-btn" for="profilePicInput">Change Profile Picture</label>
            <input type="file" id="profilePicInput" name="profilePic" accept="image/*">
            <input type="hidden" name="currentProfilePic" value="<?php echo htmlspecialchars($profilePic); ?>">
        </div>

        <!-- PineApple ID -->
        <div class="input-group">
            <label for="PineAppleID">PineApple ID</label>
            <input type="text" id="PineAppleID" name="PineAppleID" value="<?php echo htmlspecialchars($pineapple_id); ?>" readonly>
        </div>

        <!-- Phone Number -->
        <div class="input-group">
            <label for="phoneNo">Phone Number</label>
            <input type="text" id="phoneNo" name="phoneNo" value="<?php echo htmlspecialchars($phone); ?>" required>
            <?php if ($formSubmitted && isset($errorMessages['phoneNo'])): ?>
                <span class="error"><?php echo htmlspecialchars($errorMessages['phoneNo']); ?></span>
            <?php endif; ?>
        </div>

        <!-- Birthday -->
        <div class="input-group">
            <label for="birthday">Birthday</label>
            <input type="date" id="birthday" name="birthday" value="<?php echo htmlspecialchars($birthday); ?>" required>
            <?php if ($formSubmitted && isset($errorMessages['birthday'])): ?>
                <span class="error"><?php echo htmlspecialchars($errorMessages['birthday']); ?></span>
            <?php endif; ?>
        </div>

        <!-- Email -->
        <div class="input-group">
            <label for="new-email">Email Address</label>
            <input type="email" id="new-email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            <?php if ($formSubmitted && isset($errorMessages['email'])): ?>
                <span class="error"><?php echo htmlspecialchars($errorMessages['email']); ?></span>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn">Save Changes</button>

        <!-- Success message -->
        <?php if (isset($_SESSION['update_message'])): ?>
            <p class="success-message"><?php echo htmlspecialchars($_SESSION['update_message']); ?></p>
            <?php unset($_SESSION['update_message']); ?>
        <?php endif; ?>
    </form>
</div>

<script>
    // Handle profile picture preview
    document.getElementById('profilePicInput').addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('profilePic').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>


</body>
<?php include('includes/footer.php'); ?>
</html>
