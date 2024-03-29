<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// If session is present, destroy it
if (session_id() != "" || isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 2592000, '/');
}

// Completely destroy the session
session_destroy();

// Redirect the user to the login page or any other desired page
header("Location: index.php");
exit();
?>
