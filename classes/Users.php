<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../lib/Database.php");
	include_once($filepath."/../helpers/Format.php");
?>

<?php

class Users{

	//Variable Declaration
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function getAllusers(){
		$query = "SELECT * FROM users ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getUserById($msnId){
		$query = "SELECT * FROM users WHERE id='$msnId'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getSearchUser($oauth_uid){
		$query = "SELECT * FROM users WHERE oauth_uid='$oauth_uid'";
		$result = $this->db->select($query);
		return $result;
	}



	public function getUserAllCarPosts($user_id){

		//SQL query using Alias
		$query = "SELECT p.*, c.categoryName, b.brandName, t.thanaName, d.districtName
				FROM car_n_bike as p, category as c, brand as b, thana as t, district as d
				WHERE p.categoryId = c.categoryId AND p.brandId = b.brandId AND p.thanaId = t.thanaId AND t.disId = d.disId AND p.userId = '$user_id'
				ORDER BY p.id DESC";
		
		$result = $this->db->select($query);
		return $result;
	}


	public function getUserAllElectPosts($user_id){

		//SQL query using Alias
		$query = "SELECT e.*, c.categoryName, b.brandName, t.thanaName, d.districtName
				FROM electronics as e, category as c, brand as b, thana as t, district as d
				WHERE e.categoryId = c.categoryId AND e.brandId = b.brandId AND e.thanaId = t.thanaId AND  t.disId = d.disId AND e.userId = '$user_id'
				ORDER BY e.electId DESC";
		
		$result = $this->db->select($query);
		return $result;
	}


	
}