<?php
/*
  ./noyau/contantes.php
  CONSTANTES DU FRAMEWORK
 */


// BASE URL DE L'APPLICATION FRONT
  $url = explode('index.php', $_SERVER['SCRIPT_NAME']);
  define('BASE_URL_PUBLIC', 'http://' . $_SERVER['HTTP_HOST'] . $url[0]);

// BASE URL DE L'APPLICATION BACK
// str_replace('public','admin' => je remplace public par admin dans le script_name
  define('BASE_URL_ADMIN', str_replace('public','admin',BASE_URL_PUBLIC));
