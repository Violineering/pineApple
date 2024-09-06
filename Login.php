<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Sign In to PineApple Store</title>
</head>
<style>
    .error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
</style>

<body>
    <?php include('includes/navigationHeader.php'); ?>

    <div class="container" id="signin-container">
        <h1>Sign In to PineApple Store</h1>
        
        <!-- Display Error Message -->
        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid'): ?>
            <p class="error">PineApple ID or password is invalid.</p>
        <?php endif; ?>

        <form action="database/LoginValidation.php" method="post" class="signin-form">
            <div class="input-group">
                <label for="email">PineApple ID</label>
                <input type="text" id="email" name="pineapple_id" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Sign In</button>
        </form>
        <div class="footer">
            <p>Do not have an account?</p>
            <span>|</span>
            <a href="SignUp.php" id="create-id-link">Create PineApple Account</a>
        </div>
    </div>
</body>

<?php include('includes/footer.php'); ?>

</html>
