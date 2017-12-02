<?php require_once ("inc/header.php");?>

<?php
	if(!isset($_GET['catId']) || $_GET['catId'] == NULL){
		echo "<script>window.location=404.php;</script>";
	}else{
		$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catId']);
	}
?>
		
	<section class="viewpost_area">
		<div class="container viewpost">
			<div class="row">
				<div class="col-lg-3">
					<?php require_once ("category.php");?>
				</div>	
				<div class="col-lg-6">
					<?php
						$getAllProByCat = $pd->getAllProductsByCat($id);

						$getAllElectProByCat = $ec->getAllElectProByCat($id);

						if($getAllProByCat){
							while($result = $getAllProByCat->fetch_assoc()){ ?>

				
					<a class="signle_view_post" href="view_single_post.php?productId=<?php echo $result['id'];?>">
						<p><?php echo $result['brandName'];?></p>
						<img src="<?php echo $result['photos'];?>" alt="" />
						<h3><?php echo $result['productName'];?></h3>
						<p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['thanaName'].",".$result['districtName'];?></p>
						<h5>৳ <?php echo $result['price'];?></h5>
					</a>
					<?php } }else if($getAllElectProByCat){
							while($result = $getAllElectProByCat->fetch_assoc()){ ?>

				
					<a class="signle_view_post" href="view_single_post.php?electId=<?php echo $result['electId'];?>">
						<p><?php echo $result['brandName'];?></p>
						<img src="<?php echo $result['image'];?>" alt="" />
						<h3><?php echo $result['post_title'];?></h3>
						<p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['thanaName'];?></p>
						<h5>৳ <?php echo $result['price'];?></h5>
					</a>
					<?php } 
					}else{
						echo "<h3 class='text-center' style='color:red'>Product not found by category.</h3>";
					} ?>



				</div>
				<div class="col-lg-3">
					<?php require_once ("brand.php");?>
				</div>
			</div>
		</div>
	</section>	
		
		
<?php require_once ("inc/footer.php");?>
