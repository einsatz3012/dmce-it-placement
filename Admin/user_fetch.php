<?php

//user_fetch.php

include('database_connection.php');

include('function.php');


$query = '';

$output = array();

$query .= "
SELECT * FROM students 
";

if(isset($_POST["search"]["value"]))
{
	// $query .= 'WHERE';
	// $query .= '(name LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR division LIKE "%'.$_POST["search"]["value"].'%" ';
	// $query .= 'OR cls LIKE "%'.$_POST["search"]["value"].'%") ';

	$query .= "WHERE pid LIKE '%".$_POST['search']['value']."%' ";
	$query .= "OR name LIKe '%".$_POST['search']['value']."%' ";
	$query .= "OR cls LIKe '%".$_POST['search']['value']."%' ";
	$query .= "OR division LIKe '%".$_POST['search']['value']."%' ";
	// $query .= "OR bond LIKe '%".$_POST['search']['value']."%' ";
	// $query .= "OR offer_date LIKe '%".$_POST['search']['value']."%' ";



}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY pid ASC ';
}

if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);


$statement->execute();


$result = $statement->fetchAll();

$data = array();

// echo $result;

$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row['pid'];
	$sub_array[] = $row['name'];
	$sub_array[] = $row['cls'];
	$sub_array[] = $row['division'];
	$sub_array[] = '<button type="button" name="update" id="'.$row["pid"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["pid"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["division"].'">Delete</button>';
	$data[] = $sub_array;
}

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"    			=> 	$data
);


function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM students");
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?>

