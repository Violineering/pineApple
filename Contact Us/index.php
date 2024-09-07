<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/NavigationBar.css">
    <link rel="stylesheet" href="../css/ContactStyle.css">
    <title>Contact Us - Pineapple</title>
</head>

<body>
    <?php include('../includes/navigationHeader.php'); ?>

    <div id="slideshow">
        <img src="images/slideshow/image1.jpg" alt="Background Slide 1">
        <img src="images/slideshow/image2.jpg" alt="Background Slide 2">
        <img src="images/slideshow/image3.jpg" alt="Background Slide 3">
    </div>

    <div id="contact_wrapper">
        <!-- Display success or error messages -->
        <?php
        if (isset($_SESSION['success'])) {
            echo "<div class='success-message'>" . $_SESSION['success'] . "</div>";
            unset($_SESSION['success']); // Clear success message after displaying
        }

        if (isset($_SESSION['error'])) {
            echo "<div class='error-message'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']); // Clear error message after displaying
        }
        ?>

        <form method="post" id="contactForm" action="saveContact.php">
            <h2>Contact Us</h2>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
            <div id="nameError" class="error-message"></div>

            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email">
            <div id="emailError" class="error-message"></div>

            <label for="phone">Phone Number:</label>
            <input type="tel" name="phone" id="phone">
            <div id="phoneError" class="error-message"></div>

            <label for="comments">Comments:</label>
            <textarea name="comments" id="comments"></textarea>
            <div id="commentsError" class="error-message"></div>

            <button type="submit" class="btn" id="submitBtn">Submit</button>
        </form>
    </div>

    <script src="ContactValidation.js"></script>
    <?php include('../includes/footer.php'); ?>
</body>

</html>
