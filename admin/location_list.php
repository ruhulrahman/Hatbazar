<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>
<?php 

    //for deleting Thana here
    if(isset($_GET['thanaDeleteId'])){
        $ThanaId = $_GET['thanaDeleteId'];
        $DeleteThana = $lcn->delThanaById($ThanaId);

    }



?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
							Thana Section
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3">
                         <div class="block text-center">

                        </div>



                        <div class="form-group">
                            <label>Select Division to show District</label>
                            <select name="divisionId" class="form-control" id="division" onchange="ajaxGET('district','location_manage.php?dvsnId='+this.value)">                           
                                <option hidden selected>---Select Division---</option>
                                <?php
                                    $divisions = $lcn->getAllDivision();
                                    if($divisions){
                                        while ($division = $divisions->fetch_assoc()) { ?>
                                 <option value="<?php echo $division['divId'];?>"><?php echo $division['divisionName'];?></option>
                                <?php } } ?>
                            </select>
                            

                            <label>Select District to show Thana</label>
                            <select id="district" class="form-control" onchange="ajaxGET('thana','location_manage.php?disId='+this.value)">
                                <option selected="selected" disabled="disabled">---Select District---</option>
                            </select> 
                            





                        </div>

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
                                         echo "<script>window.open('location_list.php','_self')</script>";
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
                                        <tbody id="thana">

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