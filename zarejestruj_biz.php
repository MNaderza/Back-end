<?php
session_start();
require_once('connect.php');
$db=get_db();
if(!isset($_POST['nazwa'])||!isset($_POST['haslo'])||!isset($_POST['haslo2']))
{
	header('Location: zarejestruj.php');
	exit();
}
$nick=$_POST['nazwa'];
$haslo=$_POST['haslo'];
if(strlen($nick)<2||strlen($haslo)<2||strlen($_POST['haslo2'])<2)
{
	$_SESSION['konto_error']='<center><span class="error">Nazwa i hasło muszą mieć przynajmniej 2 znaki</span></center>';
	header('Location: zarejestruj.php');
	exit();
}
if($haslo!=$_POST['haslo2'])
{
	$_SESSION['konto_error']='<center><span class="error">Oba hasła muszą być jednakowe</span></center>';
	header('Location: zarejestruj.php');
	exit();
}
$haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
$uzytkownicy=$db->uzytkownicy->find();
foreach($uzytkownicy as $uzytkownik)
{
	if($uzytkownik['nazwa']==$nick)
	{
	$_SESSION['konto_error']='<center><span class="error">Ta nazwa użytkownika jest już zajęta</span></center>';
	header('Location: zarejestruj.php');
	exit();
	}
}
$up_nick=[
'nazwa'=>$nick,
'haslo'=>$haslo_hash,
];
$db->uzytkownicy->insert($up_nick);
header('Location: index.php');

?>