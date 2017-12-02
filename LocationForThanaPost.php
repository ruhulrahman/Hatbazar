<?php
    include_once("lib/Session.php");
    

    include_once("helpers/Format.php");
    include_once("lib/Database.php");

    spl_autoload_register(function($class_name){
        include_once "classes/".$class_name.".php";
    });

    $db = new Database();
    $fm = new Format();
    $cat = new Category();
    $brand = new Brand();
    $pd = new Product();
    $user = new Users();
    $lcn = new Location();
    $st = new Site();
    $ec = new Electronics();


//=====================View Post By Location in index.php page=======================================
//===================================================================================

if(isset($_GET['divisionId_for_viewpost_indexpage'])){
    $divId = $_GET['divisionId_for_viewpost_indexpage'];
    $getAllCarProByDivision = $pd->getAllCarProByDivision($divId);

    $getAllElectProByDiv = $ec->getAllElectProByDiv($divId);

    if($getAllElectProByDiv || $getAllCarProByDivision){

    if($getAllCarProByDivision){
        while($result = $getAllCarProByDivision->fetch_assoc()){ ?>
        <a class="signle_view_post" href="view_single_post.php?productId=<?php echo $result['id'];?>">
            <p><?php echo $result['brandName'];?></p>
            <img src="<?php echo $result['photos'];?>" alt="" />
            <h3><?php echo $result['productName'];?></h3>
            <p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['thanaName'].",".$result['districtName'];?></p>
            <h5>৳ <?php echo $result['price'];?></h5>
        </a>
<?php } } ?>

<?php 
    if($getAllElectProByDiv){
        while($result = $getAllElectProByDiv->fetch_assoc()){ ?>


<a class="signle_view_post" href="view_single_post.php?electId=<?php echo $result['electId'];?>">
    <p><?php echo $result['brandName'];?></p>
    <img src="<?php echo $result['image'];?>" alt="" />
    <h3><?php echo $result['post_title'];?></h3>
    <p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['thanaName'];?></p>
    <h5>৳ <?php echo $result['price'];?></h5>
</a>
<?php } 
    }
}else{
    echo "<h3 class='text-center' style='color:red'>Product not found by Division.</h3>";
} 
}







//=====================View Post By Location in index.php page=======================================
//===================================================================================

if(isset($_GET['dvsnId_for_viewpost_indexpage'])){
    $divId = $_GET['dvsnId_for_viewpost_indexpage'];
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
                    echo '<option value="'.$thana["thanaId"].'">'.$thana["thanaName"].'</option>';
                }
            }  
        }
    }else if(isset($_GET['thanaId'])){
        $thanaId = $_GET['thanaId'];
        $getElectPostBythanaId = $ec->getAllElectProByThana($thanaId);
        $getAllCarProByThana = $pd->getAllCarProByThana($thanaId);


        if($getElectPostBythanaId || $getAllCarProByThana){
            if($getElectPostBythanaId){
                while ($result = $getElectPostBythanaId->fetch_assoc()) { ?>
                    <a class="signle_view_post" href="view_single_post.php?electId=<?php echo $result['electId'];?>">         
                        <p><?php echo $result['brandName'];?></p>
                        <img src="<?php echo $result['image'];?>" alt="" />
                        <h3><?php echo $result['post_title'];?></h3>
                        <p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['thanaName'].", ".$result['thanaName'];?></p>
                        <h5>৳ <?php echo $result['price'];?></h5>
                    </a>   
            <?php    }  
            }


            if($getAllCarProByThana){
                while ($result = $getAllCarProByThana->fetch_assoc()) { ?>    
                    <a class="signle_view_post" href="view_single_post.php?productId=<?php echo $result['id'];?>"> 
                        <p><?php echo $result['brandName'];?></p>
                        <img src="<?php echo $result['photos'];?>" alt="" />
                        <h3><?php echo $result['productName'];?></h3>
                        <p>Time: <?php echo $fm->formatDate($result['time']);?> || <?php echo $result['thanaName'];?></p>
                        <h5>৳ <?php echo $result['price'];?></h5>
                    </a>   
            <?php    }  
            }
        }else{
            echo "<h3 class='text-center' style='color:red'>Product not found by Thana.</h3>";
        } 
    }


















?>