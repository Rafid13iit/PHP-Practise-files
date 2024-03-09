<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if user is not logged in
    exit;
}

echo "Welcome User " . $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
</head>
<body>
    <h2>Index</h2>
    <a href="logout.php">Logout</a>
</body>
</html>
