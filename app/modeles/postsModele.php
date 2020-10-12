<?php
/*
  ./app/modeles/xxxModele.php
  MODELE DES POSTS
*/

namespace App\Modeles\PostsModele;

/**
 * [findAll description]
 * @param  PDO   $connexion [description]
 * @return array            [description]
 */

// L'objectif de cette fonction est de faire une requete (regarder le png de DB pour voir a quoi ca ressemble)
function findAll (\PDO $connexion) :array { // On récupère la connexion
	$sql = "SELECT *
      		FROM posts
    			ORDER BY created_at DESC
          LIMIT 10;";
  // Pas de paramètres extérieur donc on peut l'exécuter directement
  $rs = $connexion->query($sql);
  return $rs->fetchAll(\PDO::FETCH_ASSOC); // On retourne un tableau indéxé de tableau associatif - Ce tableau associatif va se retouver dans $posts du fichier ./app/controleurs/postsControleur.php
}
