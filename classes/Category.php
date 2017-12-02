<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../lib/Database.php");
	include_once($filepath."/../helpers/Format.php");
?>

<?php

class Category{

	//Variable Declaration
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function CatInsert($category){
		$catName = $this->fm->validation($category);

		$catName = mysqli_real_escape_string($this->db->link, $catName);

		if(empty($catName)){
			$msg = "<span class='error'>You will have to fill this field to create category list</span>";
			return $msg;
		}else{
			$query = "INSERT INTO category(categoryName) VALUES('$catName')";
			$result = $this->db->insert($query);
			if($result){
				return $msg = "<span class='success'>Category inserted successfully</span>";
			}else{
				return $msg = "<span class='error'>Category not inserted!</span>";
			}
		}
	}


	public function getAllCat(){
		$query = "SELECT * FROM category ORDER BY categoryName ASC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getCatById($id){
		$query = "SELECT * FROM category WHERE categoryId='$id'";
		$result = $this->db->select($query);
		return $result;
	}




	public function getAllProdByCat($id){
		//SQL query using Alias 
		$query = "SELECT p.* e.*, b.brandName
				FROM car_n_bike as p, electronics as e, brand as b, category as c
				WHERE p.categoryId = c.categoryId AND p.brandId = b.brandId AND p.categoryId = '$id' AND e.categoryId = '$id' 
				ORDER BY p.id DESC";
		$result = $this->db->select($query);
		return $result;
	}





	public function CatUpdate($catName, $id){
		$catName = $this->fm->validation($catName);

		$catName = mysqli_real_escape_string($this->db->link, $catName);
		$id = mysqli_real_escape_string($this->db->link, $id);
		
		if(empty($catName)){
			$msg = "<span class='error'>You will have to fill this field to create category list</span>";
			return $msg;
		}else{
			$query = "UPDATE category SET categoryName='$catName' WHERE categoryId='$id'";
			$result = $this->db->update($query);
			if($result){
				return $msg = "<span class='success'>Category updated successfully</span>";
			}else{
				return $msg = "<span class='error'>Category not updated!</span>";
			}
		}
	}


	public function delCatById($id){
		$query = "DELETE FROM category WHERE categoryId='$id'";
		$result = $this->db->delete($query);
		if($result){
			return $msg = "<span class='success'>Category deleted successfully</span>";
		}else{
			return $msg = "<span class='error'>Category not deleted!</span>";
		}
	}



	public function getCarProduct(){
		$query = "SELECT p.*, b.brandName 
				FROM car_n_bike as p, brand as b, category as c 
				WHERE p.brandId = b.brandId AND p.categoryId = c.categoryId AND p.categoryId = '4'";
		$result = $this->db->select($query);
		return $result;
	}


	public function getBikeProduct(){
		$query = "SELECT p.*, b.brandName 
				FROM car_n_bike as p, brand as b, category as c 
				WHERE p.brandId = b.brandId AND p.categoryId = c.categoryId AND  p.categoryId = '5'";
		$result = $this->db->select($query);
		return $result;
	}


	public function getHouseProduct(){
		$query = "SELECT p.*, b.brandName 
				FROM car_n_bike as p, brand as b, category as c 
				WHERE p.brandId = b.brandId AND p.categoryId = c.categoryId AND  p.categoryId = '34'";
		$result = $this->db->select($query);
		return $result;
	}
	
}