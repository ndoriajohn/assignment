<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        form {
            width: 300px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Update Profile</h2>
    <form action="updateProfileProcess.php" method="post">
        <label for="Full Name">Full Names:</label>
        <input type="text" id="full_name" name="full_name"><br>
        <br>
        <label for="user_type">User Type:</label>
            <select id="user_type" name="user_type" required>
                <option value="administrator">Administrator</option>
                
                <option value="super_user">Super_User</option>
            </select>
        <br>
        <br>
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        
        <label for="profile_image">Profile Image:</label>
        <input type="file" id="profile_image" name="profile_image" accept="image/*"><br>

         <br>

        <input type="submit" value="Update Profile">
    </form>
</body>
</html>

