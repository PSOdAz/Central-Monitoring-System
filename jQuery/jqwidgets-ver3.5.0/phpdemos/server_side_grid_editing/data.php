<?php
#Include the connect.php file
include('connect.php');
#Connect to the database
//connection String
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysqli_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False){
   print "can't find $database";
}
// get data and store in a json array
$query = "SELECT * FROM Employees";

if (isset($_GET['update']))
{
	// UPDATE COMMAND 
	$update_query = "UPDATE `Employees` SET `FirstName`='".mysqli_escape_string($eam, ($_GET['FirstName'])."',
	`LastName`='".mysqli_escape_string($eam, ($_GET['LastName'])."',
	`Title`='".mysqli_escape_string($eam, ($_GET['Title'])."',
	`Address`='".mysqli_escape_string($eam, ($_GET['Address'])."',
	`City`='".mysqli_escape_string($eam, ($_GET['City'])."',
	`Country`='".mysqli_escape_string($eam, ($_GET['Country'])."',
	`Notes`='".mysqli_escape_string($eam, ($_GET['Notes'])."' WHERE `EmployeeID`='".mysqli_escape_string($eam, ($_GET['EmployeeID'])."'";
	 $result = mysqli_query($update_query) or die("SQL Error 1: " . mysqli_error());
     echo $result;
}
else
{
    // SELECT COMMAND
	$result = mysqli_query($eam, $query) or die("SQL Error 1: " . mysqli_error());
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$employees[] = array(
			'EmployeeID' => $row['EmployeeID'],
			'FirstName' => $row['FirstName'],
			'LastName' => $row['LastName'],
			'Title' => $row['Title'],
			'Address' => $row['Address'],
			'City' => $row['City'],
			'Country' => $row['Country'],
			'Notes' => $row['Notes']
		  );
	}
	 
	echo json_encode($employees);
}
?>