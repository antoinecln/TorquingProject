<?php

// Reception de la variable avec REQUEST
$var1 = $_REQUEST['var1'];


// Bibliothèques necessaires
include ("jpgraph-4.0.2/src/jpgraph.php");
include ("jpgraph-4.0.2/src/jpgraph_line.php");
include ("jpgraph-4.0.2/src/jpgraph_bar.php");


// Initialisation des tableaux
$array1 = array();
$array2 = array();

// Connexion à la BDD
require('connexion.php');

// Requete SQL pour sélectionner le nombre de resserage par boulons
$sql = "SELECT boulon.numboulon, COUNT(`etatcouple`) FROM avoirintervention, boulon 
        WHERE avoirintervention.idboulon = boulon.idboulon AND avoirintervention.etatcouple = 1 
        AND boulon.idzone = '$var1' GROUP BY boulon.numboulon";
$array2 = mysqli_query($conn, $sql) or die('Error sur '.$sql.'<br/>'.mysql_error());


// Lecture des données 
while ($data = mysqli_fetch_assoc($array2))
{
    // Alimentation des tableaux
    $xdata[] = $data['numboulon'];
    $ydata[] = $data['COUNT(`etatcouple`)'];
}


//**********************
// CREATION DU GRAPHIQUE
//**********************


// Parametre du graphique
$graph = new Graph(1200,500,"auto");
$graph->SetScale("textlin");

// Creation de la barre
$barre = new BarPlot($ydata);

// Fixer les marges
$graph->img->SetMargin(40,40,40,50);

// Lissage sur fond blanc (évite la pixellisation)
$graph->img->SetAntiAliasing("white");

// Valeur minimum par défaut pour l'axe des ordonnées 
$graph->yaxis->scale->SetAutoMax(6);

// Affiche la grille de l'axe des abscisses
$graph->xgrid->Show();

// Affiche la grille de l'axe des ordonnées
$graph->ygrid->Show();

// Données du tableau xdata pour l'axe des abscisses
$graph->xaxis->SetTickLabels($xdata);

// Largeur des barres
$barre->SetAbsWidth(15);

// Couleur des barres
$barre->SetFillColor("#55bbdd");

// Nom de l'axe X
$graph->xaxis->title->Set("N° du boulon");

// Nom de l'axe Y
$graph->yaxis->title->Set("Nombre de Resserage");

// Ajoute la barre dans le graphique
$graph->Add($barre);

//Trace le graphique
$graph->Stroke();

mysql_close();

?>
