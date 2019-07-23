<?php
highlight_file('index.php');
$direc = $_GET['direc'];
if(!isset($direc)){
	die('');
}
if(preg_match('/[^a-zA-A0-9 ;\/]/',$direc)){
	die('whoops');
}
if(isset($direc)){
	echo(shell_exec('ls '.$direc));
}
?>
