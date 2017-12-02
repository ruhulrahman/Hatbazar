<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>

<?php
    //for deleting category here
    if(isset($_GET['catDeleteId'])){
        $DeleteId = $_GET['catDeleteId'];
        $DeleteCat = $cat->delCatById($DeleteId);

        if($DeleteCat){
        	echo "<script>window.location.href = 'edit_category.php';</script>";
        }
    }


?>






<?php include_once "footer.php"; ?>