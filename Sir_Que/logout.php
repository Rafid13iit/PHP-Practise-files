<!-- logout.php:

Starts the session.
Destroys the session variables and data.
Clears the cookies for username and password.
Redirects the user to the login page. -->


<?php
session_start();

// Destroy session variables and session data
session_unset();
session_destroy();

// Clear cookies
setcookie('username', '', time() - 3600, "/");
setcookie('password', '', time() - 3600, "/");

// Redirect to login page
header("Location: login.php");
exit();
?>
