<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/Profile.css">
    <title>Edit Profile - Pineapple</title>
    
</head>

<body>
    <?php include('includes/navigationHeader.php'); ?>

    <div class="edit-profile-container">
        <h1>Edit Profile</h1>

        <form id="editProfileForm" enctype="multipart/form-data">
            <!-- Profile Picture -->
            <div class="profile-pic">
                <img src="/pineApple/image/profilepic.jpg" alt="Profile Picture" id="profilePic">
                <label class="change-pic-btn" for="profilePicInput">Change Profile Picture</label>
                <input type="file" id="profilePicInput" name="profilePic" accept="image/*">
            </div>

            <!-- PineApple ID -->
            <div class="input-group">
                <label for="PineApple ID">PineApple ID</label>
                <input type="text" id="PineApple ID" name="PineApple ID" value="JohnDoe" readonly>
            </div>

            <!-- Email -->
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="johndoe@example.com" required>
                <div class="error-message" id="emailError">Please enter a valid email.</div>
            </div>

            <!-- Phone Number -->
            <div class="input-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                <div class="error-message" id="phoneError">Please enter a valid phone number (e.g., 123-456-7890).</div>
            </div>

            <!-- Birthday -->
            <div class="input-group">
                <label for="birthday">Birthday</label>
                <input type="date" id="birthday" name="birthday" required>
                <div class="error-message" id="birthdayError">Please enter a valid date.</div>
            </div>

            <button type="submit" class="btn">Save Changes</button>
        </form>
    </div>

    <?php include('includes/footer.php'); ?>

    <script>
        // Form validation logic
        document.getElementById('editProfileForm').addEventListener('submit', function (event) {
            event.preventDefault();

            let email = document.getElementById('email').value;
            let phone = document.getElementById('phone').value;
            let birthday = document.getElementById('birthday').value;

            let isValid = true;

            // Email validation
            let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('emailError').style.display = 'none';
            }

            // Phone number validation
            let phonePattern = /^\d{3}-\d{3}-\d{4}$/;
            if (!phonePattern.test(phone)) {
                document.getElementById('phoneError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('phoneError').style.display = 'none';
            }

            // Birthday validation
            if (!birthday) {
                document.getElementById('birthdayError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('birthdayError').style.display = 'none';
            }

            if (isValid) {
                alert('Profile updated successfully!');
                // Here you can add the actual submission logic (e.g., via AJAX or form submission)
            }
        });

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

</html>
