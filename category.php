					<div class="listofclass">

						<ul>
							<li class="text-center text-white" style="padding:15px 0px; background: #004d66; border-radius: 0px 45px 0px 0px;">Product Category</li>
							<li><a href="view_posts.php">All Category Post</a></li>
							<?php
								$allCategory = $cat->getAllCat();
								while ($categories = $allCategory->fetch_assoc()) { ?>
							
								<li><a href="view_post_by_cat.php?catId=<?php echo $categories['categoryId'];?>"> <?php echo $categories['categoryName'];?> </a></li>
							<?php }	?>
						</ul>
					</div>
