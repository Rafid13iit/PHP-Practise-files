<!-- index.php:

Starts the session.
Checks if the user is logged in by verifying if the session variable user_id is set.
Displays a welcome message if the user is logged in.
Provides a logout link to logout.php. -->


<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
echo "Welcome, you are logged in!";
?>
<!-- Logout link -->
<a href="logout.php">Logout</a>
