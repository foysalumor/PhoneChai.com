<?php
session_start();
include 'model/connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password using a strong hashing algorithm (e.g., bcrypt)
    // Replace 'your_password_hashing_function' with the appropriate function
    // $hashed_password = your_password_hashing_function($password);

    // Query the database to check if the user exists
    $sql = "SELECT * FROM user WHERE userName = ? AND password = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Authentication successful, store user data in the session
        $_SESSION['username'] = $username;
        $url="Location: /phoneChai/admin.php";
        header($url);
        exit;
    } else {
        // Authentication failed, display an error message
        $error = "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="login_admin.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
    <a href="/phoneChai/signup.php">Sign up</a>
</body>
</html>
