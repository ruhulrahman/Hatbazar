<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../lib/Database.php");
	include_once($filepath."/../helpers/Format.php");
?>

<?php

class Product{

	//Variable Declaration
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function ProductInsert($data, $file){
		$userId = mysqli_real_escape_string($this->db->link, $data['userId']);
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId = mysqli_real_escape_string($this->db->link, $data['categoryId']);
		$thanaId = mysqli_real_escape_string($this->db->link, $data['thanaId']);
		$mobile = mysqli_real_escape_string($this->db->link, $data['mobile']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
		$modelYear = mysqli_real_escape_string($this->db->link, $data['modelYear']);
		$p_condition = mysqli_real_escape_string($this->db->link, $data['p_condition']);
		$transmission = mysqli_real_escape_string($this->db->link, $data['transmission']);
		$modelName = mysqli_real_escape_string($this->db->link, $data['modelName']);
		$bodyType = mysqli_real_escape_string($this->db->link, $data['bodyType']);
		$fuelType = mysqli_real_escape_string($this->db->link, $data['fuelType']);
		$engineCapacity = mysqli_real_escape_string($this->db->link, $data['engineCapacity']);
		$myles = mysqli_real_escape_string($this->db->link, $data['myles']);

		//for image
		$permited = array('jpg','jpeg','png','gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		$uploaded_image = "img/upload/".$unique_image;

		if($productName == "" || $catId == "" || $mobile == "" || $price == "" || $p_condition == "" || $thanaId == "" || $file_name == "" || $brandId == "" || $modelYear == ""){
			$msg = "<span class='error'>Fields must not be empty!</span>";
			return $msg;
		}else if($file_size > 1048567){
			return $msg = "<span class='error'>Image size should be less than 1MB</span>";
		}else if(in_array($file_ext, $permited) === false){
			return $msg = "<span class='error'>You can upload only:-".implode(', ',$permited)."</span>";
		}else{
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO car_n_bike(productName, categoryId, thanaId, photos, mobile, price, brandId, modelYear, p_condition, transmission, modelName, bodyType, fuelType, engineCapacity, myles, userId) VALUES('$productName', '$catId', '$thanaId', '$uploaded_image', '$mobile', '$price', '$brandId', '$modelYear', '$p_condition', '$transmission', '$modelName', '$bodyType', '$fuelType', '$engineCapacity', '$myles', '$userId')";
			$result = $this->db->insert($query);
			if($result){
				return $msg = "<span class='success'>Product inserted successfully</span>";
			}else{
				return $msg = "<span class='error'>Product not inserted!</span>";
			}
		}
	}



public function ProductInsertByAdmin($data, $file){
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId = mysqli_real_escape_string($this->db->link, $data['categoryId']);
		$thanaId = mysqli_real_escape_string($this->db->link, $data['thanaId']);
		$mobile = mysqli_real_escape_string($this->db->link, $data['mobile']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
		$modelYear = mysqli_real_escape_string($this->db->link, $data['modelYear']);
		$p_condition = mysqli_real_escape_string($this->db->link, $data['p_condition']);
		$transmission = mysqli_real_escape_string($this->db->link, $data['transmission']);
		$modelName = mysqli_real_escape_string($this->db->link, $data['modelName']);
		$bodyType = mysqli_real_escape_string($this->db->link, $data['bodyType']);
		$fuelType = mysqli_real_escape_string($this->db->link, $data['fuelType']);
		$engineCapacity = mysqli_real_escape_string($this->db->link, $data['engineCapacity']);
		$myles = mysqli_real_escape_string($this->db->link, $data['myles']);

		//for image
		$permited = array('jpg','jpeg','png','gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		$uploaded_image = "../img/upload/".$unique_image;

		if($productName == "" || $catId == "" || $mobile == "" || $price == "" || $file_name == "" || $brandId == "" || $modelYear == ""){
			$msg = "<span class='error'>Fields must not be empty!</span>";
			return $msg;
		}else if($file_size > 1048567){
			return $msg = "<span class='error'>Image size should be less than 1MB</span>";
		}else if(in_array($file_ext, $permited) === false){
			return $msg = "<span class='error'>You can upload only:-".implode(', ',$permited)."</span>";
		}else{
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO car_n_bike(productName, categoryId, thanaId, photos, mobile, price, brandId, modelYear, p_condition, transmission, modelName, bodyType, fuelType, engineCapacity, myles, userId) VALUES('$productName', '$catId', '$thanaId', '$uploaded_image', '$mobile', '$price', '$brandId', '$modelYear', '$p_condition', '$transmission', '$modelName', '$bodyType', '$fuelType', '$engineCapacity', '$myles', '0')";
			$result = $this->db->insert($query);
			if($result){
				return $msg = "<span class='success'>Product inserted successfully</span>";
			}else{
				return $msg = "<span class='error'>Product not inserted!</span>";
			}
		}
	}


	public function getAllProduct(){

		//SQL query using Alias
		$query = "SELECT p.*, c.categoryName, b.brandName, t.thanaName, d.districtName
				FROM car_n_bike as p, category as c, brand as b, thana as t, district as d
				WHERE p.categoryId = c.categoryId AND p.brandId = b.brandId AND p.thanaId = t.thanaId AND t.disId = d.disId
				ORDER BY p.id DESC";
		
		$result = $this->db->select($query);
		return $result;
	}


	public function getNewAllCars(){

		//SQL query using Alias
		$query = "SELECT p.*, c.categoryName, b.brandName, t.thanaName, d.districtName
				FROM car_n_bike as p, category as c, brand as b, thana as t, district as d
				WHERE p.categoryId = c.categoryId AND p.brandId = b.brandId AND p.thanaId = t.thanaId AND t.disId = d.disId AND p.p_condition = '1'
				ORDER BY p.id DESC";
		
		$result = $this->db->select($query);
		return $result;
	}


	public function getUsedAllCars(){

		//SQL query using Alias
		$query = "SELECT p.*, c.categoryName, b.brandName, t.thanaName, d.districtName
				FROM car_n_bike as p, category as c, brand as b, thana as t, district as d
				WHERE p.categoryId = c.categoryId AND p.brandId = b.brandId AND p.thanaId = t.thanaId AND t.disId = d.disId AND p.p_condition = '2'
				ORDER BY p.id DESC";
		
		$result = $this->db->select($query);
		return $result;
	}


	public function getAllProductWithUserId(){
		//SQL query using Alias || 4 table Query
		//table name = car_n_bike, users, category, brand
		$query = "SELECT p.*,u.first_name, u.last_name, u.picture, u.oauth_uid, c.categoryName, b.brandName,  t.thanaName, d.districtName, dv.*
				FROM car_n_bike as p, users as u, category as c, brand as b, thana as t, district as d, division as dv
				WHERE p.categoryId = c.categoryId AND p.userId = u.id AND p.brandId = b.brandId AND p.thanaId = t.thanaId AND t.disId = d.disId AND d.divId = dv.divId
				ORDER BY p.id DESC";
		
		$result = $this->db->select($query);
		return $result;
	}


	public function getCarProductBySearchByUser($searchItem){
		//SQL query using Alias || 4 table Query
		//table name = car_n_bike, users, category, brand
		$query = "SELECT p.*, u.first_name, u.last_name, u.picture, u.oauth_uid, c.categoryName, b.brandName
				FROM car_n_bike as p, users as u, category as c, brand as b WHERE p.categoryId = c.categoryId AND p.userId = u.id AND p.brandId = b.brandId AND (p.productName LIKE '%$searchItem%' OR c.categoryName LIKE '%$searchItem%' OR b.brandName LIKE '%$searchItem%')";		
		$result = $this->db->select($query);
		return $result;
	}


	public function getProductBySearch($searchItem){
		//SQL query using Alias || 4 table Query
		//table name = car_n_bike, users, category, brand
		$query = "SELECT p.*, u.first_name, u.last_name, u.picture, u.oauth_uid, c.categoryName, b.brandName, t.thanaName, d.districtName, dv.*
				FROM car_n_bike as p, users as u, category as c, brand as b, thana as t, district as d, division as dv 
				WHERE p.categoryId = c.categoryId AND p.userId = u.id AND p.brandId = b.brandId AND p.thanaId = t.thanaId AND t.disId = d.disId AND d.divId = dv.divId AND (p.productName LIKE '%$searchItem%' OR c.categoryName LIKE '%$searchItem%' OR b.brandName LIKE '%$searchItem%')";		
		$result = $this->db->select($query);
		return $result;
	}


	public function getAllProductsByBrand($brandId){
		//SQL query using Alias || 4 table Query
		//table name = car_n_bike, users, category, brand
		$query = "SELECT p.*,b.brandName, t.thanaName, d.districtName
				FROM car_n_bike as p, brand as b, thana as t, district as d
				WHERE p.brandId = b.brandId AND p.thanaId = t.thanaId AND t.disId = d.disId AND p.brandId = '$brandId' 
				ORDER BY p.id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getProductBySearchBandName($brandName){
		//SQL query using Alias || 4 table Query
		//table name = car_n_bike, users, category, brand
		$query = "SELECT b.*, p.*, u.first_name, u.last_name, u.picture, u.oauth_uid, c.categoryName, b.brandName
				FROM car_n_bike as p, users as u, category as c, brand as b WHERE b.brandName LIKE '%" . $brandName . "%'";		
		$result = $this->db->select($query);
		return $result;
	}

	public function getProductById($id){
		//table name = car_n_bike, users, category, brand
		$query = "SELECT p.*, u.first_name, u.last_name, u.picture, u.oauth_uid, c.categoryName, b.brandName, 		t.thanaName, d.districtName
				FROM car_n_bike as p, users as u, category as c, brand as b, thana as t, district as d WHERE p.categoryId = c.categoryId AND p.userId = u.id AND p.brandId = b.brandId AND p.thanaId = t.thanaId AND t.disId = d.disId AND p.id ='$id'";		
		$result = $this->db->select($query);
		return $result;
	}

	public function getPostById($id){
		$query = "SELECT p.*, c.*, b.*
				FROM car_n_bike as p, category as c, brand as b
				WHERE p.id='$id' AND p.categoryId = c.categoryId AND p.brandId = b.brandId
				ORDER BY p.id DESC";
		//$query = "SELECT * FROM car_n_bike WHERE id='$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllProductById($id){
		$query = "SELECT b.*, c.categoryName, bnd.brandName
				FROM car_n_bike as b, category as c AND brand as bnd
				WHERE b.userId = u.id AND b.id='$id'
				ORDER BY b.id DESC";
		//$query = "SELECT * FROM car_n_bike WHERE id='$id'";
		$result = $this->db->select($query);
		return $result;
	}


	public function getAllProductsByCat($id){
		//SQL query using Alias 
		$query = "SELECT p.*, b.brandName, t.thanaName, d.districtName
				FROM car_n_bike as p, brand as b, category as c, thana as t, district as d
				WHERE p.categoryId = c.categoryId AND p.brandId = b.brandId AND p.thanaId = t.thanaId AND t.disId = d.disId AND p.categoryId = '$id' 
				ORDER BY p.id DESC";
		$result = $this->db->select($query);
		return $result;
	}


	public function getAllCarProByDivision($divId){
		//SQL query using Alias 
		$query = "SELECT p.*, b.brandName, t.thanaName, d.districtName, dv.*
				FROM car_n_bike as p, brand as b, category as c, thana as t, district as d, division as dv
				WHERE p.categoryId = c.categoryId AND p.brandId = b.brandId AND p.thanaId = t.thanaId AND t.disId = d.disId AND d.divId = dv.divId AND dv.divId = '$divId' 
				ORDER BY p.id DESC";
		$result = $this->db->select($query);
		return $result;
	}


	public function delUserPostById($DeleteId){
		$query = "DELETE FROM car_n_bike WHERE id='$DeleteId'";
		$result = $this->db->delete($query);
		if($result){
			return $msg = "<span class='success'>Product deleted successfully</span>";
		}else{
			return $msg = "<span class='error'>Product not deleted!</span>";
		}
	}	

	public function ProductUpdate($data, $file, $PostId){
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId = mysqli_real_escape_string($this->db->link, $data['categoryId']);
		$thanaId = mysqli_real_escape_string($this->db->link, $data['thanaId']);
		$mobile = mysqli_real_escape_string($this->db->link, $data['mobile']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
		$modelYear = mysqli_real_escape_string($this->db->link, $data['modelYear']);
		$p_condition = mysqli_real_escape_string($this->db->link, $data['p_condition']);
		$transmission = mysqli_real_escape_string($this->db->link, $data['transmission']);
		$modelName = mysqli_real_escape_string($this->db->link, $data['modelName']);
		$bodyType = mysqli_real_escape_string($this->db->link, $data['bodyType']);
		$fuelType = mysqli_real_escape_string($this->db->link, $data['fuelType']);
		$engineCapacity = mysqli_real_escape_string($this->db->link, $data['engineCapacity']);
		$myles = mysqli_real_escape_string($this->db->link, $data['myles']);

		//for image
		$permited = array('jpg','jpeg','png','gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		$uploaded_image = "img/upload/".$unique_image;

		if($productName == "" || $catId == "" || $mobile == "" || $price == "" || $brandId == "" || $modelYear == ""){
			$msg = "<span class='error'>Fields must not be empty!</span>";
			return $msg;
		}else{
			if(!empty($file_name)){
				if($file_size > 1048567){
					return $msg = "<span class='error'>Image size should be less than 1MB</span>";
				}else if(in_array($file_ext, $permited) === false){
					return $msg = "<span class='error'>You can upload only:-".implode(', ',$permited)."</span>";
				}else{
					move_uploaded_file($file_temp, $uploaded_image);
					$query = "UPDATE car_n_bike SET productName='$productName', categoryId='$catId', thanaId='$thanaId', photos='$uploaded_image', mobile='$mobile', price='$price', brandId='$brandId', modelYear='$modelYear', p_condition='$p_condition', transmission='$transmission', modelName='$modelName', bodyType='$bodyType', fuelType='$fuelType', engineCapacity='$engineCapacity', myles='$myles' WHERE id='$PostId'";
					$result = $this->db->update($query);
					if($result){
						return $msg = "<span class='success'>Product updated successfully</span>";
					}else{
						return $msg = "<span class='error'>Product not updated!</span>";
					}
				}
			}else{
				$query = "UPDATE car_n_bike SET productName='$productName', categoryId='$catId', thanaId='$thanaId',  mobile='$mobile', price='$price', brandId='$brandId', modelYear='$modelYear', p_condition='$p_condition', transmission='$transmission', modelName='$modelName', bodyType='$bodyType', fuelType='$fuelType', engineCapacity='$engineCapacity', myles='$myles' WHERE id='$PostId'";
				$result = $this->db->update($query);
				if($result){
					return $msg = "<span class='success'>Product updated successfully</span>";
				}else{
					return $msg = "<span class='error'>Product not updated!</span>";
				}
			}
		}
	}



	public function getAllCarProByThana($thanaId){
		//SQL query using Alias 
		$query = "SELECT e.*, b.brandName, t.thanaName, d.districtName
				FROM car_n_bike as e, brand as b, category as c, thana as t, district as d
				WHERE e.categoryId = c.categoryId AND e.brandId = b.brandId AND e.thanaId = t.thanaId AND t.disId = d.disId AND e.thanaId = '$thanaId'
				ORDER BY e.id DESC";
		$result = $this->db->select($query);
		return $result;
	}









}