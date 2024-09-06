<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Contact Us - Pineapple</title>

    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            overflow: hidden; /* Prevents scrollbars from appearing */
        }

        #slideshow {
            position: fixed; /* Fixed position to cover the whole viewport */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1; /* Places it behind other content */
            display: flex;
        }

        #slideshow img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            animation: slide 30s infinite;
        }

        @keyframes slide {
            0% { opacity: 1; }
            20% { opacity: 0; }
            25% { opacity: 0; }
            45% { opacity: 1; }
            100% { opacity: 1; }
        }

        /* Contact Wrapper Styles */
        #contact_wrapper {
    position: relative;
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 1; /* Ensures it appears above the slideshow */
    margin-top: 80px; /* Adjust this value to create space between the nav bar and the form */
}

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #007aff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #0051a8;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
        }

        .footer a {
            color: #007aff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div id="slideshow">
        <img src="images/slideshow/image1.jpg" alt="Background Slide 1">
        <img src="images/slideshow/image2.jpg" alt="Background Slide 2">
        <img src="images/slideshow/image3.jpg" alt="Background Slide 3">
    </div>

    <?php include('includes/navigationHeader.php'); ?>

    <div id="contact_wrapper">
        <form method="post" id="contactForm" action="Message.html">
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

            <button type="submit" class="btn" onclick="validateForm(event)">Submit</button>
        </form>
    </div>

    <?php include('includes/footer.php'); ?>

    <script>
        function validateForm(event) {
            event.preventDefault();

            var isValid = true;
            var form = document.getElementById('contactForm');

            // Clear previous error messages
            document.querySelectorAll('#contactForm .error-message').forEach(function(div) {
                div.textContent = '';
            });

            // Validate Name
            if (form['name'].value.trim() === '') {
                document.getElementById('nameError').textContent = 'Please enter your name!';
                isValid = false;
            }

            // Validate Email
            if (form['email'].value.trim() === '') {
                document.getElementById('emailError').textContent = 'Email is required!';
                isValid = false;
            } else if (!/\S+@\S+\.\S+/.test(form['email'].value)) {
                document.getElementById('emailError').textContent = 'Email is not valid!';
                isValid = false;
            }

            // Validate Phone Number
            if (form['phone'].value.trim() === '') {
                document.getElementById('phoneError').textContent = 'Phone number is required!';
                isValid = false;
            } else if (!/^\d+$/.test(form['phone'].value)) {
                document.getElementById('phoneError').textContent = 'Phone number must be numeric!';
                isValid = false;
            }

            // Validate Comments
            if (form['comments'].value.trim() === '') {
                document.getElementById('commentsError').textContent = 'Comments are required!';
                isValid = false;
            }

            if (isValid) {
                form.submit(); // Proceed with form submission if valid
            }
        }
    </script>
</body>

</html>
