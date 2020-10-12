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

// INDEXACTION (liste des posts)
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



// SHOWACTION (détail d'un post)
function showAction(\PDO $connexion, int $id) { // Qui va récupérer une connexion PDO et un entier $id
 // TEST echo $id; => OK
 include_once '../app/modeles/postsModele.php';
 $post = PostsModele\findOneById($connexion, $id);

 // Je charge la vue show dans $content
  GLOBAL $content, $title; // Objectif => Modifier les variables donc GLOBAL
  $title = $post['title']; // Dans $title, on met le titre du post, l'info vient de la db
  // Dans $content, on va mettre une vue => Donc on doit passer par un ob_start
  ob_start();
   include '../app/vues/posts/show.php'; // Je charge la vue
  $content = ob_get_clean(); // Je met cette vue dans $content
}
