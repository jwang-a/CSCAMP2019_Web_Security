<html>
<head>
<title>Counting Cats</title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<link rel='stylesheet' type='text/css' href='./main.css'>
</head>
<body>
<?php
echo "<div class='container' style='padding: 10px;'>
	<h2>Counting Cats</h2>
	<br>
	<p>Cats have nine lives</p>
	<p>And I have nine cats</p>
	<p>or maybe ten?</p>
	<p>Can you see them?</p>
	<br>
	<form class='form-inline' action method='GET'>
		<div class='form-group'>
			<input class='form-control' type='text' name='pwd' placeholder='password'>
		</div>
		<button type='submit' class='btn btn-primary'>Submit</button>
	</form>";

$pwd = $_GET['pwd'];
if(isset($pwd) && $pwd==="Lets_play_a_game_I_hide_you_seek"){
	echo "<p>flag{S0M3T1MES_C4TS_C4N_B3_1NVlSIBL3}</p>";
	echo "<img src='./css_sr/phantomcat.jpg' height='250px' width='300px'>";
}
else{
	echo "<img src='./css_sr/cat.jpg' height='250px' width='300px'>";
}
?>
</div>
</body>
</html>
