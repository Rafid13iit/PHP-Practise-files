<?php
session_start();

if(isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to index.php if user is already logged in
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    require_once "db_connection.php";

    // Get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute SQL query to check user credentials
    $sql = "SELECT id, username, password FROM user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // If user exists, set session variable and redirect to index.php
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];

        // Check if 'Remember Me' option is selected
        if(isset($_POST['remember_me']) && $_POST['remember_me'] == 1) {
            // Set cookie with user id to remember user for one day (86400 seconds)
            setcookie("user_id", $row['id'], time() + 86400, "/");
        }

        header("Location: index.php");
        exit;
    } else {
        echo "Invalid username or password";
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="checkbox" id="remember_me" name="remember_me" value="1">
        <label for="remember_me">Remember Me</label><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
