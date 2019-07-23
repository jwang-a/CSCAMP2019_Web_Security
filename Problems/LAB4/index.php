<html>
<head>
</head>
<body>
<?php
$servername='localhost';
$username='lab4';
$password='M30Wworld';
$dbname='lab4';
try{
	$conn = new PDO('mysql:host=127.0.0.1;dbname=lab4',$username,$password);
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
	<h2>Can You Log In?</h2>
	<form class='form-inline' action method='POST'>
		<div class='form-group'>
			<input class='form-control' type='text' name='username' placeholder='Username'>
		</div>
		<br>
		<br>
		<div class='form-group'>
			<input class='form-control' type='password' name='password' placeholder='Password'>
		</div>
		<br>
		<br>
		<button type='submit' class='btn btn-primary'>Login</button>
	</form>
</div>";


$usr = $_POST['username'];
$pwd = $_POST['password'];

if(isset($usr)&&isset($pwd)){
	$stmt = $conn->prepare("SELECT flag FROM account WHERE usr='".$usr."' AND pwd='".$pwd."'");
	$stmt->execute();
	$reply = $stmt->fetch();
	$flag=$reply[0];
	echo $flag;
}
?>

</body>
</html>
