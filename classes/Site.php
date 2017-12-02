<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../lib/Database.php");
	include_once($filepath."/../helpers/Format.php");
?>

<?php

Class Site{
	//Variable Declaration
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}



	public function insertSiteDetails($title, $keywords, $site_desc){
		$title = $this->fm->validation($title);
		$site_desc = $this->fm->validation($site_desc);
		$keywords = $this->fm->validation($keywords);

		$title = mysqli_real_escape_string($this->db->link, $title);
		$site_desc = mysqli_real_escape_string($this->db->link, $site_desc);
		$keywords = mysqli_real_escape_string($this->db->link, $keywords);
		
		if(empty($title) || empty($keywords) || empty($site_desc)){
			$msg = "<span class='error'>You have to fill this field to update Site Title</span>";
			return $msg;
		}else{
			$query = "INSERT INTO website_details (site_title, site_desc, keywords) VALUES ('$title', '$site_desc', '$keywords')";
			$result = $this->db->insert($query);
			if($result){
				return $msg = "<span class='success'>Site info inserted successfully</span>";
			}else{
				return $msg = "<span class='error'>Site info not inserted!</span>";
			}
		}
	}


	public function getSiteDetails(){
		$query = "SELECT * FROM website_details ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}


	public function getbrandById($id){
		$query = "SELECT * FROM brand WHERE brandId='$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updateSiteDetails($title, $keywords, $site_desc, $author, $id){
		$title = $this->fm->validation($title);
		$site_desc = $this->fm->validation($site_desc);
		$keywords = $this->fm->validation($keywords);
		$author = $this->fm->validation($author);

		$title = mysqli_real_escape_string($this->db->link, $title);
		$site_desc = mysqli_real_escape_string($this->db->link, $site_desc);
		$keywords = mysqli_real_escape_string($this->db->link, $keywords);
		$author = mysqli_real_escape_string($this->db->link, $author);
		
		if(empty($title) || empty($keywords) || empty($site_desc) || empty($author)){
			$msg = "<span class='error'>You have to fill this field to update Site Title</span>";
			return $msg;
		}else{
			$query = "UPDATE website_details SET site_title='$title', site_desc='$site_desc', keywords='$keywords', author='$author' WHERE id='$id'";
			$result = $this->db->update($query);
			if($result){
				return $msg = "<span class='success'>Site title updated successfully</span>";
			}else{
				return $msg = "<span class='error'>Site title not updated!</span>";
			}
		}
	}




}

?>