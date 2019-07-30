<?php
$site = '/compiler/';

$compiler['python3']['location'] = '/usr/local/bin/python3';
$compiler['python3']['code'] = '1';
$compiler['python3']['name'] = 'python3';
$compiler['python3']['fileext'] = 'py';
$compiler['python3']['example'] = "#!/usr/bin/python\nprint(\"Hello World!\"); ";


$compiler['python']['location'] = '/usr/bin/python';
$compiler['python']['code'] = '2';
$compiler['python']['name'] = 'python';
$compiler['python']['fileext'] = 'py';
$compiler['python']['example'] = "#!/usr/bin/python\nprint \"Hello World!\"; ";


$compiler['nodejs']['location'] = '/usr/local/node-v10.9.0-linux-x64/bin/node';
$compiler['nodejs']['code'] = '3';
$compiler['nodejs']['name'] = 'nodejs';
$compiler['nodejs']['fileext'] = 'js';
$compiler['nodejs']['example'] = "console.log('Hello World!');";

$compiler['c']['location'] = '/usr/bin/rungcc';
$compiler['c']['code'] = '4';
$compiler['c']['name'] = 'c';
$compiler['c']['fileext'] = 'c';
$compiler['c']['example'] = "#include <stdio.h>\nvoid main(void)\n{\n	printf(\"Hello World!\");\n}";

$compiler['cpp']['location'] = '/usr/bin/runcpp';
$compiler['cpp']['code'] = '5';
$compiler['cpp']['name'] = 'c++';
$compiler['cpp']['fileext'] = 'cpp';
$compiler['cpp']['example'] = "#include <iostream>\nusing namespace std;\n\nint main()\n{\n	cout << \"Hello World!\";\n	return 0;\n}";

$compiler['kotlin']['location'] = '/usr/bin/runkt';
$compiler['kotlin']['code'] = '6';
$compiler['kotlin']['name'] = 'kotlin';
$compiler['kotlin']['fileext'] = 'kt';
$compiler['kotlin']['example'] = "fun main(args: Array<String>){\n	println(\"Hello World!\")\n}";

?>
