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
  // get data and store in a json array
  $query = "SELECT * FROM Orders where EmployeeID=" . $_POST["EmployeeID"];

  $result = mysqli_query($eam, $query) or die("SQL Error 1: " . mysqli_error());
  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	  $orders[] = array(
          'EmployeeID' => $row['EmployeeID'],
          'OrderDate' => $row['OrderDate'],
	        'ShipCity' => $row['ShipCity'],
	        'ShipAddress' => $row['ShipAddress'],
	        'ShipCountry' => $row['ShipCountry']
	      );
  }

  echo json_encode($orders);
?>