<?php
session_start();

// Hard-coded admin credentials
$adminUsername = "admin";
$adminPassword = "123456";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == $adminUsername && $password == $adminPassword) {
        $_SESSION["admin"] = true;
        header("Location: contact-list.php");
    } else {
        echo "Invalid username or password";
    }
}
?>
