<?php
$direc = $_GET['direc'];
if(!isset($direc)){
	die('');
}
if(preg_match('/[^{a-z;A-Z?}\/$]/',$direc)){
	die('whoops');
}
if(preg_match('/[flag]/',$direc)){
	die('no you cant');
}
if(isset($direc)){
	system('ls '.$direc);
}
?>
