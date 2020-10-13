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
function findAll(\PDO $connexion) { // On récupère la connexion
	$sql = "SELECT *, p.id AS postId,
	   c.id AS categorieId,
	   c.name AS categorieName,
	   p.created_at AS postDate
	   FROM posts p
	   JOIN categories c ON p.category_id = c.id
	   ORDER BY p.created_at DESC
	   LIMIT 10;";
  // Pas de paramètres extérieur donc on peut l'exécuter directement
	$rs = $connexion->query($sql);
	return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * [findOneById description]
 * @param  PDO   $connexion [description]
 * @param  int   $id        [description]
 * @return array            [description]
 */

// function findOneById(\PDO $connexion, int $id) :array {
// 	$sql = "SELECT *, posts.id AS postID
// 					FROM posts
// 					JOIN categories ON posts.category_id = categories.id
// 					WHERE posts.id = :id;";
// 	$rs = $connexion->prepare($sql);
// 	$rs->bindValue(':id', $id, \PDO::PARAM_INT);
// 	$rs->execute();
// 	return $rs->fetch(\PDO::FETCH_ASSOC);
// }

function findOneById(\PDO $connexion, int $id) :array {
	$sql = "SELECT *, p.id AS postId,
	   c.id AS categorieId,
	   c.name AS categorieName,
	   p.created_at AS postDate
	   FROM posts p
	   JOIN categories c ON p.category_id = c.id
					WHERE p.id = :id;";
	$rs = $connexion->prepare($sql);
	$rs->bindValue(':id', $id, \PDO::PARAM_INT);
	$rs->execute();
	return $rs->fetch(\PDO::FETCH_ASSOC);
}



function insertOne(\PDO $connexion, array $data) :int {
  $sql = "INSERT INTO posts
          SET title        = :title,
              text     		 = :text,
							quote 			 = :quote,
              category_id  = :categorie,
              created_at   = NOW();";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':title',    $data['title'],    \PDO::PARAM_STR);
  $rs->bindValue(':text',  $data['text'],  \PDO::PARAM_STR);
	$rs->bindValue(':quote',  	$data['quote'],  \PDO::PARAM_STR);
  $rs->bindValue(':categorie', $data['categorie'], \PDO::PARAM_INT);
  $rs->execute();
  return $connexion->lastInsertId();
}
