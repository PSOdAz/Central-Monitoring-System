<html>
<body>
<?php require_once('/config/core.php');
	   
	//CHAMBER_CYCLETIME_AUDIT| TransactionID ServerName LastCycle LastUpdate TranAudit
   	$sqlChamberStatus = "SELECT * FROM dbo.CHAMBER_CYCLETIME_AUDIT";
   	$stmt = $conn->prepare($sqlChamberStatus);
   	$stmt->execute();
?>

<table id="example" class="display" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>TransactionID</th>
    		<th>ServerName</th>
    		<th>LastCycle</th>
    		<th>LastUpdate</th>
    		<th>TranAudit</th>
    	</tr>
   	</thead>
   	
   	<tfoot>
		<tr>
			<th>TransactionID</th>
    		<th>ServerName</th>
    		<th>LastCycle</th>
    		<th>LastUpdate</th>
    		<th>TranAudit</th>
    	</tr>   		
	</tfoot>

	<tbody>
		<?php while($result = $stmt->fetch( PDO::FETCH_ASSOC )) { ?>
		<tr>
			<td><?php echo $result["TransactionID"];?></td>
			<td><?php echo $result["ServerName"];?></td>
			<td><?php echo $result["LastCycle"];?></td>
			<td><?php echo $result["LastUpdate"];?></td>
			<td><?php echo $result["TranAudit"];?></td>
		</tr>
		<?php }
	
		// Free statement and connection resource
		$conn = null;
		?>
	</tbody>
</table>

</body>
</html>