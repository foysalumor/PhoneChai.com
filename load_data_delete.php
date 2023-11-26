<?php
   

    include 'model/connection.php';
    $brand=$_POST['brand'];
    if ($brand !=""){
        //$sql = "SELECT * FROM phone_table WHERE brand = '".$brand."'";
        $sql = "SELECT * FROM phone_table WHERE id > ".$_POST['last_video_id']." AND brand = '".$brand."' LIMIT 5";
    }
    else{
        $sql = "SELECT * FROM phone_table WHERE id > ".$_POST['last_video_id']." LIMIT 5";
    }
    

    
?>
    <head>
    
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
     </head>  
   <title>Phones</title>



        <div class="container mx-auto px-6">
<div id="postList">
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">

<?php
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            //var_dump($row);
        // Free result set. mysqli_free_result() function frees the memory associated with the result.
?>
     
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
            <form action="http://localhost/phoneChai/mobile_delete.php" method ="post" id="Systemform2" >
                <button  style="text-align:center" type="Submit" class="btn btn-light"name="mobile_detail" value=<?php echo $row['id']; ?> form="Systemform2" class="read_more">Delete</button>
            </form>
            <?php echo $row['id'];?>
         
     
   </div>
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
            <button type="button" name="btn_more" data-vid="<?php echo $postID; ?>" id="btn_more" class="nav-link">more</button>
              
            </div>
        </div>
</div>
 <script>  
 $(document).ready(function(){  
   
      $(document).on('click', '#btn_more', function(){  
           console.log("Working");
           var last_video_id = $(this).data("vid");  
           $('#btn_more').html("Loading...");  
           $.ajax({  
                url:"/load_data.php",  
                method:"POST",  
                data:{last_video_id:last_video_id},  
                dataType:"text",  
                success:function(data)  
                {  
                     if(data != '')  
                     {  
                        $('#btn_more').remove();
					    $('#postList').append(data);
                     }  
                     else  
                     {  
                          $('#btn_more').html("No Data");  
                          console.log("Faild");
                     }  
                }  
           });  
      });  
 });  
 </script>



