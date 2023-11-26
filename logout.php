<?php
session_start(); // Start the session (if not already started)

// Check if the user is logged in (you can adjust this check according to your authentication method)
if (isset($_SESSION['username'])) {
    // If the user is logged in, destroy the session
    session_destroy();
    header("Location: /phoneChai/login_admin.php"); // Redirect to a login page or any other desired page
    exit();
} else {
    // If the user is not logged in, you can redirect them to a login page or some other appropriate action.
    header("Location: /phoneChai/login_admin.php"); // Redirect to a login page or any other desired page
    exit();
}
?>