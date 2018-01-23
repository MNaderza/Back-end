<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
	header('Location: index.php');
	exit();
}

require_once 'connect.php';

$szukane = $_GET['szukane'];
$dlugosc =strlen($_GET['szukane']);
$miejsce = opendir('images-m');
if($dlugosc>0)
{
while ( $file = readdir( $miejsce ) )
	{
		$db=get_db();
		$baza=$db->obrazy->find();
		$nazwa = basename('images-m/'.$file);
		$typ_obrazka = pathinfo($nazwa , PATHINFO_EXTENSION);
		$dlug = strlen($nazwa);
		$nazwa2=substr($nazwa,0,$dlugosc);
		if($nazwa2==$szukane)
		{
			$notype=substr($nazwa,0,$dlug-4);
			foreach($baza as $buzyt)
			{
				if($notype==$buzyt['tytul'])
				{
				echo '<a href="./images-w/'.$nazwa.'" target="blank"><img src="./images-m/'.$nazwa.'" title="'.$nazwa.'" /></a>';
				echo 'Tytuł: '.$nazwa;
				if(isset($_SESSION[$notype]))
					echo '<input type="checkbox" name="'.$notype.'" checked/> Zaznacz zdjęcie</br>';
				else
					echo '<input type="checkbox" name="'.$notype.'"/> Zaznacz zdjęcie</br>';
				}
			}
		}
	}
}
closedir($miejsce); 
?>