<?php
if(isset($_POST['area2'])){
	manejaString($_POST['area2']);
}

function manejaString($string){
	$VAR = str_replace("'",'"',$string);
	$urls = extraerURLs($VAR);
	echo "<script>alert('".$VAR."');</script>";
	foreach($urls as $url){
		//echo $url;
		$VAR = str_replace($url,"https://1023654798252", $VAR);
		//echo "<script>alert('".$VAR."');</script>";
	}
echo $VAR;
}
function extraerURLs($cadena){
	$regex = '/https?\:\/\/[^\" ]+/';
	preg_match_all($regex, $cadena, $partes);
	return ($partes[0]);
}


?>

<div id="sample">
	<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	</script>

	<h4>
		Second Textarea
	</h4>
	<form action="" method="post">
		<textarea name="area2" style="width: 100%;"></textarea>
		<input type="submit" name="" value="insert">
	</form>
	<br/>

</div>
