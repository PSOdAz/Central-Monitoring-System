<html>
<head>
	<title>PHP Central Monitoring System</title>
<!-- define some style elements-->
<style>
label,a
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 12px;
}
</style>
</head>

<body>
<?php require_once('/config/core.php'); ?>

<?php
	if(isset($_POST['formSubmit']))
	{
		$aCountries = $_POST['formCountries'];
		if(!isset($aCountries))
		{
			echo("<p>You didn't select any countries!</p>\n");
		}
		else
		{
			$nCountries = count($aCountries);
			echo("<p>You selected $nCountries countries: ");
			for($i=0; $i < $nCountries; $i++)
			{
				echo($aCountries[$i] . " ");
			}
			echo("</p>");
		}
	}
?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
	<label for='formCountries[]'>Select the countries that you have visited:</label><br>
	<select multiple="multiple" name="formCountries[]">
		<option value="CRS1">CRS1</option>
		<option value="PANINI">PANINI</option>
		<option value="INSIEME">INSIEME</option>
		<option value="ISBU">ISBU</option>
		<option value="GSR">GSR</option>
		<option value="PLUTO">PLUTO</option>
		<option value="PASS">PASS</option>
	</select><br>
	<input type="submit" name="formSubmit" value="Submit" >
</form>

<?php
	//dbo.CHAMBER_STATUS| ServerIP | Remark | ServerName | Status | DateTime
   	$sqlChamberStatus = "SELECT CHAMBER_SERVER.* FROM CHAMBER_STATUS WHERE Status='PASS'";
   	$stmt = $conn->prepare($sqlChamberStatus);
   	$stmt->execute();
    
?>

<table width="600" border="1">
	<tr>
		<th width="91">  <div align="center">ServerIP </div></th>
    	<th width="98">  <div align="center">Remark </div></th>
    	<th width="198"> <div align="center">ServerName </div></th>
    	<th width="97">  <div align="center">Status </div></th>
    	<th width="300"> <div align="center">DateTime </div></th>
  	</tr>

	<?php while($result = $stmt->fetch( PDO::FETCH_ASSOC )) { ?>
  	<tr>
    	<td align="center"><?php echo $result["ServerIP"];?></div></td>
    	<td align="center"><?php echo $result["Remark"];?></td>
    	<td align="center"><?php echo $result["ServerName"];?></div></td>
    	<td align="center"><?php echo $result["Status"];?></td>
    	<td align="center"><?php echo $result["DateTime"];?></td>

  	</tr>
	<?php } ?>
</table>

<?php
	/// Free statement and connection resource
	$conn = null;
?>

</body>
</html>