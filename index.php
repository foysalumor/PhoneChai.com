<?php
   
    include 'views/napbar.php';
    include 'model/connection.php';
    $sql = "SELECT * FROM phone_table LIMIT 10";

    
?>



<div id="postList">
        <div class="container mx-auto px-6">
            <h3 class="text-gray-700 text-2xl font-medium">Mobile</h3>
            <span class="mt-3 text-sm text-gray-500">200+ Products</span>

            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">

<?php
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            //var_dump($row);
        // Free result set. mysqli_free_result() function frees the memory associated with the result.
?>
     <form action="/phoneChai/mobile_detail.php" method ="post" id="Systemform2" >
       <button type="Submit" class="btn btn-light"name="mobile_detail" value=<?php echo $row['id']; ?> form="Systemform2" class="read_more">
      <div class="container mx-auto max-w-xs rounded-lg overflow-hidden shadow-lg my-2 bg-white">
      <div class="relative mb-6">
      
<a href=<?php echo $row['imageUrl'] ?>><img src=<?php echo $row['imageUrl'] ?> alt="Oppo Reno 10x Mark 2" class="mobileImg"/></a>


      </div>
<h3><?php echo $row['name']; ?></h3>
      


            
            
            <p class="text-green-400 text-sm" style="font-size:15px">RAM</p>
            <p class="text-lg" style="text-align:center"><?php if(empty($row['ram'])){echo "No Data" ;} else{ echo $row['ram'];} ?></p>

            <p class="text-red-400 text-sm" style="font-size:15px">ROM</p>
            <p class="text-lg" style="text-align:center"><?php echo $row['rom']; ?></p>
            
       
            <p class="text-green-400 text-sm" style="font-size:15px">Price</p>
            <p class="text-lg" style="text-align:center"><?php echo $row['price']; ?></p>
            <?php $postID = $row["id"]; ?>
         
     
   </div>
   </button>
        </form>
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
            </div>
            
            <div class="flex justify-center">
                <a type="button" href="/phoneChai/phones.php?brand=" class="nav-link">more</button>
            </div>
        </div>
    </div>
    </div>


</div>







