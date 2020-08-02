<?php
header('Content-Type: application/json');

require_once('db.php');

//$sqlQuery = "SELECT sum(qty) as qty,year FROM sales Group BY year order by year";

//$sqlQuery = "SELECT Monthname(created) as month, qty, year(created) as year FROM tp group by month having year=2018";
$oyr=date("Y");
$year=$oyr-1;

$sqlQuery = "SELECT sum(qty) as qty, year(created) as year FROM orderfs group by year(created) order by year(created)";


$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>