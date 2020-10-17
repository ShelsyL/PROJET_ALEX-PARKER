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
	$sql = "SELECT *,
					p.id 				 AS postId,
	   			c.id 			   AS categorieId,
	   			c.name 			 AS categorieName,
	   			p.created_at AS postDate
	   			FROM posts p
	   			JOIN categories c ON p.category_id = c.id
	   			ORDER BY p.created_at DESC
	   			LIMIT 10;";
  // Pas de paramètres extérieur donc on peut l'exécuter directement
	$rs = $connexion->query($sql);
	return $rs->fetchAll(\PDO::FETCH_ASSOC);
}



function findOneById(\PDO $connexion, int $id) :array {
	$sql = "SELECT *,
					p.id 				 AS postId,
	   			c.id 				 AS categorieId,
	   			c.name 			 AS categorieName,
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
  $rs->bindValue(':title',     $data['title'],     \PDO::PARAM_STR);
  $rs->bindValue(':text',  		 $data['text'],  	 	 \PDO::PARAM_STR);
	$rs->bindValue(':quote',  	 $data['quote'],  	 \PDO::PARAM_STR);
  $rs->bindValue(':categorie', $data['categorie'], \PDO::PARAM_INT);
  $rs->execute();
  return $connexion->lastInsertId();
}


function deleteOneById(\PDO $connexion, int $id) :bool {
  $sql = "DELETE FROM posts
          WHERE id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id', $id, \PDO::PARAM_INT);
  return intval($rs->execute()); //  intval va retourner un 0 => si ca se passe mal - et un 1 => si ca c'est bien passé, en fct de ca on aura un message d'erreur
}


function updateOneById(\PDO $connexion, int $id, array $data) :bool {
	$sql = "UPDATE posts
					SET title        = :title,
							text     		 = :text,
							quote 			 = :quote,
							category_id  = :categorie
					WHERE id         = :id;";
	$rs = $connexion->prepare($sql);
	$rs->bindValue(':title',     $data['title'],     \PDO::PARAM_STR);
	$rs->bindValue(':text',  		 $data['text'],  	 	 \PDO::PARAM_STR);
	$rs->bindValue(':quote',  	 $data['quote'],  	 \PDO::PARAM_STR);
	$rs->bindValue(':categorie', $data['categorie'], \PDO::PARAM_INT);
	$rs->bindValue(':id', $id, \PDO::PARAM_INT);
	return intval($rs->execute());
}
