<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>
<?php 

    //for deleting category here
    if(isset($_GET['catDeleteId'])){
        $DeleteId = $_GET['catDeleteId'];
        $DeleteCat = $cat->delCatById($DeleteId);
    }


    if(isset($_GET['brandDeleteId'])){
        $brandId = $_GET['brandDeleteId'];
        $DeleteBrand = $brand->delbrandById($brandId);
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //All fields are getting by global variable $_POST and $_FILES
        $brandName = $_POST['brandName'];
        $insertBrand = $brand->brandInsert($brandName);
    }
?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
							Brand Section
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                         <div class="block text-center">
                            <?php
                                if(isset($insertBrand)){
                                    echo $insertBrand;
                                }
                            ?>
                        </div>
                        <form role="form" method="post" action="">							
                            <div class="form-group">
                                <label>Add new brand</label>
                                <input class="form-control" name="brandName" placeholder="Enter a brand name" />
                            </div>
                            <button type="submit" class="btn btn-success">Save Brand</button>
                        </form>
                    </div>
        
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Brand List</h3>
                            </div>
                            <div class="block text-center">
                                <?php
                                    if(isset($DeleteBrand)){
                                        echo $DeleteBrand;
                                    }
                                ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead class="text-danger">
                                            <tr>
                                                <th>Serial</th>
                                                <th>Brand Id</th>
                                                <th>Brand Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $allbrand = $brand->getAllbrand();
                                                $i = 0;
                                                if($allbrand){
                                                while($result = $allbrand->fetch_assoc()){ 
                                                    $i++;
                                                    ?>
                                                
                                            <tr>
                                                <td class="text-center"><?php echo $i;?>.</td>
                                                <td class="text-center"><?php echo $result['brandId'];?></td>
                                                <td><?php echo $result['brandName'];?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="brand_edit.php?brandEditId=<?php echo $result['brandId'];?>">Edit</a> || 
                                                    <a class="btn btn-danger" href="?brandDeleteId=<?php echo $result['brandId'];?>">Delete</a>
                                                </td>
                                            </tr>

                                            <?php } }else{
                                                echo "<h3 class='text-center text-danger'>Brand Not Found</h3>";
                                            } ?>
                                        </tbody>
                                    </table>
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