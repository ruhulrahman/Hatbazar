<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>
<?php 

    //for deleting Thana here
    if(isset($_GET['thanaDeleteId'])){
        $thanaId = $_GET['thanaDeleteId'];
        $DeleteThana = $lcn->delThanaById($thanaId);
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //All fields are getting by global variable $_POST and $_FILES
        $divId = $_POST['divisionId'];
        $disId = $_POST['districtId'];
        $ThanaName = $_POST['ThanaName'];
        $insertThana = $lcn->thanaInsert($ThanaName, $disId, $divId);
    }
?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-4">
                        <h2 class="page-header">
							Thana Section
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3">
                         <div class="block text-center">
                            <?php
                                if(isset($insertThana)){
                                    echo $insertThana;
                                }
                            ?>
                        </div>
                        <form role="form" method="post" action="">							
                            <div class="form-group">
                                <label>Select Division</label>
                                <select name="divisionId" class="form-control" class="form-control" id="division" onchange="ajaxGET('district','location_manage.php?dvsnId='+this.value)">                           
                                    <option hidden selected>---Select Division---</option>
                                    <?php
                                        $divisions = $lcn->getAllDivision();
                                        if($divisions){
                                            while ($result = $divisions->fetch_assoc()) { ?>
                                     <option value="<?php echo $result['divId'];?>"><?php echo $result['divisionName'];?></option>
                                    <?php } } ?>
                                </select>


                                <label>Select District</label>
                                <select  name="districtId" id="district" class="form-control" onchange="ajaxGET('thana','location_manage.php?disId='+this.value)">
                                    <option selected="selected" disabled="disabled">---Select District---</option>
                                </select> 


                                <label>Add new Thana</label>
                                <input class="form-control" name="ThanaName" placeholder="Enter a Thana name" />
                            </div>
                            <button type="submit" class="btn btn-success">Save Thana</button>
                        </form>
                    </div>
        
                    <div class="col-lg-9">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Thana List</h3>
                            </div>
                            <div class="block text-center">
                                <?php
                                    if(isset($DeleteThana)){
                                        echo $DeleteThana;
                                    }
                                ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead class="text-danger">
                                            <tr>
                                                <th>Serial</th>
                                                <th>Thana, District, Division Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $allThana = $lcn->getAllThana();
                                                $i = 0;
                                                if($allThana){
                                                while($result = $allThana->fetch_assoc()){ 
                                                    $i++;
                                                    ?>
                                                
                                            <tr>
                                                <td class="text-center"><?php echo $i;?>.</td>
                                                <td><?php echo $result['thanaName'].", ".$result['districtName'].", ".$result['divisionName'];?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="thana_edit.php?thanaEditId=<?php echo $result['thanaId'];?>">Edit</a> || 
                                                    <a class="btn btn-danger" href="?thanaDeleteId=<?php echo $result['thanaId'];?>">Delete</a>
                                                </td>
                                            </tr>

                                            <?php } }else{ ?>
                                            <tr>
                                                <td colspan="4"><h3 class='text-center text-danger'>Thana Not Found</h3></td>
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