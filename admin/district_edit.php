<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>
<?php 

    //for deleting district here
    if(isset($_GET['districtEditId'])){
        $disId = $_GET['districtEditId'];
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //All fields are getting by global variable $_POST and $_FILES
        $divId = $_POST['divisionId'];
        $districtName = $_POST['districtName'];
        $UpdateDistrict = $lcn->districtUpdate($districtName, $divId, $disId);
    }
?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
							District Update Page
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3">
                         <div class="block text-center">
                            <?php
                                if(isset($UpdateDistrict)){
                                    echo $UpdateDistrict;
                                }
                            ?>
                        </div>
                        <form role="form" method="post" action="">							
                            <div class="form-group">
                                <label>Select Division</label>
                                <select name="divisionId" class="form-control" id="sel1">                           
                                    <option hidden selected>---Select Division---</option>

                                <?php
                                    $disById = $lcn->getDistrictById($disId);
                                    if($disById){
                                        while($result = $disById->fetch_assoc()){ 

                                        $Alldivision = $lcn->getAllDivision();
                                        if($Alldivision){
                                            while ($divisions = $Alldivision->fetch_assoc()) { ?>

                                     <option                                        
                                          <?php if($result['divId'] == $divisions['divId']){ ?>
                                            selected = "selected";
                                        <?php } ?>
                                     value="<?php echo $divisions['divId'];?>" ><?php echo $divisions['divisionName'];?></option>
                                        <?php } } ?>
                                </select>


                                <label>Edit District Name</label>
                                <input class="form-control" name="districtName" value="<?php echo $result['districtName'];?>" />
                                <?php } } ?>
                            </div>
                            <button type="submit" class="btn btn-success">Update District</button>
                        </form>
                    </div>
        
                    <div class="col-lg-9">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> District List</h3>
                            </div>
                            <div class="block text-center">
                                <?php
                                    if(isset($DeleteDistrict)){
                                        echo $DeleteDistrict;
                                    }
                                ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead class="text-danger">
                                            <tr>
                                                <th>Serial</th>
                                                <th>District with Division Name</th>
                                                <th>District Id</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $allDistrict = $lcn->getAllDistrict();
                                                $i = 0;
                                                if($allDistrict){
                                                while($result = $allDistrict->fetch_assoc()){ 
                                                    $i++;
                                                    ?>
                                                
                                            <tr>
                                                <td class="text-center"><?php echo $i;?>.</td>
                                                <td><?php echo $result['divisionName'].", ".$result['districtName'];?></td>
                                                <td class="text-center"><?php echo $result['disId'];?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="district_edit.php?districtEditId=<?php echo $result['disId'];?>">Edit</a>
                                                </td>
                                            </tr>

                                            <?php } }else{ ?>
                                            <tr>
                                                <td colspan="4"><h3 class='text-center text-danger'>District Not Found</h3></td>
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