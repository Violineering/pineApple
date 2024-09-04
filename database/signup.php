<?php
include 'database/dbConn.php';

//Initialize variables
$fullname = $email = $password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['new-email'];
    $password = $_POST['new-password'];
    $created_at = date("Y-m-d H:i:s");

    // Hash the password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Validate inputs
    if($_POST['submit'] == 'Create'){
        if(empty($fullname)){
            $errors[] = "Fullname is required.";
        }
        if(empty($email)){
            $errors[] = "Email is required";
        }
        if(empty($password)){
            $errors[] = "Password is required";
        }
    }

    // Insert into database
    if(empty($errors)){
        $sql = "INSERT INTO users (username, email, password_hash, created_at) VALUES ('$fullname', '$email', '$passwordHash', '$created_at')";

        if($conn->query($sql) === TRUE){
            echo "New user created successfully";     
    }else{
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
    }
   
    $conn->close();
}
?>
