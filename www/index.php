<?php
/*
  ./www/index.php
    DISPATCHER CENTRAL
*/
// Le role du dispatcher est de charger ...
  // 1. INIT - On charge l'initialisation
  // Le but de init c'est de définir les zones dynamiques et de se connecter à la base de données
	require_once '../noyau/init.php';

  // 2. ROUTEUR - On charge le routeur
  // Le role du routeur c'est d'hydrater les zones dynamiques
	require_once '../app/routeur.php';

  // 3. TEMPLATE - On charge le template
  // Le Role du template c'est d'afficher les zones dynamiques
	require_once '../app/vues/template/index.php';
