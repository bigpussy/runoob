<?php
include ('settings.php'); 
$settings = new Settings_PHP;
$settings->load('config.php');

$myfile = fopen("main.py", "w") or die("Unable to open file!");
$txt = $_POST['code'];
fwrite($myfile, $txt);
fclose($myfile);

$pythonPath = $settings->get('compiler.python3.location');


exec($pythonPath.' main.py 2>&1', $output, $return_val);

$result = '';

foreach ($output as $k=>$v) {
    $result = $result.$v."\n";
}


header('Content-Type:application/json; charset=utf-8');


$arr = array('output'=>$result,'errors'=>"\n");

exit(json_encode($arr));


?>
