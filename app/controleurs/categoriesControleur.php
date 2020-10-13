<?php
/*
  .app/controleurs/categoriesControleur.php
 */

 namespace App\Controleurs\CategoriesControleur;
 use \App\Modeles\CategoriesModele;


 function indexAction(\PDO $connexion) {
   // Je mets la liste des categories dans $categories
     include_once '../app/modeles/categoriesModele.php';
     $categories = CategoriesModele\findAll($connexion);
   // // Je charge la vue index dans $content
   //   GLOBAL $content;
   //   ob_start();
   //     include '../app/vues/categories/index.php';
   //   $content = ob_get_clean();
 }
