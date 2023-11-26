<?php
// Start or resume the session
session_start();

// Rest of your PHP code follows...
// Avoid any output or HTML content before session_start()
?>
<?php
   
    include 'views/napbar.php';
    include 'model/connection.php';
   

    $sql = "DELETE FROM phone_table WHERE id = ".$_POST["mobile_detail"];

    // Execute the DELETE query
    if ($db->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $db->error;
    }

    // Close the database connection
    $db->close();
?>