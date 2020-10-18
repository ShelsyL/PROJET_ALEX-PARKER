<?php
/*
  ./app/modeles/categoriesModele.php
  Modèle des catégories
 */

 namespace App\Modeles\CategoriesModele;



/**
 * [findAll description]
 * @param  PDO   $connexion [description]
 * @return array            [description]
 */

  // Va chercher toute les catégories, trié par ordre name
 function findAll (\PDO $connexion) :array {
 	$sql = "SELECT *
          FROM categories
          ORDER BY name ASC;";
   $rs = $connexion->query($sql);
   return $rs->fetchAll(\PDO::FETCH_ASSOC);
 }
