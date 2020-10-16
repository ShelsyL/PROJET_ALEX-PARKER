<?php
/*
  ./app/routeurs/postsRouteur.php
  ROUTES DES POSTS
  Il existe un $_GET['posts']
 */

 use App\Controleurs\PostsControleur;
 include_once '../app/controleurs/postsControleur.php';

 switch ($_GET['posts']) {

  /*
  AJOUT D'UN POST: FORMULAIRE
  PATTERN: index.php?posts=addForm
  CTRL: postsControleur
  ACTION: addForm
  */
  case 'addForm':
  PostsControleur\addFormAction($connexion); // Quand on affiche le formulaire, on a besoin de la base de donnée => Besoin de la liste des auteurs pour le menu déroulant.=> Donc besoin de la connexion
  break;


  /*
  AJOUT D'UN POST: INSERT
  PATTERN: index.php?posts=addInsert
  CTRL: postsControleur
  ACTION: addInsert
  */
  case 'addInsert':
  PostsControleur\addInsertAction($connexion);
  break;
  

  /*
  LISTE DES POSTS
  PATTERN: index.php?posts
  CTRL: postsControleur
  ACTION: index
  */
  default:
  PostsControleur\indexAction($connexion);
  break;

  /*
  SUPPRESSION DES POSTS
  PATTERN: index.php?posts=delete&id=x
  CTRL: postsControleur
  ACTION: delete
  */
  case 'delete':
  PostsControleur\deleteAction($connexion, $_GET['id']);
  break;

}
