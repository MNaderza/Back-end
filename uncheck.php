<?php
	session_start();
	require_once('connect.php');
	$db=get_db();
	$obrazy=$db->obrazy->find();
	foreach($obrazy as $obraz)
	{
		if(isset($_POST[$obraz['tytul']]))
		unset($_SESSION[$obraz['tytul']]);
	}
	header('Location:gallery_l.php');
?>