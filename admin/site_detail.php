<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>
<?php 
    //Site Info inserting here
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insertSiteInfo'])){
        //All fields are getting by global variable $_POST and $_FILES
        $title = $_POST['title'];
        $keywords = $_POST['keywords'];
        $site_desc = $_POST['site_desc'];
        $insertSites = $st->insertSiteDetails($title, $keywords, $site_desc);
    } 



    //Site Info Updating Here
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
        //All fields are getting by global variable $_POST and $_FILES
        $id = $_POST['id'];
        $title = $_POST['title'];
        $keywords = $_POST['keywords'];
        $site_desc = $_POST['site_desc'];
        $author = $_POST['author'];
        $updateSites = $st->updateSiteDetails($title, $keywords, $site_desc, $author, $id);
    }
?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
							Site Title Page
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                         <div class="block text-center">
                            <?php
                                if(isset($updateSites)){
                                    echo $updateSites;
                                }


                                if(isset($insertSites)){
                                    echo $insertSites;
                                }
                            ?>
                        </div>
                        <?php
                            $sites = $st->getSiteDetails();
                            if($sites){
                                while ($result = $sites->fetch_assoc()) { ?>
                            <form role="form" method="post" action="">					
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $result['id'];?>">
                                    <label>Edit Site Title</label>
                                    <input class="form-control" name="title" value="<?php echo $result['site_title'];?>" placeholder="Enter a site title" /><br>

                                    <label>Edit Site Keywords</label>
                                    <input class="form-control" name="keywords" value="<?php echo $result['keywords'];?>" placeholder="Enter a site keywords" /><br>

                                    <label>Edit Site Description</label>
                                    <textarea class="form-control" name="site_desc" id="" placeholder="Enter site description" cols="30" rows="4"><?php echo $result['site_desc'];?></textarea><br>

                                    <label>Edit Site Author Name</label>
                                    <input class="form-control" name="author" value="<?php echo $result['author'];?>" placeholder="Enter a site author" />
                                </div>
                                <button type="submit" name="update" class="btn btn-success">Save Site Info</button>
                            </form>                         
                            <?php } }else{ ?>
                                    <form role="form" method="post" action="">                    
                                        <div class="form-group">
                                            <label>Add Site Title</label>
                                            <input class="form-control" name="title" placeholder="Enter site title" /><br>

                                            <label>Add Site Keywords</label>
                                            <input class="form-control" name="keywords" placeholder="Enter site keywords" /><br>

                                            <label>Add Site Description</label>
                                            <textarea class="form-control" name="site_desc" id="" placeholder="Enter site description" cols="30" rows="4"></textarea>
                                        </div>
                                        <button type="submit" name="insertSiteInfo" class="btn btn-success">Save</button>
                                    </form>
                            <?php } ?>
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