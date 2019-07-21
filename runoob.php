<?php 
$myfile = fopen("main.py", "w") or die("Unable to open file!");
$txt = $_POST['program'];
fwrite($myfile, $txt);
fclose($myfile);

$pythonPath = 'C:\ProgramData\Anaconda3\python.exe';

?>

<html>
	<body>
	<form action="runoob.php" method="post">
		<textarea rows="10" cols="100" name="program"><?php echo htmlspecialchars($_POST['program']); ?></textarea>
		<p><input type="submit" /></p>
	</form>
	
	<?php 
	exec('C:\ProgramData\Anaconda3\python.exe main.py', $output);
	foreach ($output as $k=>$v) {
	    echo $v."<br />";
	}
	?>
	</body>
	
	
	
</html>