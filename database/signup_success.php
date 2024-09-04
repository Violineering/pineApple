<?php
// This is a simple example; in a real application, you might use a more sophisticated method
// to include common header and footer files, or use a templating engine.

$status = $_GET['status'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Status</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .message {
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($status == 'success'): ?>
            <div class="message success">
                Your PineApple ID has been created successfully! You can now <a href="Login.html">sign in</a>.
            </div>
        <?php elseif ($status == 'error'): ?>
            <div class="message error">
                There was an error creating your PineApple ID. Please try again.
            </div>
        <?php else: ?>
            <div class="message">
                Unexpected status.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
