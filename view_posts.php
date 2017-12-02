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
					<?php

						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$search = $_POST['search'];
							$getCarProductBySearchByUser = $pd->getCarProductBySearchByUser($search);
							$getElectProBySearchByUser = $ec->getElectProBySearchByUser($search);
							//$getAllProductsBySearch = $pd->getProductBySearchBandName($search);	
						}


                        if(isset($getCarProductBySearchByUser) && isset($getElectProBySearchByUser)){
                            $getAllProductsBySearch = $pd->getCarProductBySearchByUser($search);

                            $getElectProBySearchByUser = $ec->getElectProBySearchByUser($search);

                            if($getAllProductsBySearch){
                                $i = 0;
                                while($result = $getAllProductsBySearch->fetch_assoc()){ 
                                	$i++;
                                	?>

								<a class="signle_view_post" href="view_single_post.php?productId=<?php echo $result['id'];?>">
									<p><?php echo $result['brandName'];?></p>
									<img src="<?php echo $result['photos'];?>" alt="" />
									<h3><?php echo $result['productName'];?></h3>
									<p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['address'];?></p>
									<h5>৳ <?php echo $result['price'];?></h5>
								</a>




                    <?php       }
                            }else if($getElectProBySearchByUser){ 

                                while($result = $getElectProBySearchByUser->fetch_assoc()){ ?>

								<a class="signle_view_post" href="view_single_post.php?electId=<?php echo $result['electId'];?>">
									<p><?php echo $result['brandName'];?></p>
									<img src="<?php echo $result['image'];?>" alt="" />
									<h3><?php echo $result['post_title'];?></h3>
									<p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['thanaName'].", ".$result['districtName'];?></p>
									<h5>৳ <?php echo $result['price'];?></h5>
								</a>

                    <?php       } 
                			}else{ ?>
								<h3 class="text-center text-danger"><?php echo "Product Not Found";?></h3>
                    <?php        }
                        }else{ 
                        	$getAllProducts = $pd->getAllProduct();
								if($getAllProducts){
									while($result = $getAllProducts->fetch_assoc()){ ?>

				
								<a class="signle_view_post" href="view_single_post.php?productId=<?php echo $result['id'];?>">
									<p><?php echo $result['brandName'];?></p>
									<img src="<?php echo $result['photos'];?>" alt="" />
									<h3><?php echo $result['productName'];?></h3>
									<p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['thanaName'].", ".$result['districtName'];?></p>
									<h5>৳ <?php echo $result['price'];?></h5>
								</a>
                    <?php }}                    	
                        $getAll_EC_Products = $ec->getAllProduct();
                    	if($getAll_EC_Products){
                    		while($result = $getAll_EC_Products->fetch_assoc()){ ?>
				
								<a class="signle_view_post" href="view_single_post.php?electId=<?php echo $result['electId'];?>">
									<p><?php echo $result['brandName'];?></p>
									<img src="<?php echo $result['image'];?>" alt="" />
									<h3><?php echo $result['post_title'];?></h3>
									<p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['thanaName'];?></p>
									<h5>৳ <?php echo $result['price'];?></h5>
								</a>
                    <?php }
                    	}

                	} ?>

				</div>
				<div class="col-lg-3">
					<?php require_once ("brand.php");?>
				</div>
			</div>
		</div>
	</section>	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<?php require_once ("inc/footer.php");?>
