# TorquingProject

Bonjour à tous, 

Suite à plusieurs demandes d'aides pour la création d'un graphique en PHP à partir d'une base de donnée, 
Voici un Git sur lequel se trouve la petite partie d'un projet développer au cours de ma seconde année de BTS. 

Vous trouverez les fichiers nécessaires ainsi que des commentaires détaillés pour vous aider à comprendre le code. 

Si vous utiliser ce code à des fins scolaires, merci de me le préciser par Mp ça m'interesserais de savoir sur quoi vous travaillez. 
Utilisez de préférences Atom ou SublimeText pour l'éditeur, ils offrent une meilleure compréhenssion des différentes variables et fonctions qu'un Notepad++ par exemple. 

---------
PREREQUIS
---------
1) WampServer version 3.XXX de préférence
2) Atom/SublimeText/Notepad++
3) Une BDD Mysql (comprise dans Wamp) structurée (Tables,Champs,Liaisons/...)
4) Les fichiers JpGraph, nécessaire pour la création des graphiques, vous trouverez les fichiers ici : http://jpgraph.net/download/
A noter que j'ai utiliser cette librairie en version 4.0.2, des modifications/améliorations ont surement été effectuées depuis.
Cette librairie est à garder sous forme de dossier et à copier directement dans votre projet à la racine de votre site. 

------------
EXPLICATIONS
------------

Je vais essayer de vous expliquez le plus synthétiquement possible le rôle de chaque fichier :

1) Connexion.php => Il regroupe les informations nécessaire à la connexion à une base de données MySql.

2) listeeolienneanalyse.php
listeparcanalyse.php
listezoneanalyse.php => Ces 3 fichiers sont des formulaires de choix directement allimenté par la base de données. 
Ils sont indépendants les uns des autres, les choix saisies sur ces formulaires impacts les résultats des autres. 

3) pageeolienne.php
pageparc.php
pagezone.php => Ces 3 fichiers sont les pages respectives des fichiers du dessus, ce sont tous simplement les pages HTML qui contiennent 
ces fichiers. 

4) touterequete.php => C'est le fichier qui récapitule toutes les informations des formulaires de choix. 
Il contient également le type de graphique que l'on souhaite affichés avec ces valeurs, dans mon cas j'ai 3 types de graphiques.

5) graph1.php
tableaugraph2.php
graph2.php
graph3.php => Ces fichiers sont les graphiques purs générés grâce à Jpgraph. Dans ces fichiers vous trouverez dans un premier temps la réception de la variable qui détermine le choix du type de graphique. 
Puis les requêtes SQL sur lequels vont s'appuyer vos graphiques. 
Et enfin, les caractéristiques de votre graphique. 

Pour tableaugraph2.php, il s'agit d'un tableau de sélection, c'est une étape qui se trouve entre vos choix et votre graphique. 


Voila voila, tout les fichiers sont commentés mais si vous avez des questions n'hésitez pas. 

Je vous met aussi le dossier qui contient les CSS si vous en avez besoin, une page structurée sera plus compréhensible je pense. :) 

Merci également de me faire un retour sur vos travaux/projets quand vous aurez du temps. 

Bon Code à tous ! 






