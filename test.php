<?php 
include ('settings.php'); 
$settings = new Settings_PHP;
$settings->load('config.php');
echo "\n";
$arr = $settings->get('compiler');
$num = count($arr);



foreach($arr as $value){
    echo ($value['location']);
}
?>