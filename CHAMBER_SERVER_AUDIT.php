<html>
<body>
<?php require_once('/config/core.php');

	//CHAMBER_SERVER_AUDIT| 
   	$sqlChamberStatus = "SELECT * FROM dbo.[CHAMBER_SERVER_AUDIT]";
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
    		<th>ChangeUserID</th>
    		<th>ChangeDateTime</th>
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
    		<th>ChangeUserID</th>
    		<th>ChangeDateTime</th>
    	</tr>   		
	</tfoot>

	<?php while($result = $stmt->fetch( PDO::FETCH_ASSOC )) { ?>
  	<tr>
    	<td><?php echo $result["ServerIP"];?></div></td>
    	<td><?php echo $result["ServerName"];?></td>
    	<td><?php echo $result["DisplayName"];?></div></td>
    	<td><?php echo $result["Platform"];?></td>
    	<td><?php echo $result["Status"];?></td>
    	<td><?php echo $result["UserID"];?></div></td>
    	<td><?php echo $result["DateTime"];?></td>
    	<td><?php echo $result["Msg"];?></div></td>
    	<td><?php echo $result["ChangeUserID"];?></td>
    	<td><?php echo $result["ChangeDateTime"];?></td>
  	</tr>
	<?php } 
	
	// Free statement and connection resource
	$conn = null;
	?>
</table>

</body>
</html>