<!DOCTYPE html>
<html class="" lang="fr">
    <head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <meta  http-equiv="X-UA-compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8" />
	    <meta content="IE=edge,chrome=1" http-equiv="X-UA-compatible">
        <meta name="apple-mobile-web-app-capable" content="yes" />		
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=0.3, maximum-scale=1, user-scalable=yes" />
		<meta name="format-detection" content="telephone=no"/>
		<link rel="stylesheet" media="screen" type="text/css" title="Design" href="css/style.css">
												

        <title>Somax Energy</title>

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
<center> VOICI TOUTES LES INFORMATIONS SELECTIONNEES </center><br>

<?php // RECUPERATION DES VARIABLES DES FORMULAIRES ET AFFICHAGE 


// Reception de la variable qui contient la valeur du parc
$idparc = $_POST['idparc'];
// Affichage sur la page web
print("<center> LE PARC SELECTIONNE EST $idparc </center><br>");


// Reception de la variable qui contient la valeur de l'éolienne
$ideolienne = $_POST['ideolienne'];
// Affichage sur la page web 
print("<center> L'EOLIENNE SELECTIONNE EST $ideolienne </center><br>");


// Reception de la variable qui contient la valeur de la zone 
$idzone = $_POST['idzone']; 

// Affichage sur la page web 
print("<center> LA ZONE SELECTIONNE EST $idzone </center><br>"); 


// Connexion à la BDD
require('connexion.php');

// Requete boulons en fonction de la zone
$req="SELECT numboulon FROM boulon WHERE idzone='$idzone'";
$array = mysqli_query($conn, $req) or die('Error sur '.$req.'<br/>'.mysql_error());

// Alimentation de la liste déroulante
while ($donnees=mysqli_fetch_array($array))
{
	
?>

<center><option hidden value="<?php echo $donnees['numboulon'] ?>"><?php echo $donnees['numboulon'] ?></option></center>

<?php

}

?>

        <!-- CHOIX     DES     GRAPHIQUES -->
		
<p id="titre2"> CHOISSISEZ LE TYPE DE GRAPHIQUE QUE VOUS SOUHAITEZ AFFICHER :  </p>
		
<div id="div1">
<p id="graph1"> Pourcentage de boulons ressérés <br> en fonction de la date </p>
<?php  echo '<input id="radio1"  type="radio" name="choix" onclick="location.href=\'pagegraph1.php?var1='.$_POST['idzone'].'\'";/>';  ?>
</div>
	
	
<div id="div2">
<p id="graph2"> Force exercée sur chaque boulons <br> en fonction de la date </p>
<?php  echo '<input id="radio2"  type="radio" name="choix" onclick="location.href=\'pagetableau2.php?var1='.$_POST['idzone'].'\'";/>';  ?>
</div>


<div id="div3">
<p id="graph3"> Nombre de resserage <br> en fonction du N° du boulon </p>
<?php  echo '<input id="radio3"  type="radio" name="choix" onclick="location.href=\'pagegraph3.php?var1='.$_POST['idzone'].'\'";/>';  ?>
</div>


             <!-- BOUTON RETOUR -->
<div id="div4">
<form action="pageparc.php"> <input id="boutonreturn" type="submit" value="Effectuer une nouvelle recherche"></form> 
</div>
           <!-- Bouton Deconnection -->
<div id="div5">
<form action="../Alexis/index.html"> <input id="boutondeco" type="submit" value="Deconnexion"></form> 
</div>

</body>

</html>