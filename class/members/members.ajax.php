<?php
session_start();

if (isset($_POST['login']) && isset($_POST['password']) && !isset($_SESSION['pseudo']))
{
	$_SESSION['pseudo'] = '1';
	echo "1";
	
}
else
{
	echo "0";
}

?>