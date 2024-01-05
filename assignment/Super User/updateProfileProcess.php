<?php
if (!isset($_SESSION)) {
    session_start();
}

// Check if the user is logged in


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get user input from the form
    
    $phone = $_POST['phone'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $address = $_POST['address'];
    
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
    move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);
    

    // Establish Connection with Database
    $conn = mysqli_connect("localhost", "root", "", "mydatabase");

    // Update the user profile in the database
    $updateSql = "UPDATE users SET phone_Number = '$phone', "
            . "Full_Name = '$full_name', email = '$email',"
            . " UserType = '$user_type', profile_Image = '$target_file', "
            . "Address = '$address' "
            . "WHERE User_Name = '$username'";

    $updateResult = mysqli_query($conn, $updateSql);

    // Check if the update was successful
    if ($updateResult) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }

    // Close the database connection
   mysqli_close($conn);
echo '<script type="text/javascript">alert(" Profile Updated Succesfully");window.location=\'superUserDashboard.php\';</script>';
}
?>






