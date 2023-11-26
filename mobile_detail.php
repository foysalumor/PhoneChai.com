<?php
// Start or resume the session
session_start();

// Rest of your PHP code follows...
// Avoid any output or HTML content before session_start()
?>
<?php
   
    include 'views/napbar.php';
    include 'model/connection.php';
   
    $sql = "SELECT * FROM phone_table WHERE id = ".$_POST["mobile_detail"]." LIMIT 1";
?>
<?php
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            //var_dump($row);
        // Free result set. mysqli_free_result() function frees the memory associated with the result.
                    

?>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
 th, td {
  border-color: #96D4D4;
}


#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 45%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
</head>

<center>
<img id="myImg" src=<?php echo $row['imageUrl'] ?> alt=<?php echo $row['name']; ?> width="300" height="200">

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>


<b><?php echo $row['name']; ?> Full Specification</b>
<table style="width:50%">

  <tr style="height:30px">
    <td >Brand</td>
    <td ><?php echo $row['brand']; ?></td>
  </tr>

   <tr style="height:30px">
    <td >Price</td>
    <td ><?php echo $row['price']; ?></td>
  </tr>

    <tr style="height:30px">
    <td >RAM</td>
    <td ><?php echo $row['ram']; ?></td>
  </tr>

    <tr style="height:30px">
    <td >ROM</td>
    <td ><?php echo $row['rom']; ?></td>
  </tr>
    <tr style="height:30px">
    <td >Chipset</td>
    <td ><?php echo $row['chipset']; ?></td>
  </tr>
</table>
<br>
<p><b>Display</b></p>
<table style="width:50%">

  <tr style="height:30px">
    <td >Display Size</td>
    <td ><?php echo $row['display_size']; ?></td>
  </tr>

   <tr style="height:30px">
    <td >Display Resulation</td>
    <td ><?php echo $row['display_resulation']; ?></td>
  </tr>

    <tr style="height:30px">
    <td >Display Type</td>
    <td ><?php echo $row['display_type']; ?></td>
  </tr>


</table>
<br>
<p><b>Camera</b></p>
<table style="width:50%">

  <tr style="height:30px">
    <td >Rear Camera</td>
    <td ><?php echo $row['rear_camera']; ?></td>
  </tr>

   <tr style="height:30px">
    <td >Rear Camera</td>
    <td ><?php echo $row['front_camera']; ?></td>
  </tr>
</table>
<br>
<p><b>Battery</b></p>
<table style="width:50%">

  <tr style="height:30px">
    <td >Capacity</td>
    <td ><?php echo $row['capacity']; ?></td>
  </tr>

   <tr style="height:30px">
    <td >Battery Type</td>
    <td ><?php echo $row['battery_type']; ?></td>
  </tr>
</table>
<br>
<p><b>Others</b></p>
<table style="width:50%">

  <tr style="height:30px">
    <td >Sensor</td>
    <td ><?php echo $row['sensor']; ?></td>
  </tr>

   <tr style="height:30px">
    <td >Jack</td>
    <td ><?php echo $row['jack']; ?></td>
  </tr>
</table>
<?php
$encodedData = urlencode($row['id']);
$url = "/phoneChai/purchage.php?data=$encodedData";
echo "<a href=$url>Buy</a>"
?>


</center>

<?php
}
?>


<?php      
//mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
<script type="text/javascript">
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
<?php
    include 'views/footer.php';
?>