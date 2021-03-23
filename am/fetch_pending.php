<?php

//fetch.php

require 'config/database.php';

$column = array("ida", "detail", "type", "heure", "datec","etat");

$query = "SELECT * FROM services INNER JOIN login
              ON services.idc=login.id";
            


if(isset($_POST["search"]["value"]))
{
	$query .= '
	WHERE ida LIKE "%'.$_POST["search"]["value"].'%" 
	OR detail LIKE "%'.$_POST["search"]["value"].'%" 
	OR type LIKE "%'.$_POST["search"]["value"].'%" 
	OR heure LIKE "%'.$_POST["search"]["value"].'%" 
	OR datec LIKE "%'.$_POST["search"]["value"].'%"
	OR username LIKE"%'.$_POST["search"]["value"].'%"
	OR val LIKE"%'.$_POST["search"]["value"].'%"
	OR datec LIKE"%'.$_POST["search"]["value"].'%" 
	OR datej LIKE"%'.$_POST["search"]["value"].'%"
	';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY ida DESC ';
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
	$sub_array[] = $row['ida'];
	$sub_array[] = $row['username'];
	$sub_array[] = $row['type'];
	$sub_array[] = $row['detail'];
	$sub_array[] = $row['datej'];
	$sub_array[] = $row['heure'];
	$sub_array[] = $row['datec'];
	$sub_array[] = $row['val'];
	$sub_array[] = $row['per'];
	$sub_array[] = $row['fin'];
	$sub_array[] = '<button type="button" name="delete" id="'.$row["ida"].'" class="btn btn-success btn-xs delete">Edit</button>';

	$data[] = $sub_array;
}

function count_all_data($connect)
{
	$query = "SELECT * FROM services INNER JOIN login
              ON services.idc=login.id";

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

