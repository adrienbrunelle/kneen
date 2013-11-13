<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>KNEEN</title>
	<script src="js/jquery-1.10.2.min.js"></script>
	
	<script>
	$(document).ready(function (){
		$("#submit").click(function (){
			//$("#ok").show(0).delay(5000).hide(0);
			//$("#alerte").show(0).delay(5000).hide(0);
			$.ajax({ // fonction permettant de faire de l'ajax
		   type: "POST", // methode de transmission des données au fichier php
		   url: "class/members/members.ajax.php", // url du fichier php
		   data: "login="+$("#login").val()+"&password="+$("#password").val(), // données à transmettre
		   success: function(msg){ // si l'appel a bien fonctionné
				if(msg==1) // si la connexion en php a fonctionnée
				{
					$("#ok").show(0).delay(5000).hide(0);

				}
				else // si la connexion en php n'a pas fonctionnée
				{
					$("#alerte").show();
					$("#alerte").html(msg);
					$("#alerte").show(0).delay(5000).hide(0);
				}
		   }
		});
		return false; // permet de rester sur la même page à la soumission du formulaire
	});
    });
	
	$(document).ready(function (){
		$("#logout").click(function (){
			//$("#ok").show(0).delay(5000).hide(0);
			//$("#alerte").show(0).delay(5000).hide(0);
			$.ajax({ // fonction permettant de faire de l'ajax
		   type: "POST", // methode de transmission des données au fichier php
		   url: "logout.php", // url du fichier php
		   success: function(msg){ // si l'appel a bien fonctionné
				if(msg==1) // si la connexion en php a fonctionnée
				{
					$("#ok").show(0).delay(5000).hide(0);

				}
				else // si la connexion en php n'a pas fonctionnée
				{
					$("#alerte").show();
					$("#alerte").html(msg);
					$("#alerte").show(0).delay(5000).hide(0);
				}
		   }
		});
		return false; // permet de rester sur la même page à la soumission du formulaire
	});
    });
	
	</script>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,300' rel='stylesheet' type='text/css'> 

	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div id="top">

	<a id="logo">KNEEN</a>


	<ul>
		<li><a href="?p=home">HOME</a></li>
		<li><a href="?p=surveys">SURVEYS</a></li>
		<li><a href="?p=settings">SETTINGS</a></li>
		<li><a href="?p=register">REGISTER</a></li>
		<?php
		if (isset($_SESSION['pseudo']))
		{
			?>
			<li><a id="logout" href="?p=logout">LOGOUT</a></li>
		<?php
		}?>
	</ul>
	
	<?php
	
	if (isset($_SESSION['pseudo']))
	{
		echo 'Bienvenue';
	}
	else
	{
	?>
	<input id="login" type="text" placeholder="login" />
	<input id="password" type="password" placeholder="password" />
	<button id="submit">SUBMIT</button>
	<?php
	}
	?>

</div>