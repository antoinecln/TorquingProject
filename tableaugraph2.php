<?php

// Reception de la variable avec GET
$var1 = $_GET['var1'];


// Connexion à la BDD
require('connexion.php');

// Requete ID de la zone, nom de la zone, ID du boulon et nbr de resserage
$sql = "SELECT zone.zone, typezone.nomzone, boulon.numboulon, COUNT(`etatcouple`) 
        FROM avoirintervention, boulon, typezone, zone, intervention 
		WHERE zone.idzone ='$var1' 
        AND boulon.idboulon = avoirintervention.idboulon
        AND typezone.idtype = zone.idtype 
        AND boulon.idzone = zone.idzone
        AND intervention.idintervention = avoirintervention.idintervention
        AND boulon.idzone = '$var1' AND avoirintervention.etatcouple ='1' 
        AND intervention.valide ='1' GROUP BY boulon.numboulon ORDER BY avoirintervention.etatcouple DESC";
$array1 = mysqli_query($conn, $sql) or die('Error sur '.$sql.'<br/>'.mysql_error());


// Style CSS du tableau

echo '<style>

div#tab1 th
{
	font-size:18px;
}

div#tab1 th,tr,td
{
   	border: 1px solid black;
	padding:4px;
}

div#tab1
{
    margin:10px auto;
    width:100%;
    min-width:400px;
    max-width:700px;
}

div#tab1 table
{
	font-family:Courier New, monospace;
	text-align: center;
    margin:0px;
    width:100%;
	border-collapse: collapse;
}

</style>';

// En-tête du tableau

echo '<div id="tab1" class="table-responsive">';
echo '<table>';
 
echo '<tr>';
echo '<td bgcolor="#DCDCDC"> Zone </td>';
echo '<td bgcolor="#DCDCDC"> Nom de la zone </td>';
echo '<td bgcolor="#DCDCDC"> N° du boulon </td>';
echo '<td bgcolor="#DCDCDC"> Nbr de resserage </td>';
echo '</tr>';


// Alimentation du tableau 

while($row = mysqli_fetch_assoc($array1))
	
{
	echo '<tr>';
	echo '<td bgcolor="#F8F8FF">'.$row['zone'].'</td>';
	echo '<td bgcolor="#F8F8FF">'.$row['nomzone'].'</td>';
	echo '<td bgcolor="#F8F8FF"><a href="pagegraph2.php?var2='.$row['numboulon'].'" target=_blank >'.$row['numboulon'].'</a></td>';
	echo '<td bgcolor="#F8F8FF">'.$row['COUNT(`etatcouple`)'].'</td>';
   echo '</tr>';
}
echo '</table>'."\n";
echo '</div>';


?>