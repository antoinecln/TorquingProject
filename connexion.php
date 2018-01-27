<?php

// Caractéristique de MYSQL
$host = "localhost";
$user = "root";
$pass = "";
$base = "torquing";


// Connexion à la BDD
$conn = mysqli_connect($host, $user, $pass, $base);

// Verification de la connexion
if (!$conn) 
{
     die("Connection failed: " . mysqli_connect_error());
}


?>