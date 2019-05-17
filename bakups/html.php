<?php
if(isset($_POST['area2'])){
	manejaString($_POST['area2']);
}

function manejaString($string){
	$VAR = str_replace("'",'"',$string);
	$urls = extraerURLs($VAR);
	echo "<script>alert('".$VAR."');</script>";
	foreach($urls as $url){
		echo $url."<br>";
		
		//echo $url+"<br>";
		//$VAR = str_replace($url,"https://1023654798252", $VAR);
		//echo "<script>alert('".$VAR."');</script>";
	}
//echo $VAR;
}
function extraerURLs($cadena){
	$regex = '/https?\:\/\/[^\" ]+/';
	preg_match_all($regex, $cadena, $partes);
	return ($partes[0]);
}

function guardarImagenesServidor(){
	function recibe_imagen ($url_origen,$archivo_destino){  
		$mi_curl = curl_init ($url_origen);  
		$fs_archivo = fopen ($archivo_destino, "w");  
		curl_setopt ($mi_curl, CURLOPT_FILE, $fs_archivo);  
		curl_setopt ($mi_curl, CURLOPT_HEADER, 0);  
		curl_exec ($mi_curl);  
		curl_close ($mi_curl);  
		fclose ($fs_archivo);  
	}  

	recibe_imagen("https://i.imgur.com/plA0JU5.png","C:/wamp/www/SistemaVersion1_0_0/imagen.png"); 

}
guardarImagenesServidor();


?>

<div id="sample">


	<script type="text/javascript" src="//localhost/SistemaVersion1_0_0/app_bd/elemento.js"></script> 
	<script type="text/javascript">
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
		window.onload = function() {

		}
	</script>

	<h4>
		Second Textarea
	</h4>

	<form name= "formulario"action="" method="post">
		<textarea name="area2" style="width: 100%;">
			<img src="//localhost/SistemaVersion1_0_0/app_bd/Captura.PNG"/>
			<br>
			<img src="//localhost/SistemaVersion1_0_0/app_bd/Captura.PNG"/>
			<br>
			<a>jer</a>
		</textarea>
		<input type="submit" name="" value="insert">
		<button type="button" onclick="myFunction()">Click me</button>
	</form>

	<br/>

</div>



<p id="demo"></p>
<script type="text/javascript">

</script>



<textarea id="alltext">
	

</textarea>

<ol>
    <li onclick="addText('Hello')">Hello</li>
    <li onclick="addText('World')">World</li>
    <li onclick="addText('Earthlings')">Earthlings</li>
</ol>

<script>
    //var Alltext = "";
    function addText(text) {
        Alltext += text
        document.getElementById("alltext").text = "Alltext";
        alert( document.getElementById("alltext").value);
    }

</script>