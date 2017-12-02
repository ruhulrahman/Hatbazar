<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>

<?php    //for deleting category here
    if(isset($_GET['DeleteId'])){
        $DeleteId = $_GET['DeleteId'];
        $DeleteProduct = $pd->delUserPostById($DeleteId);
    }
?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            User Managing Section || Bike and Car Posts
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Bike and Car Post Lists</h3>
                            </div>
                            <div class="block text-center">
                                <?php
                                    if(isset($DeleteProduct)){
                                        echo $DeleteProduct;
                                    }
                                ?>
                                <?php
                                    global $productName;
                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                        $productName = $_POST['productName'];
                                        $getProductBySearch = $pd->getProductBySearch($productName);
                                    }
                                ?>
                            </div>
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    <tr>
                                        <th class="text-center">
                                            <form class="form-inline my-2 my-lg-0" action="" method="post">
                                              <input class="form-control mr-sm-6" style="width: 320px" type="text" placeholder="Search By Prodcut Name, category, brand" aria-label="Search" name="productName" value="<?php echo $productName; ?>">
                                              <button class="btn btn-primary my-2 my-sm-0" type="submit" name="submit" id="search_btn">Search</button>
                                            </form> 
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>PHotos</th>
                                                <th>Product Name</th>
                                                <th>Category Name</th>
                                                <th>Brand Name</th>
                                                <th>User Name</th>
                                                <th>User Picture</th>
                                                <th>User Auth. ID</th>
                                                <th>Address</th>
                                                <th>Price (TK)</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                        if(isset($getProductBySearch)){
                                            $getProductBySearch = $pd->getProductBySearch($productName);

                                            if($getProductBySearch){
                                                $i = 0;
                                                while($result = $getProductBySearch->fetch_assoc()){ 
                                                    $i++;
                                                    ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i;?>.</td>          
                                                <td class="text-center"><img width="50" height="50" src="../<?php echo $result['photos'];?>" alt=""></td>
                                                <td class="text-center"><?php echo $result['productName'];?></td>
                                                <td class="text-center"><?php echo $result['categoryName'];?></td>
                                                <td class="text-center"><?php echo $result['brandName'];?></td>
                                                <td class="text-center"><?php echo $result['first_name']." ".$result['last_name'];?></td>
                                                <td class="text-center"><img width="50" height="50" src="<?php echo $result['picture'];?>" alt=""></td>
                                                <td class="text-center"><?php echo $result['oauth_uid'];?></td>
                                                <td class="text-center"><?php echo $result['thanaName'].", ".$result['districtName'];?></td>
                                                <td class="text-center"><?php echo $result['price'];?></td>
                                                <td class="text-center"><?php echo $result['time'];?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="edit_user_post.php?PostId=<?php echo $result['id'];?>">Edit</a> ||
                                                    <a class="btn btn-danger" href="?DeleteId=<?php echo $result['id'];?>">Delete</a>
                                                </td>
                                            </tr>     

                                    <?php       }
                                            }
                                        }else{
                                                $getAllProducts = $pd->getAllProductWithUserId();
                                                $i = 0;
                                                if($getAllProducts){
                                                while ($result = $getAllProducts->fetch_assoc()) { 
                                                    $i++;
                                                    ?>
                                                
                                            <tr>
                                                <td class="text-center"><?php echo $i;?>.</td>          
                                                <td class="text-center"><img width="50" height="50" src="../<?php echo $result['photos'];?>" alt=""></td>
                                                <td class="text-center"><?php echo $result['productName'];?></td>
                                                <td class="text-center"><?php echo $result['categoryName'];?></td>
                                                <td class="text-center"><?php echo $result['brandName'];?></td>
                                                <td class="text-center"><?php echo $result['first_name']." ".$result['last_name'];?></td>
                                                <td class="text-center"><img width="50" height="50" src="<?php echo $result['picture'];?>" alt=""></td>
                                                <td class="text-center"><?php echo $result['oauth_uid'];?></td>
                                                <td class="text-center"><?php echo $result['thanaName'].", ".$result['districtName'];?></td>
                                                <td class="text-center"><?php echo $result['price'];?></td>
                                                <td class="text-center"><?php echo $result['time'];?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="edit_user_post.php?PostId=<?php echo $result['id'];?>">Edit</a> ||
                                                    <a class="btn btn-danger" href="?DeleteId=<?php echo $result['id'];?>">Delete</a>
                                                </td>
                                            </tr>

                                            <?php }}else{ ?>
                                            <tr>
                                                <td class="text-center text-danger" colspan="11"><h3><?php echo "Product Not Found";?></h3></td>
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<?php include_once "footer.php"; ?>