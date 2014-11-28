<?php
#Include the connect.php file
include('connect.php');
#Connect to the database
//connection String
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysqli_error());
//select database
mysql_select_db($database, $connect);
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False){
	print "can't find $database";
}
    // get first visible row.
	$firstvisiblerow = $_GET['recordstartindex'];
	// get the last visible row.
	$lastvisiblerow = $_GET['recordendindex'];
	$rowscount = $lastvisiblerow - $firstvisiblerow;
	// build query.
	$query = "SELECT SQL_CALC_FOUND_ROWS * FROM orders";
	$query .= " LIMIT $firstvisiblerow, $rowscount";
	$result = mysqli_query($eam, $query) or die("SQL Error 1: " . mysqli_error());
	$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
	$rows = mysqli_query($sql);
	$rows = mysqli_fetch_assoc($rows);
	$total_rows = $rows['found_rows'];	
	// get data and store in a json array
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$orders[] = array(
			'OrderID' => $row['OrderID'],
			'OrderDate' => $row['OrderDate'],
			'ShippedDate' => $row['ShippedDate'],
			'ShipName' => $row['ShipName'],
			'ShipAddress' => $row['ShipAddress'],
			'ShipCity' => $row['ShipCity'],
			'ShipCountry' => $row['ShipCountry']
		  );
	}
    $data[] = array(
       'TotalRows' => $total_rows,
	   'Rows' => $orders
	);
	echo json_encode($data); 
?>