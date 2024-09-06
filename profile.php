<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Edit Profile - Pineapple</title>
    
    <style>
        /* General Styles */
        body {
            background-color: #f5f5f7;
            color: #1d1d1f;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .edit-profile-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 20px auto;
            margin-top: 150px;
        }

        h1 {
            font-size: 24px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input:focus {
            border-color: #007aff;
            outline: none;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007aff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0051a8;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .footer a {
            color: #007aff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Profile Picture Styles */
        .profile-pic {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-pic img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .change-pic-btn {
            display: block;
            margin: 10px auto;
            padding: 8px 12px;
            width: 60%;
            background-color: rgba(0, 0, 0, 0.2); /* Semi-transparent background */
            color: black;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .change-pic-btn:hover {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .profile-pic input[type="file"] {
            display: none;
        }
    </style>
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

            <!-- Username -->
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="JohnDoe" readonly>
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
