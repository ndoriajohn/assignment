<?php
// Include database connection file
require_once 'connections/DbConn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $address = $_POST['address'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Check if the username is already in use
    $check_username_sql = "SELECT * FROM users WHERE User_Name = '$username'";
    $result = $conn->query($check_username_sql);

    if ($result->num_rows > 0) {
        echo "Error: Username '$username' is already taken. Please choose a different username.";
    } else {
        // Handle file upload for profile image
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);

        // Insert the new user into the database with the file path
        $insert_user_sql = "INSERT INTO users (User_Name, Password, phone_Number, Full_Name, email, UserType, profile_Image, Address) 
                VALUES ('$username', '$hashed_password', '$phone', '$full_name', '$email', '$user_type', '$target_file', '$address')";

        if ($conn->query($insert_user_sql) === TRUE) {
            echo "User registered successfully";
        } else {
            echo "Error: " . $insert_user_sql . "<br>" . $conn->error;
        }
    }


    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        .signup-container {
            width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        select {
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Signup</h2>
    <div class="signup-container">
        <form action="signup.php" method="post" enctype="multipart/form-data">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>
            
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" pattern="[0-9]{10}" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
             <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>


            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea>

            <label for="user_type">User Type:</label>
            <select id="user_type" name="user_type" required>
                <option value="administrator">Administrator</option>
                
                <option value="super_user">Super_User</option>
            </select>

            <label for="profile_image">Profile Image:</label>
            <input type="file" id="profile_image" name="profile_image" accept="image/*">

            

            <input type="submit" value="Sign Up">
        </form>
        <br>
        <p>Already have an account? <a href="index.php">Login</a></p>
    </div>
</body>
</html>
