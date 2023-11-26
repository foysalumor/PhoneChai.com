<?php
   
    include 'views/napbar.php';
    
    include 'model/connection.php';
    $brand= $_GET['brand'];
 
    
    if ($brand !=""){
        $sql = "SELECT * FROM phone_table WHERE brand = '".$brand."' LIMIT 10";
    }
    else{
        $sql = "SELECT * FROM phone_table LIMIT 10";
    }
    

    
?>

<style>
a[name="nav2"]:link, a[name="nav2"]:visited {
  background-color: #4d4d4d;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;

}

a[name="nav2"]:hover, a[name="nav2"]:active {
  background-color: #1a1a1a;
}

.nav2container {
  display: flex;
  justify-content: center;
}
</style>
<title>Phones</title>

   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>

<script type="text/javascript">
    $(document).ready(function(){
	$(window).scroll(function(){
		var lastID = $('.load-more').attr('lastID');
		
		 if(($('#postList').height() <= $(window).scrollTop() + $(window).height())&& (lastID != 0)){
			$.ajax({
				type:'POST',
				url:'getData.php',
				data:'id='+lastID,
				beforeSend:function(){
					$('.load-more').show();
				},
				success:function(html){
					$('.load-more').remove();
					$('#postList').append(html);
				}
			});
		}
	});
});
</script>



<div class="nav2container">
          <a class="nav-link mx-2 active" aria-current="page" name="nav2" href="http://localhost/phoneChai/delete_phone.php?brand=">All Brands</a>

          <a class="nav-link mx-2 active" aria-current="page" name="nav2" href="http://localhost/phoneChai/delete_phone.php?brand=Oppo">Oppo</a>

          <a class="nav-link mx-2 active" aria-current="page" name="nav2" href="http://localhost/phoneChai/delete_phone.php?brand=Samsung">Samsung</a>

          <a class="nav-link mx-2 active" aria-current="page" name="nav2" href="http://localhost/phoneChai/delete_phone.php?brand=OnePlus">OnePlus</a>

          <a class="nav-link mx-2 active" aria-current="page" name="nav2" href="http://localhost/phoneChai/delete_phone.php?brand=Xiaomi">Xiaomi</a>
   
          <a class="nav-link mx-2 active" aria-current="page" name="nav2" href="http://localhost/phoneChai/delete_phone.php?brand=Realme">Realme</a>
 
          <a class="nav-link mx-2 active" aria-current="page" name="nav2" href="http://localhost/phoneChai/delete_phone.php?brand=Nokia">Nokia</a>
</div>

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

<script>  
 $(document).ready(function(){  
   
      $(document).on('click', '#btn_more', function(){  
           console.log("Working");
           var last_video_id = $(this).data("vid");  
           var brand="<?php echo $brand ?>";
           console.log(brand);
           $('#btn_more').html("Loading...");  
           $.ajax({  
                url:"http://localhost/phoneChai/load_data_delete.php",  
                method:"POST",  
                data:{last_video_id:last_video_id,brand:brand},  
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
</div>
<?php
    include 'views/footer.php';
?>
<style type="text/css">

.wrap {
    display: table;
}

.wrap div{
    display: table-cell;
    vertical-align: top;
    padding: 20px;

}

</style>

<div class="wrap">
   <div class="">
<img src="https://th.bing.com/th/id/OIP.avb9nDfw3kq7NOoP0grM4wHaEK?pid=ImgDet&rs=1">   
   </div>
   <div class="">
      <img src="https://th.bing.com/th/id/OIP.avb9nDfw3kq7NOoP0grM4wHaEK?pid=ImgDet&rs=1">   
   </div>
   <div class="">
       <img src="https://th.bing.com/th/id/OIP.avb9nDfw3kq7NOoP0grM4wHaEK?pid=ImgDet&rs=1">   
   </div>
</div>