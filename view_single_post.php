<?php require_once ("inc/header.php");?>
	
<?php
global $productId;
	if(!isset($_GET['productId']) || $_GET['productId'] == NULL){
		echo "<script>window.location=404.php;</script>";
	}else{
		$productId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['productId']);
	}

	
	if(!isset($_GET['electId']) || $_GET['electId'] == NULL){
		echo "<script>window.location=404.php;</script>";
	}else{
		$electId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['electId']);
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
						if(isset($productId)){
						$getProdById = $pd->getProductById($productId);
						while($result = $getProdById->fetch_assoc()){ ?>

									
					<div class="view_single_by_order">
						<div class="pull-left product_details">
							<h3><?php echo $result['productName'];?></h3>
							<p><?php echo $fm->formatDate($result['time']);?> ||  <?php echo $result['thanaName'].", ".$result['districtName'];?></p>					
							<img src="<?php echo $result['photos'];?>" alt="" />
							<h5><span>৳ <?php echo $result['price'];?></span></h5>
							<h6>Description: </h6>
							<ul>
								<li><b>ব্র্যান্ড: </b><?php echo $result['brandName'];?></li>
								<li><b>মডেল ইয়ার: </b><?php echo $result['modelYear'];?></li>

								<li><b>কন্ডিশন: </b><?php 
									if($result['p_condition'] == 1){
										echo "নতুন";
									}else{
										echo "ব্যবহৃত";
									}
									?></li>

								<li><b>ট্রান্সমিশন: </b><?php echo $result['transmission'];?></li>
								<li><b>মডেলের নাম: </b><?php echo $result['modelName'];?></li>
								<li><b>বডি টাইপ: </b><?php echo $result['bodyType'];?></li>
								<li><b>ফুয়েল টাইপ: </b><?php echo $result['fuelType'];?></li>
								<li><b>ইঞ্জিন ক্ষমতা: </b><?php echo $result['engineCapacity'];?> সিসি</li>
								<li><b>মাইলেজ: </b><?php echo $result['myles'];?> কিমি</li>
							</ul>
						</div>
						<div class="pull-right contact_address">
							<h6>বিজ্ঞাপন দাতার নামঃ <?php echo $result['first_name']." ".$result['last_name'];?></h6>
							<p><i class="fa fa-phone"></i> <?php echo $result['mobile'];?></p>
						</div>
					</div>
					<?php }} ?>

					<?php
						if(isset($electId)){
						$getElectProdById = $ec->getElectProductById($electId);
						while($result = $getElectProdById->fetch_assoc()){ ?>

									
					<div class="view_single_by_order">
						<div class="pull-left product_details">
							<h3><?php echo $result['post_title'];?></h3>
							<p><?php echo $fm->formatDate($result['time']);?> ||  <?php echo $result['thanaName'].', '.$result['districtName'];?></p>					
							<img src="<?php echo $result['image'];?>" alt="" />
							<h5><span>৳ <?php echo $result['price'];?></span></h5>
							<h6>Description: </h6>
							<ul>
								<li>
									<b>কন্ডিশন: </b><?php 
										if($result['conditionId'] == 1){
											echo "New";
										}else{
											echo "Used";
										}
										?>
								</li>

								<li><b>ব্র্যান্ড: </b><?php echo $result['brandName'];?></li>
								<li><b>বিস্তারিত: </b><?php echo $result['post_desc'];?></li>
							</ul>
						</div>
						<div class="pull-right contact_address">
							<h6>বিজ্ঞাপন দাতার নামঃ <?php echo $result['first_name']." ".$result['last_name'];?></h6>
							<p><i class="fa fa-phone"></i> <?php echo $result['mobile'];?></p>
						</div>
					</div>
					<?php }} ?>
				</div>
			</div>
		</div>
	</section>	
		
		
		
		
<?php require_once ("inc/footer.php");?>
