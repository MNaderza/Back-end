<?php
if(!isset($_POST['nazwa']))
{
	header('Location: zaloguj.php');
	exit();
}
session_start();
require_once('connect.php');
$db=get_db();
$nick=$_POST['nazwa'];
$haslo=$_POST['haslo'];
$uzytkownicy=$db->uzytkownicy->find();
foreach($uzytkownicy as $uzytkownik)
{
	if($uzytkownik['nazwa']==$nick && password_verify($haslo, $uzytkownik['haslo']))
	{
		$_SESSION['zalogowany']=true;
		$_SESSION['nick']=$nick;
		$_SESSION['login_error']='<center><span class="error">Zalogowałeś się!</span></center>';
		header('Location: index.php');
		exit();
	}
}
$_SESSION['login_error']='<center><span class="error">Błędny login lub hasło</span></center>';
header('Location: zaloguj.php');
?>
