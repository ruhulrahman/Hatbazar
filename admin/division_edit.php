<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>
<?php 
    //for editing division here
    if(!isset($_GET['DivisionEditId']) || $_GET['DivisionEditId'] == NULL){
        echo "<script>window.location=404.php;</script>";
    }else{
        $EditId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['DivisionEditId']);
    }


    //for editing Division here
    if(isset($_GET['catDeleteId'])){
        $deleteId = $_GET['catDeleteId'];
        $DeleteMsg = $cat->delCatById($deleteId);

    }




    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //All fields are getting by global variable $_POST and $_FILES
        $divisionName = $_POST['divisionName'];
        $UpdateDivisionName = $lcn->divisionNameUpdate($divisionName, $EditId);
    }
?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
							Division Section
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-block">
                            <?php
                                if(isset($UpdateDivisionName)){
                                    echo $UpdateDivisionName;
                                }


                                if(isset($$DeleteMsg)){
                                    echo $$DeleteMsg;
                                }
                            ?>
                        </div>
                        <form role="form" method="post" action="">							
                            <div class="form-group">
                            <?php
                                 $DivisionById = $lcn->getDivisionById($EditId);
                                 while($result = $DivisionById->fetch_assoc()){ 
                                    $divisionName = $result['divisionName'];
                                 }
                            ?>    
                               
                                <label>Edit Division</label>
                                <input class="form-control" name="divisionName" placeholder="Enter a Division name" value="<?php echo $divisionName; ?>">
                            </div>
                            <button type="submit" class="btn btn-success">Update Division</button>
                        </form>
                    </div>
        
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Division List</h3>
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
                                                <th>Division Id</th>
                                                <th>Division Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $allDivision = $lcn->getAllDivision();
                                                $i = 0;
                                                if($allDivision){
                                                while($result = $allDivision->fetch_assoc()){ 
                                                    $i++;
                                                    ?>
                                                
                                            <tr>
                                                <td class="text-center"><?php echo $i;?>.</td>
                                                <td class="text-center"><?php echo $result['divId'];?></td>
                                                <td><?php echo $result['divisionName'];?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="division_edit.php?DivisionEditId=<?php echo $result['divId'];?>">Edit</a>
                                                </td>
                                            </tr>

                                            <?php } }else{ ?>
                                            <tr>
                                                <td colspan="4"><h3 class='text-center text-danger'>Division Not Found</h3></td>
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