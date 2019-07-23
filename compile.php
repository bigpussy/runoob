<?php

$myfile = fopen("main.py", "w") or die("Unable to open file!");
$txt = $_POST['code'];
fwrite($myfile, $txt);
fclose($myfile);

$pythonPath = 'python';


exec($pythonPath.' 2>&1', $output, $return_val);

$result = '';

foreach ($output as $k=>$v) {
    $result = $result.$v;
}


header('Content-Type:application/json; charset=utf-8');


$arr = array('output'=>$result,'errors'=>"\n");

exit(json_encode($arr));


?>
