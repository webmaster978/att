<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=bamara", "root", "");
require 'user.class.php';

$column = array("id", "nom", "numero", "message", "gmail");

$query = "SELECT * FROM message";

if(isset($_POST["search"]["value"]))
{
	$query .= '
	WHERE id LIKE "%'.$_POST["search"]["value"].'%" 
	OR nom LIKE "%'.$_POST["search"]["value"].'%" 
	OR numero LIKE "%'.$_POST["search"]["value"].'%" 
	OR message LIKE "%'.$_POST["search"]["value"].'%" 
	OR datec LIKE "%'.$_POST["search"]["value"].'%"
	
	';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id DESC ';
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
	$sub_array[] = $row['id'];
	$sub_array[] = $row['nom'];
	$sub_array[] = $row['numero'];
	$sub_array[] = $row['gmail'];
	$sub_array[] = $row['message'];
	$sub_array[] = $row['datec'];
	$data[] = $sub_array;
}

function count_all_data($connect)
{
	$query = "SELECT nom,numero,gmail,message,datec FROM message";

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

