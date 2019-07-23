<html>
<head>
	<title>Not Today, My Dear Cat</title>
	<link rel='stylesheet' href='fonts.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
	<link rel='stylesheet' type='text/css' href='./main.css'>
</head>
<body>
<br>
<div class='container' style='padding: 10px;'>
<br>
<br>
<?php
$sent=array("Finally, after centuries of observing, we've found evidence of cats talking in their own language.","However, researchers of M30W Force just isn't bright enough to translate it.","So we are now openly offerring a bounty to those who can help interpret the tongue of those adorable furballs.","I'm sure you won't mind giving it a try? Would you?");
for($i=0;$i<4;$i++){
	$dom = new DOMDocument('1.0');
	$par = $dom->createElement('p',$sent[$i]);
	$attr = $dom->createAttribute('style');
	$attr->value = 'font-family: Courier'.rand(2,4);
	$par->appendChild($attr);
	$dom->appendChild($par);
	echo $dom->saveHTML();
}
?>
<br>
<?php
$sent=array("VG'F_GVZR_GB_PBADHRE_GUR_JBEYQ","RG'H_GRNV_GL_XLMJFVI_GSV_DLIOW","FQ'P_QFJA_QL_BLKNTAO_QDA_VLOIR");
$dom = new DOMDocument('1.0');
$par = $dom->createElement('p',$sent[rand(0,2)]);
$dom->appendChild($par);
echo $dom->saveHTML();
?>
</div>
<div>
<form class='form-inline' action='index.php' method='POST'>
	<div class='form-group'>
		<input class='form-control' type='text' name='trans' maxlength='40' placeholder='translation'>
	</div>
	<button type='submit' class='btn btn-primary'>Translate</button>
</form>
<?php
$trans = $_POST['trans'];
if(isset($trans)){
       	if($trans==="IT'S_TIME_TO_CONQUER_THE_WORLD"){
		echo '<p>flag{L00K5_C4N_B3_D3CIEVlNG_XDD}</p>';
	}
	else{
		echo '<p>NOP</p>';
	}
}
?>
<img src='./css_sr/meow.jpg'>
</div>
</body>
</html>
