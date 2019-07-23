<html>
<head>
<title>M30W Factory</title>
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
$username='chal1';
$password='M30Wworld';
$dbname='chal1';
try{
	$conn = new PDO('mysql:host=127.0.0.1;dbname=chal1',$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo "<div class='container' style='padding: 10px;'>
		<h2>website crashed</h2>
		<h2>report to admin</h2>
	</div>";
	die('');
}
$stmt = $conn->prepare('SELECT pwd FROM account WHERE usr=:usr');
$stmt->execute(['usr' => 'test1']);
$test1pwd = $stmt->fetch()[0];
$stmt->execute(['usr' => 'test2']);
$test2pwd = $stmt->fetch()[0];

session_start();
$usr = $_POST['username'];
$pwd = $_POST['password'];
if(isset($_SESSION['valid'])&&($_SESSION['valid']==true)){
	$usr = $_SESSION['username'];
	$pwd = 'dummy';
}
if(!isset($usr)&&!isset($pwd)){
	echo "<div class='container' style='padding: 10px;'>
		<h2>Account Login</h2>
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
	</div>
	<br>
	<h4>Credentials:</h4>
	<br>
	Username : test1,   Password : ".$test1pwd."
	<br>
	Username : test2,   Password : ".$test2pwd."
	<br>";
}
else if(preg_match('/[^a-zA-Z0-9]/',$usr)||preg_match('/[^a-zA-Z0-9]/',$pwd)){
	echo "<div class='container' style='padding: 10px;'>
		<h2>Account Login</h2>
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
			<br>
			<br>
			<p>Error : only a-z,A-Z,0-9 allowed in username/password</p>
		</form>
	</div>
	<br>
	<h4>Credentials:</h4>
	<br>
	Username : test1,   Password : ".$test1pwd."
	<br>
	Username : test2,   Password : ".$test2pwd."
	<br>";
}
else{
	$stmt = $conn->prepare('SELECT id,pwd FROM account WHERE usr=:usr');
	$stmt->execute(['usr' => $usr]);
	$reply = $stmt->fetch();
	$tid=$reply[0];
	$tpwd=$reply[1];
	if(!(isset($_SESSION['valid'])&&$_SESSION['valid']==true)&&!($pwd===$tpwd)){
		echo "<div class='container' style='padding: 10px;'>
			<h2>Account Login</h2>
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
				<br>
				<br>
				<p>Error : incorrect username or password</p>
			</form>
		</div>
		<br>
		<h4>Credentials:</h4>
		<br>
		Username : test1,   Password : ".$test1pwd."
		<br>
		Username : test2,   Password : ".$test2pwd."
		<br>";
	}
	else{
		$_SESSION['valid']='true';
		$_SESSION['timeout']=time();
		$_SESSION['username']=$usr;
		$cookie_name='user';
		$cookie_value=$tid;
		setcookie($cookie_name,$cookie_value,time()+86400,'/');
		$profile = $_GET['profile'];
		$logout = $_GET['logout'];
		if(isset($logout)&&$logout==1){
			unset($SESSION['valid']);
			unset($SESSION['timeout']);
			unset($SESSION['username']);
			session_destroy();
			header('location:index.php');
		}
		if(isset($profile)&&$profile==1){
			echo "<h2>Welcome, ".$usr."</h2>
			<br>
			<br>
			<a href='index.php'>Home</a>
			&nbsp;
			<a href='?profile=1'>Update Your Profile</a>
			&nbsp;
			<a href='?logout=1'>Logout</a>
			<div class='container' style='padding: 10px;'>
				<h2>Update Your Profile</h2>
				<form class='form-inline' action method='POST'>
					<div class='form-group'>Username: 
						<br>
						<input class='form-control' type='text' name='user_name' value='".$usr."' disable readonly>
					</div>
					<br>
					<br>
					<div class='form-group'>New Password:
						<br>
						<input class='form-control' type='password' name='pass_word' placeholder='New Password'>
					</div>
					<br>
					<br>
					<button type='submit' class='btn btn-success'>Update</button>
				</form>
			</div>";
			$npwd = $_POST['pass_word'];
			if(isset($npwd)){
				if(preg_match('/[^a-zA-Z0-9]/',$npwd)){
					echo "<br>
					<br>
					<p>Error : only a-z,A-Z,0-9 allowed in username/password</p>";
				}
				else{
					$id = $_COOKIE['user'];
					$stmt = $conn->prepare('SELECT * FROM account WHERE id=:id');
					$stmt->execute(['id' => $id]);
					$reply = $stmt->fetch();
					if(isset($reply)){
						$stmt = $conn->prepare('UPDATE account SET pwd=:pwd WHERE id=:id');
						$stmt->execute(['pwd'=>$npwd,'id'=>$id]);
					}
				}
			}
		}
		else{
			if($usr==='M30W'){
				echo "<h2>Welcome, M30W</h2>
					<br>
					<br>
					<p>here is your flag : flag{YummY_Yummy_C00ki3s_<3}</p>";
			}
			else{
				echo "<h2>Welcome, ".$usr."</h2>
					<br>
					<br>
					<a href='index.php'>Home</a>
					&nbsp;
					<a href='?profile=1'>Update Your Profile</a>
					&nbsp;
					<a href='?logout=1'>Logout</a>";
			}
		}
	}
}

?>

</body>
</html>
