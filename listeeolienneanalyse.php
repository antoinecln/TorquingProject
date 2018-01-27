<?php 

// Reception de la varibale idparc
$idparc = $_POST['numparc']; 
if(empty($idparc)) 
{ 
exit(); 
} 

?>

<html>
<body>
<form style="margin:0px" method="POST" action="pagezone.php">
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="css/styleform.css">

<?php

// Récupération des valeurs de idparc en caché
echo '<input name="idparc" hidden value="'.$_POST['numparc'].'"  />';

// Affichage des valeurs
print ("<center> LE PARC SELECTIONNE EST $idparc </center>");

// Connexion à la BDD
require('connexion.php');

?>

    <label for="ideolienne"><center><br>SELECTIONNE L'EOLIENNE SOUHAITE :</center></label><br />
    <center><select name="ideolienne" id="ideolienne"></center>

<?php	

 
// Requete SQL à la BDD
$sql = "SELECT Numeolienne FROM eolienne WHERE idparc='$idparc'";
$array2 = mysqli_query($conn, $sql) or die('Error sur '.$sql.'<br/>'.mysql_error());

// Alimentation de la liste déroulante
while ($donnees =  mysqli_fetch_array($array2))
{
	
?>

    <option value="<?php echo $donnees['Numeolienne'] ?>"><?php echo $donnees['Numeolienne'] ?></option>

<?php
}
?>

    </select>

<input type="submit" value="Envoyer" id="envoyer"></input>
</form>
</body>
</html>