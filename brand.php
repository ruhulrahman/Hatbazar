					<div class="listofclass">
						<ul>
							<li class="text-center text-white" style="padding:15px 0px; background: #004d66; border-radius: 0px 45px 0px 0px;">Product Brand</li>
							<li><a href="view_posts.php">All Brand Post</a></li>
							<?php
								$allBrand = $brand->getAllbrand();
								while ($brand = $allBrand->fetch_assoc()) { ?>
							
								<li><a href="view_post_by_brand.php?brandId=<?php echo $brand['brandId'];?>"> <?php echo $brand['brandName'];?> </a></li>
							<?php }	?>
						</ul>
					</div>
