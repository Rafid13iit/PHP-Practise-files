<?php
session_start();
include('db.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        echo "Passwords do not match.";
    } else {
        // Check if the username already exists
        $query = "SELECT id FROM user WHERE username='$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "Username already exists.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $query = "INSERT INTO user (username, password) VALUES ('$username', '$hashed_password')";
            if (mysqli_query($conn, $query)) {
                echo "Registration successful.";
                // Redirect to login page
                header("Location: login.php");
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
    }
}
?>

<form method="post" action="">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Confirm Password: <input type="password" name="confirm_password" required><br>
    <input type="submit" value="Sign Up">
</form>
<p>Already have an account? <a href="login.php">Login here</a></p>


