<?php

//user_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO students (name, cls, division) 
		VALUES (:name, :class, :division)
		";	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':name'		=>	$_POST["name"],
				// ':user_password'	=>	password_hash($_POST["user_password"], PASSWORD_DEFAULT),
				':class'		=>	$_POST["class"],
				':division'		=>	$_POST["division"],
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Student Added';
		}
	}
	if($_POST['btn_action'] == 'fetch_single')
	{
		$query = "
		SELECT * FROM students WHERE pid = :id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id'	=>	$_POST["id"]
			)
		);
		$result = $statement->fetchAll();
		// print_r($result);
		$output = array();
		foreach($result as $row)
		{
			$output['class'] = $row['cls'];
			$output['name'] = $row['name'];
			$output['division'] = $row['division'];
			$output['id'] = $_POST["id"];

		}
		// print_r($output["class"]);
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'Edit')
	{
			$query = "
			UPDATE students SET 
				name = '".$_POST["name"]."', 
				cls = '".$_POST["class"]."',
				division = '".$_POST["division"]."'
				WHERE pid = '".$_POST["pid"]."'
			";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Student Details Edited';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$query = "
		DELETE FROM students
		WHERE pid = :id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id'		=>	$_POST["id"]
			)
		);	
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'User Deleted ';
		}
	}
}

?>