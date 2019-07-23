<html>
<head>
<title>Cat Lovers</title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<link rel='stylesheet' type='text/css' href='main.css'>
</head>
<body>
<?php
echo "<div class='container' style='padding: 10px'>
	<h2>Cat Lovers</h2>
	<br>
	May I see your cat? Please.
	<br>
	<br>
	<form class='form-inline' action method='POST'>
		<div class='form-group'>
			<input class='form-control' type='text' name='link' placeholder='link'>
		</div>
		<button type='submit' class='btn btn-primary'>submit</button>
	</form>";

if(isset($_POST['link'])){
	$link = $_POST['link'];
	$linkb = base64_encode($link);
	echo "<br>
		<img src='".$link."'>
		<br>";
	system('python3 /tmp/admin.py '.$linkb.' smokingcatseveryday');
}


echo "</div>";
?>
