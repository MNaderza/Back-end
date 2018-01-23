<?php session_start();
if(isset($_SESSION['zalogowany']))
{
	unset($_SESSION['zalogowany']);
	unset($_SESSION['nick']);
}
header('Location:index.php');
?>
	