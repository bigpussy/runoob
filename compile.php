<?php
include ('settings.php'); 
$settings = new Settings_PHP;
$settings->load('config.php');
$compilers = $settings->get('compiler');
$thisCompiler;
foreach($compilers as $value){
    if($value["code"] == $_POST['language']){
        $thisCompiler = $value;
    }
}

$myfile = fopen("main.py", "w") or die("Unable to open file!");
$txt = $_POST['code'];
fwrite($myfile, $txt);
fclose($myfile);



$pythonPath = $thisCompiler["location"];


exec($pythonPath.' main.py 2>&1', $output, $return_val);

$result = '';

foreach ($output as $k=>$v) {
    $result = $result.$v."\n";
}


header('Content-Type:application/json; charset=utf-8');


$arr = array('output'=>$result,'errors'=>"\n");

exit(json_encode($arr));


?>
