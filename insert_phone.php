<?php
session_start();
include 'model/connection.php';


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Retrieve user input from the signup form
$name = $_POST['name'];
$price = $_POST['price'];
$brand = $_POST['brand'];
$display = $_POST['display'];
$ram = $_POST['ram'];
$rom = $_POST['rom'];
$camera = $_POST['camera'];
$battery = $_POST['battery'];
$image_url = $_POST['image_url'];

// Insert user data into the database
$query = "INSERT INTO phone_table (name, price, brand, display, ram, rom, rear_camera, battery,imageUrl) VALUES (?, ?,?, ?,?, ?,?, ?, ?)";
$stmt = $db->prepare($query);
$stmt->bind_param("sssssssss",$name, $price, $brand, $display, $ram, $rom, $camera, $battery,$image_url);

if ($stmt->execute()) {
    echo "Submission successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$db->close();
}
?>






<?php
if( isset($_SESSION['username'])){
if($_SESSION['username']!="admin"){
    echo "This Page is only for Admin";
}
else{
?>







<!DOCTYPE html>
<html>
<head>
    <title>Insert data</title>
</head>
<body>
    <h2>Insert data</h2>
    <form method="post" action="insert_phone.php">
        <label for="name">Name:</label>
        <input type="text" id="Name" name="name" required><br><br>



        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br><br>


        <label for="brand">Brand:</label>
        <select name="brand" id="brand" >
            <option value="Oppo">Oppo</option>
            <option value="Samsung">Samsung</option>
            <option value="OnePlus">One Plus</option>
            <option value="Xiaomi">Xiaomi</option>
            <option value="Realme">Realme</option>
            <option value="Nokia">Nokia</option>
        </select><br><br>

        <label for="display">Display:</label>
        <input type="text" id="display" name="display" required><br><br>

        <label for="ram">Ram:</label>
        <input type="text" id="ram" name="ram" required><br><br>

        <label for="ram">Rom:</label>
        <input type="text" id="rom" name="rom" required><br><br>

        <label for="ram">Camera:</label>
        <input type="text" id="camera" name="camera" required><br><br>

        <label for="batteray">Batteray:</label>
        <input type="text" id="battery" name="battery" required><br><br>

        <label for="image_url">image Url:</label>
        <input type="text" id="image_url" name="image_url" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
}
}
else{
    echo "This page only for Admin";
}
?>