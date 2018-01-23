<?php session_start(); 
if(!isset($_SESSION['zalogowany']))
{
	header('Location: index.php');
	exit();
}
?>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<center>WITAMY NA STRONIE,   <?php echo $_SESSION['nick']?></center></br></br>
<center><a href="wyloguj.php">Wyloguj się</a></center></br></br>
<center><a href="form.php">Wrzuć swoją grafikę</a></center></br></br>
<center><a href="gallery.php">Przejdź do galerii</a></center></br></br>
<center><a href="gallery_l.php">Twoje zaznaczone zdjęcia</a></center></br></br>
<center><a href="wyszukaj.php">Wyszukaj zdjęcie</a></center></br></br>

</body>
</html>