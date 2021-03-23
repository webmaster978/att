<?php
include('config/database.php');
// include('function.php');
if(isset($_POST["ida"]))
{
	$output = array();
	$statement = $connect->prepare(
		"SELECT * FROM services INNER JOIN login
              ON services.idc=login.id
		WHERE ida = '".$_POST["ida"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["val"] = $row["val"];
		$output["per"] = $row["per"];
		$output["fin"] = $row["fin"];
		
	}
	echo json_encode($output);
}
?>