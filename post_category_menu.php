<?php require_once ("inc/header.php"); ?>

<?php
	if(empty($googleId)){
		header('Location: login.php ');
	}
?>

	
	
	
<section class="add_post_area">
	<div class="container add_post">
		<h2 class="text-center">আপনার পণ্যের বিজ্ঞাপনের জন্য মেনু সিলেক্ট করুনঃ-</h2>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="categoryMenu">
					<ul>
						<li><a href="car_add_post.php">Car and Bike Add Post</a></li>
						<li><a href="electronics_add_post.php">Electronics Add Post</a></li>
					</ul>
				</div>
			</div>
		</div>

	</div>
</section>
		
		
