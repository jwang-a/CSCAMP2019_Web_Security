<html>
<head>
<title>Vampire Cat</title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<link rel='stylesheet' type='text/css' href='./main.css'>
</head>
<body>
<?php
$norm_char = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','/','.','-');
$flip_char = array('ɐ','q','ɔ','p','ǝ','ɟ','ƃ','ɥ','ᴉ','ɾ','ʞ','l','ɯ','u','o','d','b','ɹ','s','ʇ','n','ʌ','ʍ','x','ʎ','z','/','˙','-');
echo "<div class='container' style='padding: 10px;'>
	<h2>Welcome to the Castle of the Vampire Cat</h2>
	<br>
	<p>˙uʍop ǝpᴉsdn sƃuᴉɥʇ op oʇ ǝʞᴉl ǝM</p>
	<br>
	<p>¿oƃ oʇ ǝʞᴉl noʎ plnoʍ ǝɹǝɥM</p>
	<br>
	<form class='form-inline' action method='GET'>
		<div class='form-group'>
			<input class='form-control' type='text' name='room' placeholder='Room'>
		</div>
		<button type='submit' class='btn btn-primary'>ʇᴉɯqnS</button>
	</form>
	<a href='.?room=ʎqqol'>ʎqqol</a>
</div>
<!--note : ../the-vamp-cats-tavern/flag-->
";

$room = $_GET['room'];
if(isset($room)){
	$len = strlen($room);
	$filename = '';
	for($i=$len-1;$i>=0;$i--){
		$unit = '';
		if(preg_match('/[^a-z\-\/]/',$room[$i])){
			//echo '!';
			$i--;
			$unit = substr($room,$i,2);
		}
		else{
			$unit = $room[$i];
		}
		$offset = array_search($unit,$flip_char);
		if($offset===FALSE){
			$filename = $filename.'bad';
		}
		else{
			$filename = $filename.$norm_char[$offset];
		}
	}
	include($filename);
	echo "<br>";
	echo "<br>";
}
?>
<img src='./css_sr/meow.jpg'>
</body>
</html>
