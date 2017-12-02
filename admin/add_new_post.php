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
        $insertProduct = $pd->ProductInsertByAdmin($_POST, $_FILES);
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
                    <div class="col-lg-12">
                         <div class="block text-center">
                            <?php
                                if(isset($insertProduct)){
                                    echo $insertProduct;
                                }
                            ?>
                        </div>
        <form method="post" action="" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-3 mb-3">
                <input type="hidden" name="userId" value=""/>


              <label for="validationServer01">পণ্যের নামঃ</label>
              <input type="text" name="productName" class="form-control is-valid" id="validationServer01" required>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationServer01">পণ্যের ক্যাটাগরিঃ</label>
                <select name="categoryId" class="form-control" id="sel1">                           
                    <option>Select Category</option>
                    <?php
                        $categories = $cat->getAllCat();
                        if($categories){
                            while ($result = $categories->fetch_assoc()) { ?>
                     <option value="<?php echo $result['categoryId'];?>"><?php echo $result['categoryName'];?></option>
                    <?php } } ?>
                </select>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationServer03">ব্র্যান্ডঃ</label>
                <select name="brandId" class="form-control" id="sel1">                           
                    <option>Select Brand</option>
                    <?php
                        $brands = $brand->getAllbrand();
                        if($brands){
                            while ($result = $brands->fetch_assoc()) { ?>
                     <option value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></option>
                    <?php } } ?>
                </select>
            </div>
            <div class="col-md-2 mb-2">
                <label for="file">ছবি আপলোডঃ</label>
                <input type="file" name="image" id="file" />
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="validationServer02">ঠিকানাঃ</label>
              <input type="text" name="address" class="form-control is-valid" id="validationServer02" required>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationServer03">মোবাইলঃ</label>
              <input type="text" name="mobile" class="form-control is-valid" id="validationServer03" required>
            </div>
            <div class="col-md-2 mb-2">
              <label for="validationServer03">টাকাঃ</label>
              <input type="text" name="price" class="form-control is-valid" id="validationServer03" required>
            </div>
            <div class="col-md-2 mb-2">
              <label for="validationServer03">মডেল ইয়ারঃ</label>
              <input type="text" name="modelYear" class="form-control is-valid" id="validationServer03" required>
            </div>
            <div class="col-md-2 mb-2">
              <label for="validationServer03">কন্ডিশন</label>
              <input type="text" name="p_condition" class="form-control is-valid" id="validationServer03" required>
            </div>  
          </div>
          <div class="row">
            <div class="col-md-2 mb-2">
              <label for="validationServer03">ট্রান্সমিশনঃ</label>
              <input type="text" name="transmission" class="form-control is-valid" id="validationServer03" required>
            </div>  
            <div class="col-md-2 mb-2">
              <label for="validationServer03">মডেলের নামঃ</label>
              <input type="text" name="modelName" class="form-control is-valid" id="validationServer03" required>
            </div>      
            <div class="col-md-2 mb-2">
              <label for="validationServer03">বডি টাইপঃ</label>
              <input type="text" name="bodyType" class="form-control is-valid" id="validationServer03" required>
            </div>          
            <div class="col-md-2 mb-2">
              <label for="validationServer03">ফুয়েল টাইপঃ</label>
              <input type="text" name="fuelType" class="form-control is-valid" id="validationServer03" required>
            </div>              
            <div class="col-md-2 mb-2">
              <label for="validationServer03">ইঞ্জিন ক্ষমতাঃ</label>
              <input type="text" name="engineCapacity" class="form-control is-valid" id="validationServer03" required>
            </div>              
            <div class="col-md-2 mb-2">
              <label for="validationServer03">মাইলেজঃ</label>
              <input type="text" name="myles" class="form-control is-valid" id="validationServer03" required>
            </div>  
          </div>
          <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 md" style="margin-top:20px;">
                <button class="btn btn-success" style="width: 100%" id="submit_button" type="submit">Submit</button>
            </div>                
            <div class="col-lg-4"></div>
          </div>
        </form>
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