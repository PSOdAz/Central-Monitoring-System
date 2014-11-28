<html>
<body>
<?php require_once('/config/core.php');

	//CHAMBER_SERVER_AUDIT| 
   	$sqlChamberStatus = "SELECT * FROM dbo.[CHAMBER_SERVER]";
   	$stmt = $conn->prepare($sqlChamberStatus);
   	$stmt->execute();
?>

<table id="example" class="display" width="100%" cellspacing="0">
	<thead>
		<tr> 
    		<th>ServerIP</th>
    		<th>ServerName</th>
    		<th>DisplayName</th>
    		<th>Platform</th>
    		<th>Status</th>
    		<th>UserID</th>
    		<th>DateTime</th>
    		<th>Msg</th>
    	</tr>
   	</thead>
   	
   	<tfoot>
		<tr>
    		<th>ServerIP</th>
    		<th>ServerName</th>
    		<th>DisplayName</th>
    		<th>Platform</th>
    		<th>Status</th>
    		<th>UserID</th>
    		<th>DateTime</th>
    		<th>Msg</th>
    	</tr>   		
	</tfoot>

	<?php while($result = $stmt->fetch( PDO::FETCH_ASSOC )) { ?>
  	<tr>
    	<td><?php echo $result["ServerIP"];?></td>
    	<td><?php echo $result["ServerName"];?></td>
    	<td><?php echo $result["DisplayName"];?></td>
    	<td><?php echo $result["Platform"];?></td>
    	<td><?php echo $result["Status"];?></td>
    	<td><?php echo $result["UserID"];?></td>
    	<td><?php echo $result["DateTime"];?></td>
    	<td><?php echo $result["Msg"];?></td>
  	</tr>
	<?php } 
	
	// Free statement and connection resource
	$conn = null;
	?>
</table>

</body>
</html>