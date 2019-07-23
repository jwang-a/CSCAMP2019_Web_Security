<?php
$payload = $_GET['here_is_your_payload'];
$pwd = $_GET['a_secret_str'];
if((!isset($payload)) || (!isset($pwd)) || !($pwd==='smokingcatseveryday')){
	die('');
}
$cookie_name='admin';
$cookie_value='flag{W0W_Y0U_G0T_A_SCR1PT4BLE_K1TTY!}';
setcookie($cookie_name,$cookie_value,time()+86400,'/');
echo "<html>
	<body>
	<img src='".$payload."'>
	</body>
	</html>";
?>

