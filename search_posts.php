<?php require_once ("inc/header.php");?>

<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$search = $_POST['search'];
		$getAllProductsBySearch = $pd->getProductBySearchByUser($search);
		//$getAllProductsBySearch = $pd->getProductBySearchBandName($search);
		
	}
?>
		
	<section class="viewpost_area">
		<div class="container viewpost">
			<div class="row">
				<div class="col-lg-3">
					<?php require_once ("category.php");?>
				</div>
				<div class="col-lg-9">
					<?php
							if(isset($getAllProductsBySearch)){
								if($getAllProductsBySearch){
								while($result = $getAllProductsBySearch->fetch_assoc()){ ?>
							

				
							<a class="signle_view_post" href="view_single_post.php?productId=<?php echo $result['id'];?>">
								<img src="<?php echo $result['photos'];?>" alt="" />
								<h3><?php echo $result['productName'];?></h3>
								<p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['address'];?></p>
								<h5>৳ <?php echo $result['price'];?></h5>
								<h6>Brand Name: <?php echo $result['brandName'];?></h6>
								<h6>Category Name: <?php echo $result['categoryName'];?></h6>
							</a>
					<?php  } }}else{
						echo "<h3 style='color:red' class='text-center'>Data Not Found!</h3>";
					} ?>

				</div>
			</div>
		</div>
	</section>	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<?php require_once ("inc/footer.php");?>
