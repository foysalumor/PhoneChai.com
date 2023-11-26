<?php
session_start();

if (!isset($_SESSION['username'])) {
    // User is not authenticated, redirect to the login page
    $url="Location: /phoneChai/login.php?data=".$_GET['data'];
    header($url);
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Purchase Form</title>
</head>
<body>
    <h1>Purchase Form</h1>
    <form action="order_submit.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="name">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>
        <label for="name">Quantity:</label>
        <input type="text" id="quantity" name="quantity" required><br><br>
        <label for="Address">Address:</label>
        <textarea name="address" rows="4" cols="50" required></textarea><br><br>

        <!-- Hidden fields -->
        <input type="hidden" name="phone_id" value=<?php echo $_GET['data'];?>>
        <input type="hidden" name="user" value=<?php echo $_SESSION['username'];?>>

        <input type="submit" value="Submit" onclick="return confirmOrder()">
    </form>
</body>
<script>
    function confirmOrder() {
      return confirm("Are you sure you want to submit order");
    }
</script>
</html>
