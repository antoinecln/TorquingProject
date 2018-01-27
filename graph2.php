<?php

// Reception de la variable avec REQUEST
$var2 = $_REQUEST['var2'];

// Bibliothèques necessaires
include ("jpgraph-4.0.2/src/jpgraph.php");
include ("jpgraph-4.0.2/src/jpgraph_line.php");


// Initialisation des tableaux
$array1 = array();
$array2 = array();

// Connexion à la BDD
require('connexion.php');

// Requete SQL pour sélectionner le couple détecté de chaque boulons 
$sql = "SELECT avoirintervention.coupledetecte, intervention.dateintervention FROM intervention, avoirintervention, boulon
        WHERE avoirintervention.idintervention = intervention.idintervention 
        AND boulon.idboulon = avoirintervention.idboulon 
        AND boulon.numboulon = '$var2'";
$array2 = mysqli_query($conn, $sql) or die('Error sur '.$sql.'<br/>'.mysql_error());


// Lecture des données 
while ($data = mysqli_fetch_assoc($array2))
{
    // Alimentation des tableaux
    $xdata[] = $data['dateintervention'];
    $ydata[] = $data['coupledetecte'];
}


//**********************
// CREATION DU GRAPHIQUE
//**********************


// Parametre du graphique
$graph = new Graph(1200,500,"auto");

// Création de la courbe
$courbe = new LinePlot($ydata);

// Fixer les marges
$graph->img->SetMargin(40,40,40,50);

// Lissage sur fond blanc (évite la pixellisation)
$graph->img->SetAntiAliasing("white");

// $graph->SetScale("textlin");
$graph->SetScale("textlin");

// Affiche la grille de l'axe des abscisses
$graph->xgrid->Show();

// Affiche la grille de l'axe des ordonnées
$graph->ygrid->Show();

// Couleur de la courbe
$courbe ->SetColor("#55bbdd");

// Création de la courbe
$courbe = new LinePlot($ydata);

// Point bleu aux intersections
$courbe -> mark -> SetType(MARK_FILLEDCIRCLE,'',1.0);
$courbe -> mark -> SetColor('#55bbdd');
$courbe -> mark -> SetFillColor('#55bbdd');

// Données du tableau xdata pour l'axe des abscisses
$graph->xaxis->SetTickLabels($xdata);

// Marge entre le graphique et les valeurs de l'axe des ordonnées
$graph->yaxis->SetLabelMargin(1);

// Nom de l'axe X
$graph->xaxis->title->Set("Date de l'intervention");

// Nom de l'axe Y
$graph-> yaxis->title->Set("Couple détecté (en N.m)");

// Ajoute la courbe dans le graphique
$graph->Add($courbe);

//Trace le graphique
$graph->Stroke();

mysql_close();

?>