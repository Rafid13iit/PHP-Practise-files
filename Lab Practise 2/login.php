<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and validate inputs
    $username = $_POST["username"];
    $password = $_POST["password"];

    // You should perform additional checks and hashing of passwords in a real-world scenario
    // For simplicity, we'll just compare the username and password as-is
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.html");
    } else {
        echo "Invalid username or password";
    }

    $conn->close();
}
?>
