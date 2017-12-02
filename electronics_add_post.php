<?php require_once ("inc/header.php"); ?>

<?php
	if(empty($googleId)){
		header('Location: login.php ');
	}
?>

<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //All fields are getting by global variable $_POST and $_FILES
        $insertProduct = $ec->ProductInsert($_POST, $_FILES);
    }
?>
	
	
	
<section class="add_post_area">
	<div class="container add_post">
		<h2 class="text-center">আপনার পণ্যের বিজ্ঞাপনের জন্য ফরমটি পূরণ করুনঃ-</h2>
		<div class="block text-center">
			<?php
				if(isset($insertProduct)){
					echo $insertProduct;
				}
			?>
		</div>
		<form method="post" action="" enctype="multipart/form-data">

			<input type="hidden" name="userId" value="<?php echo $id;?>"/>

		  <div class="row">
			<div class="col-md-3 mb-3">
			  <label for="proCat">পণ্যের ক্যাটাগরিঃ</label>
				<select name="categoryId" class="form-control" id="proCat">				        	
					<option>Select Category</option>
					<?php
						$categories = $cat->getAllCat();
						if($categories){
							while ($result = $categories->fetch_assoc()) { ?>
					 <option value="<?php echo $result['categoryId'];?>"><?php echo $result['categoryName'];?></option>
					<?php } } ?>
			  	</select>
			</div>
			<div class="col-md-3 mb-3">
			  <label for="proBnd">ব্রান্ডঃ</label>
				<select name="brandId" class="form-control" id="proBnd">				        	
					<option>Select Brand</option>
					<?php
						$brands = $brand->getAllbrand();
						if($brands){
							while ($result = $brands->fetch_assoc()) { ?>
					 <option value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></option>
					<?php } } ?>
			  	</select>
			</div>
		  </div>
		  <div class="row">
			<div class="col-md-3 mb-3">
			<h4>কন্ডিশন</h4>
			  <label for="used">নতুনঃ</label>
			  <input id="used" type="radio" name="conditionId" value="1">

			  <label for="new">ব্যবহৃতঃ</label>
			  <input id="new" type="radio" name="conditionId" value="2">
			</div>
			<div class="col-md-3 mb-3">
			  <label for="mobile">আপনার মোবাইল নম্বরঃ</label>
			  <input type="text" name="mobile" class="form-control is-valid" id="mobile" required>
			</div>
		  </div>
		  <div class="row">
			<div class="col-md-6 mb-3">				
			  <label for="proName">পণ্যের নামঃ</label>
			  <input type="text" name="post_title" class="form-control is-valid" id="proName" required>
			</div>
		  </div>
		  <div class="row">
		  	
			<div class="col-md-2 mb-2">
			  <label for="description">পণ্যের বিবরণ</label>
			  <textarea name="post_desc" cols="56" rows="3" id="description" placeholder="Enter description......" required></textarea>
			</div>
		  </div>
		  <div class="row">
		  	
			
		  
			<div class="col-md-2 mb-2">
			  <label for="tk">টাকাঃ</label>
			  <input type="number" name="price" class="form-control is-valid" id="tk" required>
			</div>
		  </div>
		  <div class="row">
		  	<div class="col-md-3 mb-3">
				<div class="form-group">
					<label>Select Location</label>
					<select name="divisionId" class="form-control" id="division" onchange="ajaxGET('district','place.php?dvsnId='+this.value)">                           
						<option hidden selected>---Select Division---</option>
						<?php
							$divisions = $lcn->getAllDivision();
							if($divisions){
								while ($division = $divisions->fetch_assoc()) { ?>
						 <option value="<?php echo $division['divId'];?>"><?php echo $division['divisionName'];?></option>
						<?php } } ?>
					</select>
					

					<select id="district" class="form-control" onchange="ajaxGET('thana','place.php?disId='+this.value)">
						<option selected="selected" disabled="disabled">---Select District---</option>
					</select> 
					
					<div class="tn">
						<select name="thanaId" id="thana" class="form-control">
							<option selected="selected" disabled="disabled">---Select Thana---</option>
						</select> 
					</div>
				</div>
			</div>
		  </div>
		  <div class="row">
		  	<div class="col-md-2 mb-2">
				<label for="file">ছবি আপলোডঃ</label>
				<input type="file" name="image" id="file" />
			</div>
		  </div>
		  <div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4 md-4">
				<button class="btn btn-success" id="submit_button" type="submit">Submit</button>
			</div>				  
			<div class="col-lg-4"></div>
		  </div>
		</form>

	</div>
</section>
		
<?php require_once ("inc/footer.php"); ?>	
		
