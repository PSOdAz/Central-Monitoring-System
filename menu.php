<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>PHP Central Monitoring System</title>
	
<!-- STR Menu Start --> 
    <!-- CSS For The Menu -->
    <link rel="stylesheet" href="jQuery/directory-tree/style.css" />
    
	<!-- Add jQuery From the Google AJAX Libraries --> 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 
	<!-- jQuery Color Plugin --> 
	<script type="text/javascript" src="jQuery/directory-tree/jquery.color.js"></script> 
	 
	<!-- Import The jQuery Script --> 
	<script type="text/javascript" src="jQuery/directory-tree/jMenu.js"></script> 
<!-- END Menu Start --> 
	
</head> 	
<body>
	
<!-- Menu Start --> 
<div id="jQ-menu"> 
<?php
	$path = "./";
	function createDir($path = './') {
		if ($handle = opendir($path)) {
			echo "<ul>";
			
			while (false !== ($file = readdir($handle))) {
				if (is_dir($path.$file) && $file != '.' && $file !='..')
					printSubDir($file, $path, $queue);
				else if ($file != '.' && $file !='..')
					$queue[] = $file;
			}
			
			printQueue($queue, $path);
			echo "</ul>";
		}
	}
	
	function printQueue($queue, $path) {
		foreach ($queue as $file) {
			printFile($file, $path);
		} 
	}
	
	function printFile($file, $path) {
		echo "<li><a target='mainwindow' href=\"".$path.$file."\">$file</a></li>";
	}
	
	function printSubDir($dir, $path) {
		echo "<li><span class=\"toggle\">$dir</span>";
		createDir($path.$dir."/");
		echo "</li>";
	}
	createDir($path);
?>

</div> 
<!-- End Menu --> 
 
</body> 
</html> 