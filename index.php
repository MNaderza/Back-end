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

<center>WITAMY NA STRONIE!</center></br></br>
<center><a href="zaloguj.php">Zaloguj się</a></center></br></br>
<center><a href="zarejestruj.php">Zarejestruj</a></center></br></br>
<center><a href="form.php">Wrzuć swoją grafikę</a></center></br></br>
<center><a href="gallery.php">Przejdź do galerii</a></center></br></br>
<center><a href="gallery_l.php">Twoje zaznaczone zdjęcia</a></center></br></br>


</body>
</html>