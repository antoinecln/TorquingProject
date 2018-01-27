<?php

// Reception de la variable avec REQUEST
$var1 = $_REQUEST['var1'];

// Bibliothèques necessaires
include ("jpgraph-4.0.2/src/jpgraph.php");
include ("jpgraph-4.0.2/src/jpgraph_line.php");

// Initialisation des tableaux
$array1 = array();
$array2 = array();

// Connexion à la BDD
require('connexion.php'); 

// Requete SQL pour sélectionner le nombre de boulons resserés en fonction de la date de l'intervention
$sql = "SELECT intervention.dateintervention, COUNT(*) FROM intervention,avoirintervention, boulon, zone  
        WHERE boulon.idzone= '$var1'
	    AND boulon.idboulon = avoirintervention.idboulon
		AND avoirintervention.etatcouple= 1
		AND avoirintervention.idintervention=intervention.idintervention
		AND intervention.valide=1
		GROUP BY avoirintervention.idintervention
		ORDER BY intervention.dateintervention ASC";
$array2 = mysqli_query($conn, $sql) or die('Error sur '.$sql.'<br/>'.mysql_error());


    if ($array2)
    {
		// Initialisation du tableau à vide
	    $tab="";
					
			while ($tabl_result = mysqli_fetch_array($array2)) 
			{
				if (isset($tabl_result[0]))
				{
					$tab[$tabl_result[0]]=$tabl_result[1];
				}				
			}
					
		mysqli_free_result($array2);
	}
	else 
	{
		$tab="";
	}
	

//Requete SQL pour selectionner le nombre de boulons totals inspectés par intervention
$sql = "SELECT intervention.dateintervention, COUNT(*) FROM intervention,avoirintervention, boulon, zone  WHERE 
		boulon.idzone= '$var1'
        AND boulon.idboulon = avoirintervention.idboulon
        AND avoirintervention.idintervention=intervention.idintervention
        AND intervention.valide= 1
        GROUP BY avoirintervention.idintervention
        ORDER BY intervention.dateintervention ASC";
$array2 = mysqli_query($conn, $sql) or die('Error sur '.$sql.'<br/>'.mysql_error());

    if ($array2)
	{
		// Initialisation des tableaux à vide
		$tab1="";
		$tab2="";
					
		    while ($tabl_result = mysqli_fetch_array($array2)) 
			{
				if (isset($tab[$tabl_result[0]]))
				{	
					
					// Table des X  
					// On convertit la date 
					$tab2=explode("-",$tabl_result[0]);
					
					// On indique le format de la date
					$xdata[]=$tab2[2]."/".$tab2[1]."/".$tab2[0];
					
					// Calcul pourcentage boulons resserrés
					// table des Y
					$ydata[]=100*$tab[$tabl_result[0]]/$tabl_result[1];	
				}
				
				else
				{
					$tab1[$tabl_result[0]]=0;
				}	
			}
					
		mysqli_free_result($array2);
				
	}


//**********************
// CREATION DU GRAPHIQUE
//**********************


// Parametre du graphique
$graph = new Graph(1200,500,"auto");
$graph->SetScale("textlin",0,110);

// Création de la courbe
$courbe = new LinePlot($ydata);

// Fixer les marges
$graph->img->SetMargin(40,40,40,50);

// Lissage sur fond blanc (évite la pixellisation)
$graph->img->SetAntiAliasing("white");

// $graph->SetScale("textlin");
$graph->SetScale("textlin");

// Valeur minimum par défaut pour l'axe des ordonnées 
$graph->yaxis->scale->SetAutoMin(0);

// Affiche la grille de l'axe des abscisses
$graph->xgrid->Show();

// Affiche la grille de l'axe des ordonnées
$graph->ygrid->Show();

// Point bleu aux intersections
$courbe->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$courbe->mark->SetColor("#55bbdd");
$courbe->mark->SetFillColor("#55bbdd");

// Données du tableau xdata pour l'axe des abscisses
$graph->xaxis->SetTickLabels($xdata);

// Nom de l'axe X
$graph->xaxis->title->Set("Date de l'intervention");

// Nom de l'axe Y
$graph->yaxis->title->Set("% de boulons resserés sur la zone");

// Ajoute la courbe dans le graphique
$graph->Add($courbe);

//Trace le graphique
$graph->Stroke();

mysql_close();

?>
