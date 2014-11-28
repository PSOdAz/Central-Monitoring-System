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

if (isset($_POST['update']))
{
	// UPDATE COMMAND 
	$update_query = "UPDATE `Employees` SET `FirstName`='".mysqli_escape_string($eam, ($_POST['FirstName'])."',
	`LastName`='".mysqli_escape_string($eam, ($_POST['LastName'])."',
	`Title`='".mysqli_escape_string($eam, ($_POST['Title'])."' WHERE `EmployeeID`='".mysqli_escape_string($eam, ($_POST['EmployeeID'])."'";
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
			'Title' => $row['Title']
		  );
	}
	 
	echo json_encode($employees);
}
?>