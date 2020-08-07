<?php
//function.php 



function get_user_name($connect, $user_id)
{
	$query = "
	SELECT user_name FROM user_details WHERE user_id = '".$user_id."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row['user_name'];
	}
}



function count_total_students($connect)
{
	// $query = "
	// SELECT * FROM user_details WHERE user_status='active'";

	$query = "
	SELECT * FROM students";

	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_offers($connect)
{
	$query = "
	SELECT * FROM offer
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_companies($connect)
{
	$query = "
	SELECT distinct comp FROM offer
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}


function highest_package($connect)
{
	

	$query = "SELECT ROUND(MAX(package),2) from offer WHERE year(offer_date) >= year(now()) - 3";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		// return number_format($row['total_order_value'], 2);
		return $row[0];
	}

}

function average_package($connect)
{
	$query = "SELECT ROUND(AVG(package),2) from offer WHERE year(offer_date) >= year(now()) - 3";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		// return number_format($row['total_order_value'], 2);
		return $row[0];
	}
}



?>