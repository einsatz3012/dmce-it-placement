<?php

//order_fetch.php

include('database_connection.php');

include('function.php');


$query = '';

$output = array();

$query .= "
	SELECT * FROM offer
";


if(isset($_POST["search"]["value"]))
{

	$query .= "WHERE oid LIKE '%".$_POST['search']['value']."%' ";
	$query .= "OR pid LIKe '%".$_POST['search']['value']."%' ";
	$query .= "OR comp LIKe '%".$_POST['search']['value']."%' ";
	$query .= "OR package LIKe '%".$_POST['search']['value']."%' ";
	$query .= "OR bond LIKe '%".$_POST['search']['value']."%' ";
	$query .= "OR offer_date LIKe '%".$_POST['search']['value']."%' ";


}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY oid ASC ';
}

if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row)
{

	$sub_array = array();

	$sub_array[] = $row['oid'];
	$sub_array[] = $row['pid'];
	$sub_array[] = $row['comp'];
	$sub_array[] = $row['package'];
	$sub_array[] = $row['bond'];
	$sub_array[] = $row['offer_date'];
	// if($_SESSION['type'] == 'master')
	// {
	// 	$sub_array[] = get_user_name($connect, $row['user_id']);
	// }
	// $sub_array[] = '<a href="view_order.php?pdf=1&order_id='.$row["oid"].'" class="btn btn-info btn-xs">View PDF</a>';
	$sub_array[] = '<button type="button" name="update" id="'.$row["oid"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["oid"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}


function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM offer");
	$statement->execute();
	return $statement->rowCount();
}

$output = array(
	"draw"    			=> 	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"    			=> 	$data
);	


echo json_encode($output);

?>