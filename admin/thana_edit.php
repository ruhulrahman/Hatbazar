<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>
<?php 

    //for deleting Thana here
    if(isset($_GET['thanaEditId'])){
        $thanaEditId = $_GET['thanaEditId'];
        $getThana = $lcn->getThanaById($thanaEditId);
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //All fields are getting by global variable $_POST and $_FILES
        $divId = $_POST['divisionId'];
        $disId = $_POST['districtId'];
        $ThanaName = $_POST['ThanaName'];
        $UpdateThana = $lcn->thanaUpdate($ThanaName, $disId, $divId, $thanaEditId);
    }
?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-3">
                        <h2 class="page-header">
                            Thana Section
                        </h2>
                    </div>
                    <div class="col-lg-8">
                        <h2 class="page-header">
                            <a class="btn btn-success" href="thana_insert.php">Add new Thana</a>
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3">
                         <div class="block text-center">
                            <?php
                                if(isset($UpdateThana)){
                                    echo $UpdateThana;
                                }
                            ?>
                        </div>
                        <form role="form" method="post" action="">							
                            <div class="form-group">
                            <?php
                                if(isset($getThana)){
                                    while ($result = $getThana->fetch_assoc()) { ?>
                                <label>Select Division</label>
                                <select name="divisionId" class="form-control" id="sel1">                           
                                    <option hidden selected>---Select Division---</option>
                                    <?php 
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


                                <label>Select District</label>
                                <select name="districtId" class="form-control" id="sel1">                           
                                    <option hidden selected>---Select District---</option>
                                    <?php 
                                        $getAllDistrict = $lcn->getAllDistrict();
                                        if($getAllDistrict){
                                            while ($distrcts = $getAllDistrict->fetch_assoc()) { ?>

                                     <option                                        
                                          <?php if($result['disId'] == $distrcts['disId']){ ?>
                                            selected = "selected";
                                        <?php } ?>
                                     value="<?php echo $distrcts['disId'];?>" ><?php echo $distrcts['districtName'];?></option>
                                        <?php } } ?>
                                </select>


                                <label>Edit Thana Name</label>
                                <input class="form-control" name="ThanaName" value="<?php echo $result['thanaName'];?>" placeholder="Enter a Thana name" />

                               <?php } } ?>
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
                                                    <a class="btn btn-primary" href="thana_edit.php?thanaEditId=<?php echo $result['thanaId'];?>">Edit</a>
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