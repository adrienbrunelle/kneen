<?php
session_start(); 
include 'members.php';

if (isset($_POST['email']) && isset($_POST['password']) && !isset($_SESSION['userId']))
{
	if (Members::login($_POST['email'],$_POST['password']))
		echo "1";
	else 
		echo "0";
	
}
else
	echo "0";


?>