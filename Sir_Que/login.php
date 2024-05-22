<!-- login.php:

Starts the session.
Includes the database connection file.
Handles the form submission by checking if the request method is POST.
Retrieves and sanitizes the username from the POST data.
Queries the database to check if the username exists.
Verifies the password using password_verify.
Sets session variables and cookies if "Remember me" is checked.
Redirects to index.php upon successful login. -->



<?php
session_start();
include('db.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    // Protect against SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    
    // Query the database for the user
    $query = "SELECT id, username, password FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Set session variable for user id
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            
            // Set cookies if "Remember me" is checked
            if ($remember) {
                setcookie('username', $username, time() + 86400, "/"); // 1 day
                setcookie('password', $password, time() + 86400, "/");
            }
            // Redirect to index.php after successful login
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }
}
?>
<!-- Login form -->
<form method="post" action="">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Remember me: <input type="checkbox" name="remember"><br>
    <input type="submit" value="Login">
</form>
