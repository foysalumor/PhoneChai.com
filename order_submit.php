<?php
include 'model/connection.php';
$conn = $db;

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Retrieve user input from the signup form
$username = $_POST['user'];
$name = $_POST['name'];
$phone= $_POST['phone'];
$quantity = $_POST['quantity'];
$address = $_POST['address'];
$phone_id = $_POST['phone_id'];
// Insert user data into the database
$query = "INSERT INTO order_table (userName, name, phone, quantity, address, phone_id) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($query);
$stmt->bind_param("ssssss", $username, $name, $phone, $quantity, $address, $phone_id);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$db->close();
$url="Location: /phoneChai/phones.php?brand=";
header($url);
}
?>











