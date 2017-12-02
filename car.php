<?php require_once ("inc/header.php");?>

	
		
	<section class="viewpost_area">
		<div class="container viewpost">
			<div class="row">
				<div class="col-lg-3">
					<?php require_once ("category.php");?>
				</div>	
				<div class="col-lg-6">
					<?php
                        $getAllCarProduct = $cat->getCarProduct();
                            if($getAllCarProduct){
                                while($result = $getAllCarProduct->fetch_assoc()){ ?>

								<a class="signle_view_post" href="view_single_post.php?productId=<?php echo $result['id'];?>">
									<p><?php echo $result['brandName'];?></p>
									<img src="<?php echo $result['photos'];?>" alt="" />
									<h3><?php echo $result['productName'];?></h3>
									<p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['address'];?></p>
									<h5>৳ <?php echo $result['price'];?></h5>
								</a>




                    <?php       }
                            }else{ ?>
								<h3 class="text-center text-danger"><?php echo "Product Not Found";?></h3>
                    <?php        } ?>

				</div>
				<div class="col-lg-3">
					<?php require_once ("brand.php");?>
				</div>
			</div>
		</div>
	</section>	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<?php require_once ("inc/footer.php");?>
