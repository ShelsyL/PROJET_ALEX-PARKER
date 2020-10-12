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

/**
 * [findOneById description]
 * @param  PDO   $connexion [description]
 * @param  int   $id        [description]
 * @return array            [description]
 */

function findOneById(\PDO $connexion, int $id) :array {
	$sql = "SELECT *
					FROM posts
					WHERE id = :id;";
	$rs = $connexion->prepare($sql);
	$rs->bindValue(':id', $id, \PDO::PARAM_INT);
	$rs->execute();
	return $rs->fetch(\PDO::FETCH_ASSOC);
}


function insert(\PDO $connexion, array $data) :int {
  $sql = "INSERT INTO posts
          SET title        = :title,
              content      = :content,
							quote 			 = :quote,
              category_id  = :categorie,
              created_at   = NOW();";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':title',    $data['title'],    \PDO::PARAM_STR);
  $rs->bindValue(':content',  $data['content'],  \PDO::PARAM_STR);
	$rs->bindValue(':quote',  $data['quote'],  \PDO::PARAM_STR);
  $rs->bindValue(':categorie', $data['categorie'], \PDO::PARAM_INT);
  $rs->execute();
  return $connexion->lastInsertId();
}
