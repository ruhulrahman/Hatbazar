<?php require_once ("inc/header.php");?>

<?php
	if(!isset($_GET['divId']) || $_GET['divId'] == NULL){
		echo "<script>window.location=404.php;</script>";
	}else{
		$divId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['divId']);
	}
?>
		
	<section class="viewpost_area">
		<div class="container viewpost">
			<div class="row">
				<div class="col-lg-3">
					<div class="division">
						<h4>বিভাগীয় শহর অনুযায়ী বিজ্ঞাপন দেখুন</h4>
						<hr />
						<div class="form-group">
							<select name="divisionId" class="form-control" id="division" onchange="ajaxGET('DivisionWiseViewPost','LocationForThanaPost.php?divisionId_for_viewpost_indexpage='+this.value)">                           
								<option hidden selected>---Select Division---</option>
								<?php
									$divisions = $lcn->getAllDivision();
									if($divisions){
										while ($division = $divisions->fetch_assoc()) { ?>
								 <option value="<?php echo $division['divId'];?>"><?php echo $division['divisionName'];?></option>
								<?php } } ?>
							</select>
						</div>
					</div>
				</div>	
				<div class="col-lg-6">
					<div id="DivisionWiseViewPost"></div>					
					<div id="viewAllPostByThana"></div>					


				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label>Select Location To View Add</label>
						<select name="divisionId" class="form-control" id="division" onchange="ajaxGET('district','place.php?dvsnId_for_viewpost='+this.value)">                           
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
							<select id="thana" class="form-control" onchange="ajaxGET('viewAllPostByThana','place.php?thanaId='+this.value)">
								<option selected="selected" disabled="disabled">---Select Thana---</option>
							</select> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
		
		
<?php require_once ("inc/footer.php");?>
