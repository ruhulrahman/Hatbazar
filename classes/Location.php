<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../lib/Database.php");
	include_once($filepath."/../helpers/Format.php");
?>

<?php

class Location{

	//Variable Declaration
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function divisionInsert($divisionName){
		$divisionName = $this->fm->validation($divisionName);

		$divisionName = mysqli_real_escape_string($this->db->link, $divisionName);

		if(empty($divisionName)){
			$msg = "<span class='error'>You will have to fill this field to create division list</span>";
			return $msg;
		}else{
			$query = "INSERT INTO division(divisionName) VALUES('$divisionName')";
			$result = $this->db->insert($query);
			if($result){
				return $msg = "<span class='success'>Division inserted successfully</span>";
			}else{
				return $msg = "<span class='error'>Division not inserted!</span>";
			}
		}
	}



	public function districtInsert($districtName, $divId){
		$divId = $this->fm->validation($divId);
		$districtName = $this->fm->validation($districtName);

		$divId = mysqli_real_escape_string($this->db->link, $divId);
		$divisionName = mysqli_real_escape_string($this->db->link, $districtName);

		if(empty($districtName) || empty($divId)){
			$msg = "<span class='error'>You will have to fill this fields to create division list</span>";
			return $msg;
		}else{
			$query = "INSERT INTO district(districtName, divId) VALUES('$districtName', '$divId')";
			$result = $this->db->insert($query);
			if($result){
				return $msg = "<span class='success'>District inserted successfully</span>";
			}else{
				return $msg = "<span class='error'>District not inserted!</span>";
			}
		}
	}



	public function thanaInsert($thanaName, $disId, $divId){
		$thanaName = $this->fm->validation($thanaName);
		$disId = $this->fm->validation($disId);
		$divId = $this->fm->validation($divId);

		$thanaName = mysqli_real_escape_string($this->db->link, $thanaName);
		$disId = mysqli_real_escape_string($this->db->link, $disId);
		$divId = mysqli_real_escape_string($this->db->link, $divId);

		if(empty($thanaName) || empty($disId) || empty($divId)){
			$msg = "<span class='error'>You will have to fill this fields to create thana list</span>";
			return $msg;
		}else{
			$query = "INSERT INTO thana(thanaName, disId, divId) VALUES('$thanaName', '$disId', '$divId')";
			$result = $this->db->insert($query);
			if($result){
				return $msg = "<span class='success'>Thana inserted successfully</span>";
			}else{
				return $msg = "<span class='error'>Thana not inserted!</span>";
			}
		}
	}


	public function getAllDivision(){
		$query = "SELECT * FROM division ORDER BY divisionName ASC";
		$result = $this->db->select($query);
		return $result;
	}


	public function getAllDistrict(){
		$query = "SELECT d.*, ds.divisionName 
				FROM district as d, division as ds
				WHERE d.divId = ds.divId
				ORDER BY ds.divisionName ASC";
		$result = $this->db->select($query);
		return $result;
	}


	public function getAllThana(){
		$query = "SELECT t.*, d.districtName, ds.divisionName 
				FROM thana as t, district as d, division as ds
				WHERE t.disId = d.disId AND t.divId = ds.divId
				ORDER BY t.thanaName ASC";
		$result = $this->db->select($query);
		return $result;
	}


	public function getDistrictById($id){
		$query = "SELECT d.*, ds.divisionName 
				FROM district as d, division as ds
				WHERE d.divId = ds.divId AND d.disId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}


	public function getAllDistrictByDivId($id){
		$query = "SELECT * FROM district WHERE divId='$id";
		$result = $this->db->select($query);
		return $result;
	}


	public function getDivisionById($id){
		$query = "SELECT * FROM division WHERE divId='$id'";
		$result = $this->db->select($query);
		return $result;
	}


	public function getThanaById($id){
		$query = "SELECT t.*, d.districtName, ds.divisionName 
				FROM thana as t, district as d, division as ds
				WHERE t.disId = d.disId AND t.divId = ds.divId AND t.thanaId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}


	public function divisionNameUpdate($divisionName, $id){
		$divisionName = $this->fm->validation($divisionName);

		$divisionName = mysqli_real_escape_string($this->db->link, $divisionName);
		$id = mysqli_real_escape_string($this->db->link, $id);
		
		if(empty($divisionName)){
			$msg = "<span class='error'>You will have to fill this field to create division list</span>";
			return $msg;
		}else{
			$query = "UPDATE division SET divisionName='$divisionName' WHERE divId='$id'";
			$result = $this->db->update($query);
			if($result){
				return $msg = "<span class='success'>Division updated successfully</span>";
			}else{
				return $msg = "<span class='error'>Division not updated!</span>";
			}
		}
	}


	public function districtUpdate($districtName, $divId, $disId){
		$districtName = $this->fm->validation($districtName);
		$divId = $this->fm->validation($divId);

		$districtName = mysqli_real_escape_string($this->db->link, $districtName);
		$divId = mysqli_real_escape_string($this->db->link, $divId);
		
		if(empty($districtName) || empty($divId)){
			$msg = "<span class='error'>You will have to fill this fields to create disctrict list</span>";
			return $msg;
		}else{
			$query = "UPDATE district SET districtName='$districtName', divId='$divId' WHERE disId='$disId'";
			$result = $this->db->update($query);
			if($result){
				return $msg = "<span class='success'>District updated successfully</span>";
			}else{
				return $msg = "<span class='error'>District not updated!</span>";
			}
		}
	}


	public function thanaUpdate($thanaName, $disId, $divId, $thanaEditId){
		$thanaName = $this->fm->validation($thanaName);
		$disId = $this->fm->validation($disId);
		$divId = $this->fm->validation($divId);

		$thanaName = mysqli_real_escape_string($this->db->link, $thanaName);
		$disId = mysqli_real_escape_string($this->db->link, $disId);
		$divId = mysqli_real_escape_string($this->db->link, $divId);
		
		if(empty($thanaName) || empty($disId) || empty($divId)){
			$msg = "<span class='error'>You will have to fill this fields to update thana list</span>";
			return $msg;
		}else{
			$query = "UPDATE thana SET thanaName='$thanaName', disId='$disId', divId='$divId' WHERE thanaId='$thanaEditId'";
			$result = $this->db->update($query);
			if($result){
				return $msg = "<span class='success'>Thana updated successfully</span>";
			}else{
				return $msg = "<span class='error'>Thana not updated!</span>";
			}
		}
	}


	public function delDivisionById($id){
		$query = "DELETE FROM division WHERE divId='$id'";
		$result = $this->db->delete($query);
		if($result){
			return $msg = "<span class='success'>Division deleted successfully</span>";
		}else{
			return $msg = "<span class='error'>Division not deleted!</span>";
		}
	}


	public function delDistrictById($id){
		$query = "DELETE FROM district WHERE disId='$id'";
		$result = $this->db->delete($query);
		if($result){
			return $msg = "<span class='success'>District deleted successfully</span>";
		}else{
			return $msg = "<span class='error'>District not deleted!</span>";
		}
	}


	public function delThanaById($thanaId){
		$query = "DELETE FROM thana WHERE thanaId='$thanaId'";
		$result = $this->db->delete($query);
		if($result){
			return $msg = "<span class='success'>Thana deleted successfully</span>";
		}else{
			return $msg = "<span class='error'>Thana not deleted!</span>";
		}
	}














	public function getCarProduct(){
		$query = "SELECT p.*, b.brandName 
				FROM car_n_bike as p, brand as b, division as c 
				WHERE p.brandId = b.brandId AND p.divisionId = c.divisionId AND p.divisionId = '4'";
		$result = $this->db->select($query);
		return $result;
	}


	public function getBikeProduct(){
		$query = "SELECT p.*, b.brandName 
				FROM car_n_bike as p, brand as b, division as c 
				WHERE p.brandId = b.brandId AND p.divisionId = c.divisionId AND  p.divisionId = '5'";
		$result = $this->db->select($query);
		return $result;
	}


	public function getHouseProduct(){
		$query = "SELECT p.*, b.brandName 
				FROM car_n_bike as p, brand as b, division as c 
				WHERE p.brandId = b.brandId AND p.divisionId = c.divisionId AND  p.divisionId = '34'";
		$result = $this->db->select($query);
		return $result;
	}
	
}