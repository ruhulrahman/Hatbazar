<?php
    include_once("../lib/Session.php");
    

    include_once("../helpers/Format.php");
    include_once("../lib/Database.php");

    spl_autoload_register(function($class_name){
        include_once "../classes/".$class_name.".php";
    });

    $db = new Database();
    $fm = new Format();
    $cat = new Category();
    $brand = new Brand();
    $pd = new Product();
    $user = new Users();
    $lcn = new Location();
    $st = new Site();









//=====================Location List From here=======================================
//===================================================================================



if(isset($_GET['dvsnId'])){
	$divId = $_GET['dvsnId'];
	$all_dist = $lcn->getAllDistrict();

    if($all_dist){
    	echo '<option hidden selected>Select District</option>';

	    while ($dist = $all_dist->fetch_assoc()) {
	    	if($divId == $dist['divId']){
	    		echo '<option value="'.$dist["disId"].'">'.$dist["districtName"].'</option>';
	    	}
  		}  
	}
}else if(isset($_GET['disId'])){
	$disId = $_GET['disId'];
	$all_thana = $lcn->getAllThana();

    if($all_thana){
    	$i=0;
	    while ($thana = $all_thana->fetch_assoc()) {
	    	if($disId == $thana['disId']){	    		
		    	$i++; 
				if($i >= 1){ ?>
	                <tr>
	                    <td class="text-center"><?php echo $i;?>.</td>
	                    <td><?php echo $thana['thanaName'].", ".$thana['districtName'].", ".$thana['divisionName'];?></td>
	                    <td class="text-center">
	                        <a class="btn btn-primary" href="Thana_edit.php?thanaEditId=<?php echo $thana['thanaId'];?>">Edit</a> || 
	                        <a class="btn btn-danger" href="?thanaDeleteId=<?php echo $thana['thanaId'];?>">Delete</a>
	                    </td>
	                </tr>

		    	<?php	
				}else{ ?>
					<tr>
						<td colspan="3" class="error"><?php echo "Thana not Found!!!";?></td>
					</tr>
				<?php }
	    	}
  		}  
	}
}

















?>