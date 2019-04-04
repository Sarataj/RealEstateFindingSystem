<?php include 'inc/header.php';?>	


 <div class="main">
    <div class="content">
    	<div class="content_top">
    		
    		<div class="clear"></div>
    	</div>
	      <div class="section group">

	      	<?php 

               $getFpd = $pd->getFeaturedProduct();
               if ($getFpd) {
               	while($result = $getFpd->fetch_assoc()){

	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php  echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" width="300px" height="220px"/></a>
					 <h2><?php echo $result['productName'];?></h2>
					 <p><?php echo $fm->textShorten( $result['body'],60);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php  echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
				
				<?php } } ?>
				
			</div>
			<div class="content_bottom">
    		
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php 
                 $getNpd = $pd->getNewProduct();
               if ($getNpd) {
               	while($result = $getNpd->fetch_assoc()){

	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php  echo $result['productId'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" width="300px" height="220px"/></a>

					<h2><?php echo $result['productName'];?></h2>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				    
				     <div class="button"><span><a href="preview.php?proid=<?php  echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
			<?php } } ?>
						
			</div>
    </div>
 </div>
</div>
  
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<?php include 'inc/footer.php';?>

