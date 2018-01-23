<?php
$db=get_db();
function upload()
{
	$photo = $_FILES['obrazek']['tmp_name'];
	$image = imagecreatefrompng($photo);
	$width = imagesx($image);
	$height = imagesy($image);
	$small = imagecreatetruecolor(200,200);
	imagecopyresampled($small,$image,0,0,0,0,200,200,$width,$height);
	if($_FILES['watermark']['type']=="image/png")
		$watermark = imagecreatefrompng($_FILES['watermark']['tmp_name']);
	else
		$watermark = imagecreatefromjpeg($_FILES['watermark']['tmp_name']);
	$watermark_width = imagesx($watermark);
	$watermark_height = imagesy($watermark);
	$wm=imagecreatetruecolor(100,100);
	imagecopyresampled($wm,$watermark,0,0,0,0,100,100,$watermark_width,$watermark_height);
	$watermark_width = 100;
	$watermark_height = 100;
	imagecopymerge($image, $wm, (($width - $watermark_width))-10, (($height - $watermark_height))-10, 0, 0, $watermark_width, $watermark_height, 100);
	if(!move_uploaded_file($_FILES['obrazek']['tmp_name'], './images/'.$_POST['tytul'].'.png'))
	{
		$_SESSION['file_error']='<center><span class="error">Błąd serwera, plik nie został skopiowany do katalogu</span></center>';
		header('Location: form.php');
		exit();
	}
		imagepng($image, './images-w/'.$_POST['tytul'].'.png',100);
		imagepng($small, './images-m/'.$_POST['tytul'].'.png',100);

	$db=get_db();
	$obraz=[
	'tytul'=>$_POST['tytul'],
	'autor'=>$_POST['autor'],
	'typ'=>'.jpg',
	];
	$db->obrazy->insert($obraz);
	header('Location: form.php');
}
?>