<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        // User is not authenticated, redirect to the login page
        $url="Location: /phoneChai/login_admin.php";
        header($url);
        exit;
    }
    include 'views/napbar.php';
    include 'model/connection.php';
    $sql = "SELECT phone_table.name AS name_from_phone, phone, address, quantity, price,imageUrl FROM phone_table,order_table WHERE userName ='".$_SESSION['username'] ."'AND order_table.phone_id=phone_table.id";
?>
<?php
echo "My Order";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
.flex_container{
    
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.flex_container > div{
    font-size: 15px;
    margin:10px;
    height:fit-content;
    width:fit-content;
    padding: 20px;
    border: 1px solid #64ffda;

}
    </style>
</head>
<body>
<div class="flex_container">
<?php


if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            //var_dump($row);
        // Free result set. mysqli_free_result() function frees the memory associated with the result.
?>

                    <div class="div1">
                        <b class="highlight_color2" style="font-size: 15px;"><?php echo $row['name_from_phone']; ?></b>
                        <a href=<?php echo $row['imageUrl'] ?>><img src=<?php echo $row['imageUrl'] ?> alt="Oppo Reno 10x Mark 2" class="mobileImg"/></a>
                        <p><?php echo $row['phone']; ?></p>
                        <p><?php echo $row['address']; ?></p>
                        <p><?php echo $row['quantity']; ?></p>
                        <p><?php echo $row['price']; ?></p>
                    </div>


<?php
}
?>
                </div>
<?php      
//mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



?>
</body>
</html>
