<?php
include 'model/connection.php';
$conn = $db;

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Retrieve user input from the signup form
$username = $_POST['username'];
$password = $_POST['password'];

// Insert user data into the database
$query = "INSERT INTO user (userName, password) VALUES (?, ?)";
$stmt = $db->prepare($query);
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$db->close();
}
?>











<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form method="post" action="signup.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>



        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
