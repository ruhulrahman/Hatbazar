<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../lib/Database.php");
	include_once($filepath."/../helpers/Format.php");
?>

<?php

class Electronics{

	//Variable Declaration
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function ProductInsert($data, $file){
		$userId = mysqli_real_escape_string($this->db->link, $data['userId']);
		$categoryId = mysqli_real_escape_string($this->db->link, $data['categoryId']);
		$brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
		$conditionId = mysqli_real_escape_string($this->db->link, $data['conditionId']);
		$mobile = mysqli_real_escape_string($this->db->link, $data['mobile']);
		$post_title = mysqli_real_escape_string($this->db->link, $data['post_title']);
		$post_desc = mysqli_real_escape_string($this->db->link, $data['post_desc']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$thanaId = mysqli_real_escape_string($this->db->link, $data['thanaId']);

		//for imagegetAllElectProByDiv
		$permited = array('jpg','jpgetAllElectProByDiveg','png','gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		$uploaded_image = "img/upload/".$unique_image;

		if($post_title == "" || $categoryId == "" || $mobile == "" || $price == "" || $file_name == "" || $brandId == "" || $conditionId == ""){
			$msg = "<span class='error'>Fields must not be empty!</span>";
			return $msg;
		}else if($file_size > 1048567){
			return $msg = "<span class='error'>Image size should be less than 1MB</span>";
		}else if(in_array($file_ext, $permited) === false){
			return $msg = "<span class='error'>You can upload only:-".implode(', ',$permited)."</span>";
		}else{
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO electronics(brandId, categoryId, conditionId, thanaId, post_title, post_desc, image, price, mobile, userId) VALUES('$brandId', '$categoryId', '$conditionId', '$thanaId', '$post_title', '$post_desc', '$uploaded_image', '$price', '$mobile', '$userId')";
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
		$address = mysqli_real_escape_string($this->db->link, $data['address']);
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
			$query = "INSERT INTO car_n_bike(productName, categoryId, address, photos, mobile, price, brandId, modelYear, p_condition, transmission, modelName, bodyType, fuelType, engineCapacity, myles, userId) VALUES('$productName', '$catId', '$address', '$uploaded_image', '$mobile', '$price', '$brandId', '$modelYear', '$p_condition', '$transmission', '$modelName', '$bodyType', '$fuelType', '$engineCapacity', '$myles', '0')";
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
		$query = "SELECT e.*, c.categoryName, b.brandName, t.thanaName
				FROM electronics as e, category as c, brand as b, thana as t
				WHERE e.categoryId = c.categoryId AND e.brandId = b.brandId AND e.thanaId = t.thanaId
				ORDER BY e.electId DESC";
		
		$result = $this->db->select($query);
		return $result;
	}


	public function getNewAllElects(){

		//SQL query using Alias
		$query = "SELECT e.*, c.categoryName, b.brandName, t.thanaName, d.districtName
				FROM electronics as e, category as c, brand as b, thana as t, district as d
				WHERE e.categoryId = c.categoryId AND e.brandId = b.brandId AND e.thanaId = t.thanaId AND t.disId = d.disId AND e.conditionId = '1'
				ORDER BY e.electId DESC";
		
		$result = $this->db->select($query);
		return $result;
	}


	public function getUsedAllElects(){

		//SQL query using Alias
		$query = "SELECT e.*, c.categoryName, b.brandName, t.thanaName, d.districtName
				FROM electronics as e, category as c, brand as b, thana as t, district as d
				WHERE e.categoryId = c.categoryId AND e.brandId = b.brandId AND e.thanaId = t.thanaId AND t.disId = d.disId AND e.conditionId = '2'
				ORDER BY e.electId DESC";
		
		$result = $this->db->select($query);
		return $result;
	}


	public function getElectProBySearchByUser($searchItem){
		//SQL query using Alias || 4 table Query
		//table name = car_n_bike, users, category, brand
		$query = "SELECT e.*, u.first_name, u.last_name, u.picture, u.oauth_uid, c.categoryName, b.brandName, t.thanaName, d.districtName
				FROM electronics as e, users as u, category as c, brand as b, thana as t, district as d WHERE e.categoryId = c.categoryId AND e.userId = u.id AND e.brandId = b.brandId AND e.thanaId = t.thanaId AND t.disId = d.disId AND (e.post_title LIKE '%$searchItem%' OR c.categoryName LIKE '%$searchItem%' OR b.brandName LIKE '%$searchItem%')";		
		$result = $this->db->select($query);
		return $result;
	}



	public function getElectProductById($id){
		//table name = car_n_bike, users, category, brand
		$query = "SELECT e.*, u.first_name, u.last_name, u.picture, u.oauth_uid, c.categoryName, b.brandName, t.thanaName, d.districtName
				FROM electronics as e, users as u, category as c, brand as b, thana as t, district as d WHERE e.categoryId = c.categoryId AND e.userId = u.id AND e.brandId = b.brandId AND e.thanaId = t.thanaId AND t.disId = d.disId AND e.electId ='$id'";		
		$result = $this->db->select($query);
		return $result;
	}


	public function getAllElectProByCat($id){
		//SQL query using Alias 
		$query = "SELECT e.*, b.brandName, t.thanaName, d.districtName
				FROM electronics as e, brand as b, category as c, thana as t, district as d
				WHERE e.categoryId = c.categoryId AND e.brandId = b.brandId AND e.thanaId = t.thanaId AND t.disId = d.disId  AND e.categoryId = '$id' 
				ORDER BY e.electId DESC";
		$result = $this->db->select($query);
		return $result;
	}


	public function getAllElectProByDiv($divId){
		//SQL query using Alias 
		$query = "SELECT e.*, b.brandName, t.thanaName, d.districtName, dv.*
				FROM electronics as e, brand as b, category as c, thana as t, district as d, division as dv
				WHERE e.categoryId = c.categoryId AND e.brandId = b.brandId AND e.thanaId = t.thanaId AND t.disId = d.disId AND d.divId = dv.divId AND dv.divId = '$divId' 
				ORDER BY e.electId DESC";
		$result = $this->db->select($query);
		return $result;
	}


	public function getAllElectProByThana($thanaId){
		//SQL query using Alias 
		$query = "SELECT e.*, b.brandName, t.thanaName, d.districtName
				FROM electronics as e, brand as b, category as c, thana as t, district as d
				WHERE e.categoryId = c.categoryId AND e.brandId = b.brandId AND e.thanaId = t.thanaId AND t.disId = d.disId AND e.thanaId = '$thanaId'
				ORDER BY e.electId DESC";
		$result = $this->db->select($query);
		return $result;
	}




	public function getAllElectProByBrand($brandId){
		//SQL query using Alias || 4 table Query
		//table name = car_n_bike, users, category, brand
		$query = "SELECT e.*, b.brandName, t.thanaName, d.districtName
				FROM electronics as e, brand as b, category as c, thana as t, district as d
				WHERE e.categoryId = c.categoryId AND e.brandId = b.brandId AND e.thanaId = t.thanaId AND t.disId = d.disId  AND e.brandId = '$brandId' 
				ORDER BY e.electId DESC";
		$result = $this->db->select($query);
		return $result;
	}




	public function getAllElectProductWithUserId(){
		//SQL query using Alias || 4 table Query
		//table name = car_n_bike, users, category, brand
		$query = "SELECT e.*,u.first_name, u.last_name, u.picture, u.oauth_uid, c.categoryName, b.brandName,  t.thanaName, d.districtName, dv.*
				FROM electronics as e, users as u, category as c, brand as b, thana as t, district as d, division as dv
				WHERE e.categoryId = c.categoryId AND e.userId = u.id AND e.brandId = b.brandId AND e.thanaId = t.thanaId AND t.disId = d.disId AND d.divId = dv.divId
				ORDER BY e.electId DESC";
		
		$result = $this->db->select($query);
		return $result;
	}



	public function getProductBySearch($searchItem){
		//SQL query using Alias || 4 table Query
		//table name = car_n_bike, users, category, brand
		$query = "SELECT p.*, u.first_name, u.last_name, u.picture, u.oauth_uid, c.categoryName, b.brandName, t.thanaName, d.districtName, dv.*
				FROM electronics as p, users as u, category as c, brand as b, thana as t, district as d, division as dv 
				WHERE p.categoryId = c.categoryId AND p.userId = u.id AND p.brandId = b.brandId AND p.thanaId = t.thanaId AND t.disId = d.disId AND d.divId = dv.divId AND (p.post_title LIKE '%$searchItem%' OR c.categoryName LIKE '%$searchItem%' OR b.brandName LIKE '%$searchItem%')";		
		$result = $this->db->select($query);
		return $result;
	}




}