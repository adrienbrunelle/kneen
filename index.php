<?php 
session_start(); 
include 'header.php';
?>
	

  <div class="container">
   
  <div id="alerteok" style="display:none;" class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>OK</div>
<div id="alerte" style="display:none;" class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Erreur</div>


<?php

if (isset($_GET['p']))
	$page = $_GET['p'];
else 
	$page = 'home';

switch($page)
{
	case 'home':
		include 'home.php';
		break;
		
	case 'surveys':
		include 'surveys.php';
		break;
		
	case 'register':
		include 'register.php';
		break;
		
	case 'about':
		include 'about.php';
		break;
		
	default:
		include 'home.php';
		break;
}
?>
	


<?php 
include 'footer.php';
?>
