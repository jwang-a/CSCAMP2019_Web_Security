<html>
<head>
<title>The Cat Without A Name</title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<link rel='stylesheet' type='text/css' href='main.css'>
</head>
<body>
<?php
$servername='localhost';
$username='chal5';
$password='M30Wworld';
$dbname='chal5';
try{
	$conn = new PDO('mysql:host=127.0.0.1;dbname=chal5',$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo "<div class='container' style='padding: 10px;'>
		<h2>website crashed</h2>
		<h2>report to admin</h2>
	</div>";
	die('');
}
echo "<div class='container' style='padding: 10px;'>
	<h2>The Cat Without A Name</h2>
	<br>
	Once Upon a Time
	<br>
	There was a Cat who Wanted a Name...
	<br>
	<br>
	<form class='form-inline' action method='POST'>
		<div class='form-group'>
			<input class='form-control' type='text' name='name' placeholder='name'>
		</div>
		<button type='submit' class='btn btn-primary'>submit</button>
	</form>
</div>";

$name = $_POST['name'];
if(isset($name)){
	$stmt = $conn->prepare("SELECT FLAG from tHeM30WINGK1TTI3S WHERE C4TNaM4E='".$name."'");
	if(preg_match('/[^a-zA-Z0-9_]/',$name)){
		$stmt->execute();
		$res = $stmt->fetch()[0];
		if(isset($res)){
			echo 'So close, but only "a-z A-Z 0-9 _ are allowed"';
		}
		else{
			echo 'Wrong';
		}
	}
	else{
		$stmt->execute();
		$res = $stmt->fetch()[0];
		if(isset($res)){
			echo $res;
		}
		else{
			echo 'Wrong';
		}	
	}
}
echo "<br>
	<img src='./css_sr/meow.jpg'>"
?>
</body>
</html>
