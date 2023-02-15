<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Delete the cookie
setcookie("POPSMOKEPC", "", time() - 3600, "/");

header('Location:index.php?page=home')
?>
