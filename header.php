<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>KNEEN</title>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.js"></script>

	<script>
	$(document).ready(function (){
		$("#signin").click(function (){
			$.ajax({ 
		   type: "POST",
		   url: "class/members/members.ajax.php", 
		   data: "email="+$("#email").val()+"&password="+$("#password").val(), 
		   success: function(msg){ 
				if(msg==1) 
				{
					//$("#alerteok").show(0).delay(5000).hide(0);
					location.reload();
				}
				else 
				{
					$("#alerte").show(0).delay(5000).hide(0);
				}
		   }
		});
		return false; 
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
					location.reload();
					//$("#ok").show(0).delay(5000).hide(0);
				}
				else // si la connexion en php n'a pas fonctionnée
				{
					$("#alerte").show(0).delay(5000).hide(0);
				}
		   }
		});
		return false; // permet de rester sur la même page à la soumission du formulaire
	});
    });
	
	
$(document).ready(function(){

    var counter = 3;

    $("#addbutton").click(function () {

    if(counter>10){
            //alert("Only 10 textboxes allow");
            return false;
    }   

    var newTextBoxDiv = $(document.createElement('div'))
         .attr("id", 'buttondiv' + counter);

    newTextBoxDiv.after().html('<div class="control-group"><label class="control-label" for="textinput">Answer '+ counter + '</label>' +
          '<div class="controls"><input name="answer' + counter + 
          '" id="answer' + counter + '" type="text" placeholder="Answer" class="input-xlarge">	</div></div>');

    newTextBoxDiv.appendTo("#b");


    counter++;
     });
     $("#removebutton").click(function () {
    if(counter==3){
          //alert("No more textbox to remove");
          return false;
       }   

    counter--;

        $("#buttondiv" + counter).remove();

     });



  });
	

	</script>

	 <link href="css/bootstrap.css" rel="stylesheet">
	    <link href="css/bootstrap-responsive.css" rel="stylesheet">
		  
		
	    <style type="text/css">
      body {
        padding-top: 60px;

      }
    </style>
		 <style type="text/css"></style><style id="holderjs-style" type="text/css"></style>

</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php?p=home">Kneen</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="index.php?p=home">Home</a></li>

			   
			
				  <?php
				  if (isset($_SESSION['userId']))
				  {
					  ?>
						    <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">Surveys <b class="caret"></b></a>
                <ul class="dropdown-menu">
				<li><a href="?p=surveys">Latest Surveys</a></li>
                  <li><a href="?p=surveys&a=add">Add Surveys</a></li>
				  <li><a href="?p=surveys&a=your">Your Surveys</a></li>
				     </ul>
              </li>  
                  
                  
               <?php
				  }?>
             
			   
              <li><a href="index.php?p=about">About</a></li>
			  <?php 
			  
			if (!isset($_SESSION['userId']))
			{
			  ?>
			  <li id="register"><a href="index.php?p=register">Register</a></li>
			  <?php
			}
			else
			{
			?>
				 <li id="logout"><a href="index.php?p=logout">Logout</a></li>
				<?php
			}
				?>
            </ul>
			<?php

			if (!isset($_SESSION['userId']))
			{
			?>
			
			<div id="form">
            <form class="navbar-form pull-right" method="post" action="">
              <input name="email" id="email" class="span2" type="text" placeholder="Email">
              <input name="password" id="password" class="span2" type="password" placeholder="Password">
              <button id="signin" type="submit" class="btn btn-success">Sign in</button>
            </form>
			</div>
			<?php
			}?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	



