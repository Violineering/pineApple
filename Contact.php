<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ContactStyle.css">
    <title>Contact Us - Pineapple</title>

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
