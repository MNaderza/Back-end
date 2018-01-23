<?php session_start();?>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div class="upload">
<form enctype="multipart/form-data" action="upload.php" 
		 method="post" >
	<center>Obraz</center>
	<input type="file" name="obrazek" /></br>
	<center>Znak wodny</center>
	<input type="file" name="watermark"/></br></br>
	<input type="text" name="tytul" placeholder="Tytuł"/></br></br>
	<input type="text" name="autor" placeholder="Autor"/></br></br>
	<input type="submit" value="wyślij" class="submit" />
</form>
</div>
<?php 
if(isset($_SESSION['file_error']))
{
	echo '</br>';
	echo $_SESSION['file_error'];
	unset($_SESSION['file_error']);
}
?>
<br/>
<br/>
<center><a href="gallery.php">Przejdź do galerii</a></center>
</body>
</html>