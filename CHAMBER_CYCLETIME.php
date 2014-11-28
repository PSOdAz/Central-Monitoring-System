<html>
<body>
<?php require_once('/config/core.php');

	//CHAMBER_CYCLETIME| ServerName LastCycle LastUpdate
   	$sqlChamberStatus = "SELECT * FROM dbo.CHAMBER_CYCLETIME";
   	$stmt = $conn->prepare($sqlChamberStatus);
   	$stmt->execute();
?>

<table id="example" class="display" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>ServerName</th>
			<th>LastCycle</th>
			<th>LastUpdate</th>
    	</tr>
   	</thead>
	
   	<tfoot>
		<tr>
    		<th>ServerName</th>
    		<th>LastCycle</th>
    		<th>LastUpdate</th>
    	</tr>   		
	</tfoot>

	<tbody>
		<?php while($result = $stmt->fetch( PDO::FETCH_ASSOC )) { ?>
		<tr>
			<td><?php echo $result["ServerName"];?></td>
			<td><?php echo $result["LastCycle"];?></td>
			<td><?php echo $result["LastUpdate"];?></td>
		</tr>
		<?php }
	
		// Free statement and connection resource
		$conn = null;
		?>
	</tbody>
</table>

</body>
</html>