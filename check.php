<?php
	session_start();
	require_once('connect.php');
	$db=get_db();
	$obrazy=$db->obrazy->find();
	foreach($obrazy as $obraz)
	{
		if(isset($_POST[$obraz['tytul']]))
		$_SESSION[$obraz['tytul']]=true;
		
	}
	header('Location:gallery.php');
?>