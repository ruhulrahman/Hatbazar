<?php require_once ("inc/header.php");?>


	<section class="banner_Top_area">
		<div class="container banner_Top">
			<div class="row">
				<div class="col-lg-12">
					<div class="addvertiseTop">
						<img src="img/advertisement/HNW.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	

	<section class="viewpost_area">
		<div class="container viewpost">
			<div class="row">
				<div class="col-lg-3">
					<?php require_once ("category.php");?>
				</div>	
				<div class="col-lg-6">
					<h2>ব্যবহৃত পণ্যসমূহ</h2>
					<hr>
					<?php
						$getUsedAllCars = $pd->getUsedAllCars();
							if($getUsedAllCars){

								while($result = $getUsedAllCars->fetch_assoc()){ ?>
			
							<a class="signle_view_post" href="view_single_post.php?productId=<?php echo $result['id'];?>">
								<p><?php echo $result['brandName'];?></p>
								<img src="<?php echo $result['photos'];?>" alt="" />
								<h3><?php echo $result['productName'];?></h3>
								<p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['thanaName'].", ".$result['districtName'];?></p>
								<h5>৳ <?php echo $result['price'];?></h5>
							</a>
                    <?php }}else{?>
							<h3 class="text-center error">You don't have any post!!</h3>
                    <?php } ?>



					<?php
                    	$getUsedAllElects = $ec->getUsedAllElects();
							if($getUsedAllElects){
								while($result = $getUsedAllElects->fetch_assoc()){ ?>

			
							<a class="signle_view_post" href="view_single_post.php?electId=<?php echo $result['electId'];?>">
								<p><?php echo $result['brandName'];?></p>
								<img src="<?php echo $result['image'];?>" alt="" />
								<h3><?php echo $result['post_title'];?></h3>
								<p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['thanaName'].", ".$result['districtName'];?></p>
								<h5>৳ <?php echo $result['price'];?></h5>
							</a>
                    <?php }}else{?>
							<h3 class="text-center error">You don't have any post!!</h3>
                    <?php } ?>


				</div>
				<div class="col-lg-3">
					<?php require_once ("brand.php");?>
				</div>
			</div>
		</div>
	</section>	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<?php require_once ("inc/footer.php");?>
