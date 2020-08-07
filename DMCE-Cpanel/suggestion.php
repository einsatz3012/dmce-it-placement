<?php
include('database_connection.php');


$query = "SELECT distinct comp FROM offer";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
// $filtered_rows = $statement->rowCount();
// print_r($result);
$skillData = array(); 
$i=0;
foreach($result as $row)
{
	// echo $row['comp'];
	$data['id'] = $i;
     $data['value'] = $row['comp'];
     array_push($skillData, $data);
     $i++;
}

echo json_decode($skillData);
?>