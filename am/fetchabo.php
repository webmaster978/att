<?php

//fetch.php

require 'config/database.php';

$column = array("id_user", "entre", "siege", "adresse", "contact", "detail","username","datec");

$query = "SELECT * FROM abonne INNER JOIN login
              ON abonne.idc=login.id";

if(isset($_POST["search"]["value"]))
{
	$query .= '
	WHERE id_user LIKE "%'.$_POST["search"]["value"].'%" 
	OR entre LIKE "%'.$_POST["search"]["value"].'%" 
	OR siege LIKE "%'.$_POST["search"]["value"].'%" 
	OR adresse LIKE "%'.$_POST["search"]["value"].'%" 
	OR contact LIKE "%'.$_POST["search"]["value"].'%"
	OR username LIKE"%'.$_POST["search"]["value"].'%" 
	OR datec LIKE"%'.$_POST["search"]["value"].'%" 
	';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id_user DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
	$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$result = $connect->query($query . $query1);

$data = array();

foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row['id_user'];
	$sub_array[] = $row['entre'];
	$sub_array[] = $row['siege'];
	$sub_array[] = $row['adresse'];
	$sub_array[] = $row['contact'];
	$sub_array[] = $row['detail'];
	$sub_array[] = $row['username'];
	$sub_array[] = $row['datec'];
	
	$data[] = $sub_array;
}

function count_all_data($connect)
{
	$query = "SELECT * FROM abonne INNER JOIN login
              ON abonne.idc=login.id ";

	$statement = $connect->prepare($query);

	$statement->execute();

	return $statement->rowCount();
}

$output = array(
	"draw"		=>	intval($_POST["draw"]),
	"recordsTotal"	=>	count_all_data($connect),
	"recordsFiltered"	=>	$number_filter_row,
	"data"	=>	$data

	
);

echo json_encode($output);

?>

