<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>

<?php    //for deleting category here
    if(isset($_GET['catDeleteId'])){
        $DeleteId = $_GET['catDeleteId'];
        $DeleteCat = $cat->delCatById($DeleteId);
    }
?>

<script>
function delete_id(ruhul)
{
     if(confirm('Sure To Remove This Record?'))
     {
        window.location.href='category_list.php?delete_id='+ruhul;
     }
}

</script>

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
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Category List</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead class="text-danger">
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
                                                    <a class="btn btn-danger" href="javascript:delete_id(<?php echo $categories['categoryId']; ?>)">Delete</a>
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
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<?php include_once "footer.php"; ?>