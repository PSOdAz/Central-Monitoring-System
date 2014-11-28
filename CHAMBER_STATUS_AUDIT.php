<html>
<body>
<?php require_once('/config/core.php');
	$machine = "spehfrsnt16";
	//CHAMBER_STATUS_AUDIT| TransactionID ServerIP ServerName Status Remark DateTime
   	$sqlChamberStatus = "SELECT * FROM dbo.CHAMBER_STATUS_AUDIT WHERE ServerName='$machine' ORDER BY DateTime DESC";
   	$stmt = $conn->prepare($sqlChamberStatus);
   	$stmt->execute();
?>

<table id="example" class="display" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>TransactionID</th>
    		<th>ServerIP</th>
    		<th>ServerName</th>
    		<th>Status</th>
    		<th>Remark</th>
    		<th>DateTime</th>
    	</tr>
   	</thead>
   	
   	<tfoot>
		<tr>
			<th>TransactionID</th>
    		<th>ServerIP</th>
    		<th>ServerName</th>
    		<th>Status</th>
    		<th>Remark</th>
    		<th>DateTime</th>
    	</tr>   		
	</tfoot>

	<tbody>
		<?php while($result = $stmt->fetch( PDO::FETCH_ASSOC )) { ?>
		<tr>
    		<td><?php echo $result["ServerIP"];?></td>
    		<td><?php echo $result["Remark"];?></td>
    		<td><?php echo $result["ServerName"];?></td>
    		<td><?php echo $result["Status"];?></td>
    		<td><?php echo $result["Remark"];?></td>
    		<td><?php echo $result["DateTime"];?></td>
  		</tr>
		<?php } 
	
		// Free statement and connection resource
		$conn = null;
		?>
	</tbody>
</table>

</body>
</html>