<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Delete the cookie if it exists
if(isset($_COOKIE['user_id'])) {
    setcookie("user_id", "", time() - 3600, "/");
}

// Redirect to login page
header("Location: login.php");
exit;
?>
