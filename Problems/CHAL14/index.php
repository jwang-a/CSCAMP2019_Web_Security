<html>
<head>
<title>Octo Kitty</title>
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
	<h2>Octo Kitty</h2>
	<br>
	<p>The kitty has killed everyone who knows the admin password</p>
	<p>Now my website should be safe</p>
	<br>
	<form class='form-inline' action method='GET'>
		<div class='form-group'>
			<input class='form-control' type='text' name='pwd' placeholder='password'>
		</div>
		<button type='submit' class='btn btn-primary'>Submit</button>
	</form>";

$pwd = $_GET['pwd'];
if(isset($pwd) && $pwd==="4_ADM1NlSTRAT0R5_LA5T_W0RD_B3F0R3_H1S_D00M"){
	echo "<p>flag{R3ST_1N_P3ACE_MY_D3AR_FR13ND}</p>";
}
?>
<img src='./css_sr/meow.jpg' height='300px' width='300px'>
</div>
</body>
</html>
