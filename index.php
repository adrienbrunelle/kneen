<?php session_start(); 

include 'header.php';

?>


<div id="middle">
<div id="alerte">Erreur !</div>
<div id="ok">Ok !</div>




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
		
	default:
		include 'home.php';
		break;
}
?>
	
	
</div>


</div>

<?php 
include 'footer.php';
?>
