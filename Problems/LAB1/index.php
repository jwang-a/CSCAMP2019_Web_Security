<?php
$cookie_name='What_does_the_cat_say?';
$cookie_value='????';
setcookie($cookie_name,$cookie_value,time()+86400,'/');
?>

<html>
<body>
<?php
if(!isset($_COOKIE[$cookie_name])){
	echo "Hmmm?";
}
else if($_COOKIE[$cookie_name]==='M30W'){
	echo "flag{W0W_4_C00K13_S7EAL3R!!!}";
}
else{
	echo "Hi, nice to meet you.";
}
?>
<!--obviously, a cat says 'M30W', chill and have a cookie-->
</body>
</html>
