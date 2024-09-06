<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Create PineApple Account</title>
</head>

<body>
    <?php include('includes/navigationHeader.php');?>

    <div class="container" id="create-id-form">
        <h1>Create PineApple Account</h1>
        <form action="#" method="post" class="create-id-form">
            <div class="input-group">
                <label for="PineApple ID">PineApple ID</label>
                <input type="text" id="PineAppleID" name="PineAppleID" required>
            </div>
            <div class="input-group">
                <label for="new-email">Phone Number</label>
                <input type="text" id="phoneNo" name="new-phoneNo" required>
            </div>
            <div class="input-group">
                <label for="new-email">Birthday</label>
                <input type="text" id="birthday" name="new-birthday" required>
            </div>
            <div class="input-group">
                <label for="new-email">Email Address</label>
                <input type="email" id="new-email" name="new-email" required>
            </div>
            <div class="input-group">
                <label for="new-password">Password</label>
                <input type="password" id="new-password" name="new-password" required>
            </div>
            <button type="submit" class="btn">Create PineApple Account</button>
        </form>
        <div class="footer">
            <a href="Login.php" id="back-to-signin">Back to Sign In</a>
        </div>
    </div>
</body>

<?php include('includes/footer.php');?>

</html>
