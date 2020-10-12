<?php
/*
  ./app/controleurs/postsControleur.php
  CONTROLEUR DES POSTS
*/

namespace App\Controleurs\PostsControleur;
use \App\Modeles\PostsModele;

/**
 * [indexAction description]
 * @param  PDO    $connexion [description]
 * @return [type]            [description]
 */

// Je met dans $posts la liste des 10 derniers posts que je demande au modele.
function indexAction(\PDO $connexion) { // On récupère la connexion PDO
  include_once '../app/modeles/postsModele.php';
  $posts = PostsModele\findAll($connexion);

  // Je charge la vue post/index dans $content
  // var_dump($posts); => Etape OK
  GLOBAL $content;
  ob_start();
  		include'../app/vues/posts/index.php';
  	$content = ob_get_clean();
}
