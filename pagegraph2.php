<!DOCTYPE HTML>

<html class="" lang="fr">

<head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <meta  http-equiv="X-UA-compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8" />
	    <meta content="IE=edge,chrome=1" http-equiv="X-UA-compatible">
        <meta name="apple-mobile-web-app-capable" content="yes" />		
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=0.3, maximum-scale=1, user-scalable=yes" />
		<meta name="format-detection" content="telephone=no"/>
		<link rel="stylesheet" media="screen" type="text/css" title="Design" href="css/stylegraph2.css">
												

        <title>Graphiques</title>
  
</head>

<body>


<div id= "bandeau">

		<div id="logosomax">

		</div>
		    <div id="logoclient">

		    </div>
			
		<div id= "titre">
		    Maintenance Eolienne
		</div>
		
    </div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

   
<p id="titre3">  GRAPHIQUE FORCE EXERCEE SUR CHAQUE BOULONS : </p>


<!-- RECUPERATION DE LA VARIABLE IDZONE ET ENVOI POUR LES GRAPHIQUES -->

<center>
<?php

// Reception de la variable qui contient la valeur du boulon par tableaugraph2
$numboulon = $_GET['var2'];

// Affichage d'un message sur la page web 
echo ("<center> Voici le couple détecté en fonction de la date d'intervention du boulon $numboulon </center>");  

// Affichage du graphique en prenant en compte de la variable
echo "<img src='graph2.php?var2=$numboulon'>";


?>
</center>  
  
</body>

</html>