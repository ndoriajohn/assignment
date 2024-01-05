<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        h2 {
            color: #333;
        }

        div {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: #4caf50;
            padding: 10px;
            border: 1px solid #4caf50;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>
<body>
    <h2>!.....Welcome.....!</h2>
    <div>
        <a href="updateProfile.php">Update Profile</a>
        <a href="manageUsers.php">Manage Other Users</a>
        <a href="view_articles.php">View Articles</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
