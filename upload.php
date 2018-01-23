<?php
	require_once('connect.php');
	session_start();
	$db=get_db();
	if(!isset($_FILES['obrazek']))
	{
		header('Location: index.php');
		exit();
	}
	if(is_uploaded_file($_FILES['obrazek']['tmp_name']))
	{
		if(($_FILES['obrazek']['type']!="image/jpeg" && $_FILES['obrazek']['type']!="image/png" )|| ($_FILES['watermark']['type']!="image/jpeg" && $_FILES['watermark']['type']!="image/png"))
		{
			$_SESSION['file_error']='<center><span class="error">Podane pliki muszą być zapisane w formacie JPG lub PNG</span></center>';
			header('Location: form.php');
			exit();
		}
		if($_FILES['obrazek']['size']>1048576)
		{
			$_SESSION['file_error']='<center><span class="error">Rozmiar pliku nie może przekraczać 1MB</span></center>';
			header('Location: form.php');
			exit();
		}
		if(ctype_alnum($_POST['tytul'])==false || ctype_alnum($_POST['autor'])==false)
		{
			$_SESSION['file_error']='<center><span class="error">Tytuł oraz autor mogą składać się jedynie z liter(bez polskich znaków)</span></center>';
			header('Location: form.php');
			exit();
		}
		$tytuly=$db->obrazy->find();
		foreach($tytuly as $tytul)
		{
			if($tytul['tytul']==$_POST['tytul'])
			{
				$_SESSION['file_error']='<center><span class="error">Obraz o podanym tutule już istnieje</span></center>';
				header('Location: form.php');
				exit();
			}
		}
		if($_FILES['obrazek']['type']=="image/jpeg")
		{
			include('up_jpeg.php');
			upload();
		}
		else
		{
			include('up_png.php');
			upload();
		}
	}
	else
	{
		$_SESSION['file_error']='<center><span class="error">Błąd serwera, plik nie został zamieszczony</span></center>';
		header('Location: form.php');
		exit();
	}
	$_SESSION['file_error']='<center><span class="correct">Plik został zamieszczony na serwerze</span></center>';
	return true;
?>