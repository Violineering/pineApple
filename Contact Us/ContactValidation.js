document.addEventListener('DOMContentLoaded', function() {
    // Select the HTML elements needed for validation
    const form = document.getElementById('contactForm');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const commentsInput = document.getElementById('comments');

    // Add event listener to the form for submission
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const errors = [];

        // Clear previous error messages
        document.querySelectorAll('#contactForm .error-message').forEach(function(div) {
            div.textContent = '';
        });

        // Validate Name
        if (nameInput.value.trim() === '') {
            errors.push('Please enter your name');
            document.getElementById('nameError').textContent = 'Please enter your name';
            document.getElementById('nameError').style.color = 'red'; // set color to red
        }

        // Validate Email
        if (emailInput.value.trim() === '') {
            errors.push('Please enter your email address');
            document.getElementById('emailError').textContent = 'Please enter your email address';
            document.getElementById('emailError').style.color = 'red'; // set color to red
        } else if (!isValidEmail(emailInput.value.trim())) {
            errors.push('Please enter a valid email address');
            document.getElementById('emailError').textContent = 'Please enter a valid email address';
            document.getElementById('emailError').style.color = 'red'; // set color to red
        }

        // Validate Phone Number
        if (phoneInput.value.trim() === '') {
            errors.push('Please enter your phone number');
            document.getElementById('phoneError').textContent = 'Please enter your phone number';
            document.getElementById('phoneError').style.color = 'red'; // set color to red
        } else if (!/^\d+$/.test(phoneInput.value.trim())) {
            errors.push('Phone number must be numeric');
            document.getElementById('phoneError').textContent = 'Phone number must be numeric';
            document.getElementById('phoneError').style.color = 'red'; // set color to red
        }

        // Validate Comments
        if (commentsInput.value.trim() === '') {
            errors.push('Please enter your comments');
            document.getElementById('commentsError').textContent = 'Please enter your comments';
            document.getElementById('commentsError').style.color = 'red'; // set color to red
        }

        // Submit the form if there are no errors
        if (errors.length === 0) {
            form.submit();
        }
    });

    // Function to validate email using a regular expression
    function isValidEmail(email) {
        const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        return emailRegex.test(email);
    }
});
