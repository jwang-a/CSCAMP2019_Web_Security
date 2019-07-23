<html>
<head>
	<title>More Cats?</title>
	<link rel='stylesheet' href='fonts.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
	<link rel='stylesheet' type='text/css' href='./main.css'>
</head>
<body>
<br>
<div class='container' style='padding: 10px;'>


<?php
ini_set('highlight.default','#dddddd; background-color: #000000');
ini_set('highlight.comment','#8080bb; background-color: #000000');
ini_set('highlight.html','#ffffff; background-color: #000000');
ini_set('highlight.keyword','#80bb80; background-color: #000000');
ini_set('highlight.string','#bb8000; background-color: #000000');
show_source('run.php');
echo "<br><p>";
include('run.php');
echo "</p>";
echo "<br>";
?>

</div>
</body>
</html>
