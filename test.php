<?php require_once("../connection/connection.php");?>
<?php
	if(isset($_GET['dvsnId'])){
		$dvsnId = $_GET['dvsnId'];

		$divisions = $lcn->getDivisionById($dvsnId);
        if($divisions){
            while ($division = $divisions->fetch_assoc()) {
            	if($dvsnId == $division['divId']){
					echo '
						<option selected="selected" disabled="disabled">Select Your Circle</option>
						<option value="<?php echo $division["divId"];?>"><?php echo $division["divisionName"];?></option>
					';

				}
            } 
		
		
	}else if(isset($_GET['crcl'])){
		$circle = $_GET['crcl'];
		

function single_circle_info(){
			global $circle;
				//Database Query
			$select_query = "SELECT * FROM circle_info WHERE circle_value='$circle'";
			$run_query = mysql_query($select_query);
			
			while($rows = mysql_fetch_array($run_query)){
				$id = $rows['id'];
				$officer_name = $rows['officer_name'];
				$rank = $rows['rank'];
?>
<table id="circle_table">
	<tr>
		<td>
			<?php
			echo '
				<h2>'.$officer_name.'<h2>
				<p>'.$rank.'<p>';?>
		</td>
	</tr>
</table>

				<?php
					echo '<hr>';
			}
}

		if($circle == 'HeadOffice'){
			echo '<h1 class="headoffice">Bangladesh Road Transport Authority<h1>';
			echo '<h1 class="headoffice">Head Office<h1>';
			echo '<h1 class="headoffice">Old Airport Road<h1>';
			echo '<h1 class="headoffice">Ellenbury, Tejgaon, Dhaka-1215<h1>';
			echo '<hr />';
			single_circle_info();
			echo '<p>Office Address: Old Airport Road, Ellenbury, Tejgaon, Dhaka-1215</p>';
		}
}

?>