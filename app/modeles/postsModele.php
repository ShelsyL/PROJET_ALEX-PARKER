<?php
/*
  ./app/modeles/postsModele.php
  MODELE DES POSTS
*/

namespace App\Modeles\PostsModele;


/**
 * [findAll description]
 * @param  PDO   $connexion [description]
 * @return array            [description]
 */

// Les 10 derniers posts (trouver tout)
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




/**
 * [findOneById description]
 * @param  PDO   $connexion [description]
 * @param  int   $id        [description]
 * @return array            [description]
 */

// Détail d'un Post
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




/**
 * [insertOne description]
 * @param  PDO   $connexion [description]
 * @param  array $data      [description]
 * @return int              [description]
 */

// Ajouer un post (trouver un par id)
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




/**
 * [deleteOneById description]
 * @param  PDO  $connexion [description]
 * @param  int  $id        [description]
 * @return bool            [description]
 */

// Supprimer un post (supprimer un par id)
function deleteOneById(\PDO $connexion, int $id) :bool {
  $sql = "DELETE FROM posts
          WHERE id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id', $id, \PDO::PARAM_INT);
  return intval($rs->execute());
	/* intval va retourner
		 0 => si ca se passe mal.
		 1 => si ca c'est bien passé
		 En fct de ca on aura un message d'erreur
	*/
}




/**
 * [updateOneById description]
 * @param  PDO   $connexion [description]
 * @param  int   $id        [description]
 * @param  array $data      [description]
 * @return bool             [description]
 */

// Edit post (editer un par son id)
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
