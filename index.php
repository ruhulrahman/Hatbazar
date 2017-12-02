<?php
	include_once "inc/header.php";
?>
	
	
	<section class="Left_menu_area">
		<div class="container viewpost">
			<div class="row">
				<div class="col-lg-3">
					
					<br />
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
					<br />
					<hr />
					<hr />
					<hr />
					<br />
					<div class="town">
						<h4>শহর ও থানা অনুযায়ী বিজ্ঞাপন দেখুন</h4>
						<div class="form-group">
							<select name="divisionId" class="form-control" id="division" onchange="ajaxGET('district','LocationForThanaPost.php?dvsnId_for_viewpost_indexpage='+this.value)">                           
								<option hidden selected>---Select Division---</option>
								<?php
									$divisions = $lcn->getAllDivision();
									if($divisions){
										while ($division = $divisions->fetch_assoc()) { ?>
								 <option value="<?php echo $division['divId'];?>"><?php echo $division['divisionName'];?></option>
								<?php } } ?>
							</select>
							

							<select id="district" class="form-control" onchange="ajaxGET('thana','LocationForThanaPost.php?disId='+this.value)">
								<option selected="selected" disabled="disabled">---Select District---</option>
							</select> 
							
							<div class="tn">
								<select id="thana" class="form-control" onchange="ajaxGET('viewAllPostByThana','LocationForThanaPost.php?thanaId='+this.value)">
									<option selected="selected" disabled="disabled">---Select Thana---</option>
								</select> 
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<div id="DivisionWiseViewPost"></div>
					<div id="viewAllPostByThana"></div>

					<div id="indexPage">
						<div class="row top_heading">
							<h1>........................com-এ স্বাগতম। বাংলাদেশের সবচেয়ে বড় অনলাইন বিক্রয় কেন্দ্র!</h1>
							<p>বাংলাদেশ -এ ব্যবহৃত গাড়ি থেকে শুরু করে মোবাইল ফোন ও কম্পিউটারসহ সবকিছুই কেনাবেচা করুন বা প্রপার্টি, চাকুরি এবং আরও অনেক কিছু খুঁজে নিন - বিনামূল্যে!</p>
						</div>
						<div class="row home_product">
							<div class="col-lg-6 text-center">						
								<div class="single">
									<p><a href="car.php"><i class="fa fa-car fa-5x" aria-hidden="true"></i></a></p>
									<a href="car.php">গাড়িসমূহ</a>
								</div>							
							</div>
							<div class="col-lg-6 text-center">
								<div class="single">
									<p><a href="bike.php"><i class="fa fa-motorcycle fa-5x" aria-hidden="true"></i></a></p>
									<a href="bike.php">মোটর সাইকেল ও সাইকেল</a>
								</div>
							</div>
							
							
							<div class="col-lg-6 text-center">						
								<div class="single">
									<p><a href="house.php"><i class="fa fa-home fa-5x" aria-hidden="true"></i></a></p>
									<a href="house.php">বাড়িঘর ও সম্পদ</a>
								</div>							
							</div>
							<div class="col-lg-6 text-center">
								<div class="single">
									<p><a href=""><i class="fa fa-wrench fa-5x" aria-hidden="true"></i></a></p>
									<a href="">ইলেক্ট্রিকাল এন্ড ইলেক্ট্রনিক্স</a>
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
