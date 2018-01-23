<?php
require_once('connect.php');
session_start();
function obrazki()
{
	$db=get_db();
	$obrazy=$db->obrazy->find();
	foreach($obrazy as $obraz)
	{
		$img = '/images-m/'.$obraz['tytul'];
		echo '<a href="./images-w/'.$obraz['tytul'].$obraz['typ'].'" target="blank"><img src=".'.$img.$obraz['typ'].'" title="'.$obraz['tytul'].'" /></a>';
		echo 'Tytuł: '.$obraz['tytul'].'   Autor: '. $obraz['autor'];
		if(isset($_SESSION[$obraz['tytul']]))
			echo '<input type="checkbox" name="'.$obraz['tytul'].'"checked/> Zaznacz zdjęcie</br>';
		else
			echo '<input type="checkbox" name="'.$obraz['tytul'].'"/> Zaznacz zdjęcie</br>';
	}
}
 
 
?>