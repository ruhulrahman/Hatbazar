<?php require_once ("inc/header.php"); ?>

<?php
	if(empty($googleId)){
		header('Location: login.php ');
	}
?>

<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //All fields are getting by global variable $_POST and $_FILES
        $insertProduct = $pd->ProductInsert($_POST, $_FILES);
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

				<input type="hidden" name="userId" value="<?php echo $user_id;?>"/>
		  <div class="row">

			<div class="col-md-3 mb-3">
			  <label for="validationServer01">পণ্যের ক্যাটাগরিঃ</label>
				<select name="categoryId" class="form-control" id="sel1">				        	
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
			<div class="col-md-3 mb-3">
			  <label for="validationServer01">পণ্যের নামঃ</label>
			  <input type="text" name="productName" class="form-control is-valid" id="validationServer01" required>
			</div>
		  </div>

		  	<div class="row">
				<div class="col-md-2 mb-2">
				<h4>কন্ডিশন</h4>
				  <label for="used">নতুনঃ</label>
				  <input id="used" type="radio" name="p_condition" value="1">

				  <label for="new">ব্যবহৃতঃ</label>
				  <input id="new" type="radio" name="p_condition" value="2">
				</div>
			</div>
		  <div class="row">
		  	<div class="col-md-2 mb-2">
				<label for="file">ছবি আপলোডঃ</label>
				<input type="file" name="image" id="file" />
			</div>
		  </div>
		  <div class="row">
			<div class="col-md-3 mb-3">
			  <label for="validationServer03">মোবাইলঃ</label>
			  <input type="text" name="mobile" class="form-control is-valid" id="validationServer03" required>
			</div>
			<div class="col-md-2 mb-2">
			  <label for="validationServer03">টাকাঃ</label>
			  <input type="text" name="price" class="form-control is-valid" id="validationServer03" required>
			</div>
			<div class="col-md-2 mb-2">
			  <label for="validationServer03">মডেল ইয়ারঃ</label>
			  <input type="text" name="modelYear" class="form-control is-valid" id="validationServer03" required>
			</div>
		  </div>
		  <div class="row">
			<div class="col-md-2 mb-2">
			  <label for="validationServer03">ট্রান্সমিশনঃ</label>
			  <input type="text" name="transmission" class="form-control is-valid" id="validationServer03" required>
			</div>	
			<div class="col-md-2 mb-2">
			  <label for="validationServer03">মডেলের নামঃ</label>
			  <input type="text" name="modelName" class="form-control is-valid" id="validationServer03" required>
			</div>		
			<div class="col-md-2 mb-2">
			  <label for="validationServer03">বডি টাইপঃ</label>
			  <input type="text" name="bodyType" class="form-control is-valid" id="validationServer03" required>
			</div>			
			<div class="col-md-2 mb-2">
			  <label for="validationServer03">ফুয়েল টাইপঃ</label>
			  <input type="text" name="fuelType" class="form-control is-valid" id="validationServer03" required>
			</div>				
			<div class="col-md-2 mb-2">
			  <label for="validationServer03">ইঞ্জিন ক্ষমতাঃ</label>
			  <input type="text" name="engineCapacity" class="form-control is-valid" placeholder="Enter CC" id="validationServer03" required>
			</div>				
			<div class="col-md-2 mb-2">
			  <label for="validationServer03">মাইলেজঃ</label>
			  <input type="text" name="myles" class="form-control is-valid" id="validationServer03" required>
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
		
