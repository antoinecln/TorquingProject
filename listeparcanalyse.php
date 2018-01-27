<html>
<body>
<form style="margin:0px" method="POST" action="pageeolienne.php">
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="css/styleform.css">

<?php

// Connexion à la BDD
require ('connexion.php');

?>

    <label for="idparc"><center>SELECTIONNE LE PARC SOUHAITE :</center></label><br />
    <center><select name="numparc" id="idparc"></center>

<?php	

// Requete SQL à la BDD
$sql = "SELECT numparc FROM parc_ferme";
$array2 = mysqli_query($conn, $sql) or die('Error sur '.$sql.'<br/>'.mysql_error());

// Alimentation de la liste déroulante
while ($donnees =  mysqli_fetch_array($array2))
{
	
?>

<option value="<?php echo $donnees['numparc'] ?>"><?php echo $donnees['numparc'] ?></option>

   <?php
   }
   ?>

</select>

<input type="submit" value="Envoyer" id="envoyer"></input>
</form>
</body>



</html>