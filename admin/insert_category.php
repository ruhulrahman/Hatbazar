<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>
<?php 

    //for deleting category here
    if(isset($_GET['catDeleteId'])){
        $DeleteId = $_GET['catDeleteId'];
        $DeleteCat = $cat->delCatById($DeleteId);
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //All fields are getting by global variable $_POST and $_FILES
        $category = $_POST['category'];
        $insertCat = $cat->CatInsert($category);
    }
?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
							Category Section
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                         <div class="block text-center">
                            <?php
                                if(isset($insertCat)){
                                    echo $insertCat;
                                }
                            ?>
                        </div>
                        <form role="form" method="post" action="">							
                            <div class="form-group">
                                <label>Add new category</label>
                                <input class="form-control" name="category" placeholder="Enter a category name" value="">
                            </div>
                            <button type="submit" class="btn btn-success">Save Category</button>
                        </form>
                    </div>
        
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Category List</h3>
                            </div>                            
                            <div class="block text-center">
                                <?php
                                    if(isset($DeleteCat)){
                                        echo $DeleteCat;
                                    }
                                ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Category Id</th>
                                                <th>Category Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $allCategory = $cat->getAllCat();
                                                $i = 0;
                                                while ($categories = $allCategory->fetch_assoc()) { 
                                                    $i++;
                                                    ?>
                                                
                                            <tr>
                                                <td class="text-center"><?php echo $i;?>.</td>
                                                <td class="text-center"><?php echo $categories['categoryId'];?></td>
                                                <td><?php echo $categories['categoryName'];?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="edit_category.php?catEditId=<?php echo $categories['categoryId'];?>">Edit</a> || 
                                                    <a class="btn btn-danger" href="?catDeleteId=<?php echo $categories['categoryId'];?>">Delete</a>
                                                </td>
                                            </tr>

                                            <?php } ?>
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