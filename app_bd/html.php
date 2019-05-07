<!--

<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script> 

<form action="" method="post">
	<textarea name="editor1"></textarea><br/>
	<input type="submit" name="" value="insert">
</form>

<?php
//if(isset($_POST['editor1'])){
//	echo $_POST['editor1'];
//}

?>

<textarea name="editor2"></textarea><br />//Set Data  
<input type="button" id="getData" name="getData" value="Get and Set Data" onclick="getData()" />  
<script>  
    CKEDITOR.replace('editor1');  
    CKEDITOR.replace('editor2');  
  
    function getData() {  
        //Get data written in first Editor   
        var editor_data = CKEDITOR.instances['editor1'].getData();  
        //Set data in Second Editor which is written in first Editor  
        CKEDITOR.instances['editor2'].setData(editor_data);  
    }  
</script>  
-->


<?php
if(isset($_POST['area2'])){
	echo $_POST['area2'];
	echo "<script> alert('".$_POST['area2']."'); </script>";
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