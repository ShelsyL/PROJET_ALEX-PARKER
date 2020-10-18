<?php
/*
  ./app/routeur.php
  ROUTEUR PRINCIPAL
*/

// ROUTES DE POSTS
  // DETAILS D'UN POST
  // PATTERN : ?postId=x
  // CTRL: postControleur
  // ACTION: show
  if (isset($_GET['postId'])):
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\PostsControleur\showAction($connexion, $_GET['postId']);



  // ROUTES DES POSTS
  // PATTERN: index.php?posts=xxx
  elseif (isset($_GET['posts'])):
    include_once '../app/routeurs/postsRouteur.php';



// ROUTE PAR DEFAUT
  // PATTERN : /
  // CTRL: postsControleur
  // ACTION: index
  else:
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\PostsControleur\indexAction($connexion);

endif;
