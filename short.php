<?php require_once("../connection/connection.php");?>
<?php
	if(isset($_GET['dvsnId'])){
		$dvsnId = $_GET['dvsnId'];
		
	}else if(isset($_GET['crcl'])){
		$circle = $_GET['crcl'];
					
			while($rows = mysql_fetch_array($run_query)){
				$id = $rows['id'];
			}


		if($circle == 'HeadOffice'){
			echo '<h1 class="headoffice">Bangladesh Road Transport Authority<h1>';
		}
}

?>