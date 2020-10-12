<?php

/*
	./public/noyau/connexion.php
  Paramètres de connexion
	CREATION D'UNE INSTANCE PDO $connexion
*/
  // Ca ne changera jamais d'un site à l'autre ------------------
$dsn = "mysql:host=".HOSTNAME.";dbname=".DBNAME;
$param = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

//Création de l'objet PDO $connexion
try {
  $connexion = new PDO($dsn,USERNAME,USERPWD,$param);
}
catch (PDOException $e) {
  // die("Problème de connexion à la base de données...");
  // OU (voir code ci-dessous)
  echo "Erreur !: " . $e->getMessage() . ">br/";
  die();
}
