<?php
// Include the database connection file
include 'connections/DbConn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $userType = $_POST["userType"];

    // Prepare and execute SQL query to check credentials
    $stmt = $conn->prepare("SELECT User_Name, Password, UserType FROM users WHERE User_Name = ?");
    
    // Check if the prepare statement was successful
    if ($stmt === false) {
        die('Error in prepare statement: ' . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Check if the provided password matches the hashed password in the database
        if (password_verify($password, $row['Password']) && $userType === $row['userType']) {
            // Authentication successful, redirect to the appropriate page
            if ($userType === "super_user") {
                header("Location: ../superUserDashboard.php");
                exit();
            } else {
                header("Location: ../adminDashboard.php");
                exit();
            }
        } else {
            // Authentication failed, handle accordingly
            echo "Invalid username or password.";
        }
    } else {
        // User not found, handle accordingly
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
}
?>
