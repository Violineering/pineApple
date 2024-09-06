<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Create PineApple Account</title>
    <style>
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .success {
            color: green;
            font-size: 1em;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php include('includes/navigationHeader.php'); ?>

    <div class="container" id="create-id-form">
        <h1>Create PineApple Account</h1>
        
        <!-- Display Success Message -->
        <?php if (isset($_GET['signup']) && $_GET['signup'] === 'success'): ?>
            <p class="success">Registration successful! You can now <a href="Login.php">Sign In</a>.</p>
        <?php endif; ?>

        <form action="database/signup.php" method="post" id="createAccountForm" class="create-id-form" novalidate>
            <div class="input-group">
                <label for="PineAppleID">PineApple ID</label>
                <input type="text" id="PineAppleID" name="pineapple_id" value="<?php echo isset($_SESSION['form_data']['pineapple_id']) ? htmlspecialchars($_SESSION['form_data']['pineapple_id']) : ''; ?>" required>
                <span class="error">
                    <?php echo isset($_SESSION['errors']['pineapple_id']) ? htmlspecialchars($_SESSION['errors']['pineapple_id']) : ''; ?>
                </span>
            </div>
            <div class="input-group">
                <label for="phoneNo">Phone Number</label>
                <input type="text" id="phoneNo" name="phoneNo" value="<?php echo isset($_SESSION['form_data']['phoneNo']) ? htmlspecialchars($_SESSION['form_data']['phoneNo']) : ''; ?>" required>
                <span class="error">
                    <?php echo isset($_SESSION['errors']['phoneNo']) ? htmlspecialchars($_SESSION['errors']['phoneNo']) : ''; ?>
                </span>
            </div>
            <div class="input-group">
                <label for="birthday">Birthday (YYYY-MM-DD)</label>
                <input type="text" id="birthday" name="birthday" value="<?php echo isset($_SESSION['form_data']['birthday']) ? htmlspecialchars($_SESSION['form_data']['birthday']) : ''; ?>" required>
                <span class="error">
                    <?php echo isset($_SESSION['errors']['birthday']) ? htmlspecialchars($_SESSION['errors']['birthday']) : ''; ?>
                </span>
            </div>
            <div class="input-group">
                <label for="new-email">Email Address</label>
                <input type="email" id="new-email" name="email" value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>" required>
                <span class="error">
                    <?php echo isset($_SESSION['errors']['email']) ? htmlspecialchars($_SESSION['errors']['email']) : ''; ?>
                </span>
            </div>
            <div class="input-group">
                <label for="new-password">Password</label>
                <input type="password" id="new-password" name="password" required>
                <span class="error">
                    <?php echo isset($_SESSION['errors']['password']) ? htmlspecialchars($_SESSION['errors']['password']) : ''; ?>
                </span>
            </div>
            <button type="submit" class="btn">Create PineApple Account</button>
        </form>
        <div class="footer">
            <a href="Login.php" id="back-to-signin">Back to Sign In</a>
        </div>
    </div>
</body>

<?php include('includes/footer.php'); ?>

</html>
