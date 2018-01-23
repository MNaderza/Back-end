<?php session_start();
if(isset($_SESSION['zalogowany']))
{
	header('Location: index_z.php');
	exit();
}
?>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div class="upload">
<form enctype="multipart/form-data" action="zaloguj_biz.php" 
		 method="post" >
	<input type="text" name="nazwa" placeholder="Nazwa"/></br></br>
	<input type="password" name="haslo" placeholder="Hasło"/></br></br>
	<input type="submit" value="wyślij" class="submit" />
</form>
</div>
<?php 
if(isset($_SESSION['login_error']))
{
	echo '</br>';
	echo $_SESSION['login_error'];
	unset($_SESSION['login_error']);
}
?>
<br/>
<br/>
<center><a href="gallery.php">Przejdź do strony galerii</a></center>
</body>
</html>