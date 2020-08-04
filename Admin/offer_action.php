<?php


//order_action.php

include('database_connection.php');

include('function.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "placement";
	

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$name = $_POST['name'];
		$div = $_POST['division'];
		$class = $_POST['cls'];
		$sql = "INSERT INTO students (name, division, cls) VALUES ('$name', '$div', '$class')";
		// $res = mysqli_query($link, $sql);
	
	
		if ($conn->query($sql) === TRUE) {
		  echo 'Successful, student data inserted';
		} 
		else {
		    echo "Error updating record: " . $conn->error;
		}
	

	
		$std_id = mysqli_insert_id($conn);
		echo $std_id;

		for ($i=0; $i < count($_POST['comp']); $i++) { 
			$sql = "INSERT INTO offer (pid, comp, package, bond, offer_date) VALUES ('$std_id', '".$_POST['comp'][$i] . "', '".$_POST['package'][$i]."', '".$_POST['bond'][$i]."', '".$_POST['offer_date'][$i] . "')";
	
			if ($conn->query($sql) === TRUE) {
			  echo 'Successful, offer data inserted';
			} 
			else {
			    echo "Error updating record: " . $conn->error;
			}
		}

		$conn->close();

	}



	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM offer WHERE oid = :oid
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':oid'	=>	$_POST["oid"]
			)
		);
		$result = $statement->fetchAll();
		$output = array();
		foreach($result as $row)
		{
			$output['pid'] = $row['pid'];
			$output['comp'] = $row['comp'];
			$output['package'] = $row['package'];
			$output['bond'] = $row['bond'];
			$output['offer_date'] = $row['offer_date'];

		}

		$sub_query1 = "
		SELECT * FROM students
		WHERE pid = '".$output['pid']."'
		";

		$statement = $connect->prepare($sub_query1);
		$statement->execute();
		$sub_result1 = $statement->fetchAll();
		// $output1 = array();
		foreach ($sub_result1 as $row) {
			# code...
			// $output['name'] = $row['name'];
			// $output['cls'] = $row['cls'];
			// $output['division'] = $row['division'];
		}


function fill_student_list($connect)
{
	$query = "
	SELECT * FROM students
	ORDER BY pid ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["pid"].'">ID: '.$row["pid"].' Name: '.$row["name"].' Class: '.$row["cls"].' Div: '.$row["division"].'</option>';
	}
	return $output;
}


		$sub_query = "
		SELECT * FROM offer
		WHERE oid = '".$_POST["oid"]."'
		";
		$statement = $connect->prepare($sub_query);
		$statement->execute();
		$sub_result = $statement->fetchAll();
		$product_details = '';
		$count = 0;
		foreach($sub_result as $sub_row)
		{
			$product_details .= '
			<span id="row select-insideupdate"> 
				<div class="row">
				<div class="col-md-8">
					<script>
					$(document).ready(function(){
						$("#pid").selectpicker("val", '.$sub_row["pid"].');
						$(".selectpicker").selectpicker();
					});
					</script>
					<label>Select Student :</label>
					<select name="pid" id="pid" class="form-control selectpicker" data-live-search="true" required>
							'.fill_student_list($connect).'
					</select>
					<input type="hidden" name="oid" id="oid" value="'.$_POST["oid"].'" readonly>




				</div>
				</div>
			</span>

			';

			$count = $count + 1;
		}
		$output['product_details'] = $product_details;
		echo json_encode($output);
	}



	if($_POST['btn_action'] == 'Edit')
	{


		// $output = array();
		// $output['oid'] = $_POST['oid'];	
		// $output['pid'] = $_POST['pid'];
		// $output['comp'] = $_POST['comp'];
		// $output['package'] = $_POST['package'];
		// $output['bond'] = $_POST['bond'];
		// $output['offer_date'] = $_POST['offer_date'];


		// echo json_encode($output);


		$oid = $_POST['oid'];
		$query = "DELETE FROM offer where oid='$oid' ";
		$statement = $connect->prepare($query);
		$statement->execute();

		$result = $statement->fetchAll();
		if(isset($result)) {
			echo 'Updating offer ... ';
		}
		else {
			echo 'Error Updating Offer [1]';
		}


		for ($i=0; $i < count($_POST['comp']); $i++) { 
			$sql = "INSERT INTO offer (pid, comp, package, bond, offer_date) VALUES ('".$_POST['pid']."', '".$_POST['comp'][$i] . "', '".$_POST['package'][$i]."', '".$_POST['bond'][$i]."', '".$_POST['offer_date'][$i] . "')";
	
			$statement = $connect->prepare($sql);
			$statement->execute();

			$result = $statement->fetchAll();
			if(isset($result)) {
				echo 'Updating offer done ... ';
			}
			else {
				echo 'Error Updating Offer [2] Sorry record is Deleted ...';
			}
		}

		// $conn->close();















		// $sql = "UPDATE offer SET 
		// 		pid = '".$_POST["pid"]."',
		// 		comp = '".$_POST["comp"]."',
		// 		package = '".$_POST["package"]."',
		// 		bond = '".$_POST["bond"]."',
		// 		offer_date = '".$_POST["offer_date"]."'
		// 	WHERE oid = '".$_POST["oid"]."'
		//  ";


		// $statement = $connect->prepare($sql);
		// $statement->execute();
			
		// $result = $statement->fetchAll();
		
		// if(isset($result)) {
		// 	echo 'Offer Edited ...';
		// }
		// else {
		// 	echo 'Error updating Offer...';
		// }

		// $sql = "UPDATE students SET 
		// 		name = '".$_POST["name"]."',
		// 		cls = '".$_POST["cls"]."',
		// 		division = '".$_POST["division"]."'
		// 	WHERE pid = '".$_POST["pid"]."'
		//  ";


		// $statement = $connect->prepare($sql);
		// $statement->execute();
			
		// $result = $statement->fetchAll();
		
		// if(isset($result)) {
		// 	echo 'Student Edited ...';
		// }
		// else {
		// 	echo 'Error updating Offer...';
		// }



	}



	if($_POST['btn_action'] == 'delete')
	{
		$oid = $_POST['oid'];
		$query = "DELETE FROM offer where oid='$oid' ";
		$statement = $connect->prepare($query);
		$statement->execute();

		$result = $statement->fetchAll();
		if(isset($result)) {
			echo 'Offer Deleted Successfully';
		}
		else {
			echo 'Error Deleting Offer';
		}
	}
}

?>