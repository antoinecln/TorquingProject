<?php // RECUPERATION DES VARIABLES DES FORMULAIRES ET AFFICHAGE  

$idparc = $_POST['idparc']; 
if(empty($idparc)) 
{ 

print("<center>Le parc est invalide !</center>"); 
exit(); 

} 
else 
{ 
print("<center> LE PARC SELECTIONNE EST $idparc </center>"); 
} 

echo '<br>';
echo '<input name="idparc" hidden value="'.$_POST['idparc'].'"  />'; 


$ideolienne = $_POST['ideolienne']; 
if(empty($ideolienne)) 
{ 

print("<center> L'éolienne est invalide !</center>"); 
exit(); 

} 
else 
{ 
print("<center> L'EOLIENNE SELECTIONNEE EST $ideolienne </center>"); 
} 

echo '<br>';
echo '<input name="ideolienne" hidden value="'.$_POST['ideolienne'].'"  />'; 

?>

<html>
<body>
<form style="margin:0px" method="POST" action="touterequete.php">
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="css/styleform.css">

<?php

// Envoie de la variable qui contient la valeur du parc
echo '<input name="idparc"  hidden value="'.$_POST['idparc'].'"  />';

// Envoie de la variable qui contient la valeur de l'éolienne 
echo '<input name="ideolienne" hidden value="'.$_POST['ideolienne'].'"  />'; 

// Connexion à la BDD
require ('connexion.php');

?>

    <label for="idzone"><center>SELECTIONNE LA ZONE SOUHAITEE :</center></label><br />
    <center><select name="idzone" id="idzone"></center>

<?php	

 
// Requete SQL à la BDD
$sql = "SELECT zone FROM zone WHERE ideolienne='$ideolienne'";
$array2 = mysqli_query($conn, $sql) or die('Error sur '.$sql.'<br/>'.mysql_error());

// Alimentation de la liste déroulante
while ($donnees =  mysqli_fetch_array($array2))
{
	
?>

    <option name="idzone" value="<?php echo $donnees['zone'] ?>"><?php echo $donnees['zone'] ?></option>

<?php
}
?>

    </select>

<input type="submit" value="Envoyer" id="envoyer"></input>
</form>
</body>
</html>