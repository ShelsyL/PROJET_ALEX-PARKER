<?php
/*
	./app/vues/posts/index.php
	Variables disponibles :
    -$posts: ARRAY(ARRAY(id AS postId, title, text, created_at AS postDate, quote, category_id))
    -$categories: ARRAY(ARRAY(id AS categorieId, name AS categorieName, created_at))
*/
?>

<!-- LISTE DES POSTS -->


<div class="row">

  <div class="col-md-12 content-page">

    <!-- ADD A POST -->
    <div>
      <a href="posts/add/form" type="button" class="btn btn-primary">Add a Post</a>
    </div>
    <!-- ADD A POST END -->

    <!-- Blog Post Start -->
    <div class="col-md-12 blog-post">
      <?php foreach ($posts as $post):
      // Transformation de la date en champs de type date
      $postDate = strtotime($post['postDate']);
      ?>

      <!-- TITRE - SLUG URL -->
      <div class="post-title">
        <a href="posts/<?php echo $post['postId']; ?>/<?php echo \Noyau\Fonctions\slugify($post['title']); ?>">
          <h1><?php echo $post['title']; ?></h1>
        </a>
      </div>

      <!-- DATE | CATEGORIE-->
      <div class="post-info">
        <span><?php echo date('Y\-m\-d', $postDate) ?></span> | <span><?php echo $post['categorieName']; ?></span>
      </div>

      <!-- TEXT -->
      <p><?php echo \Noyau\Fonctions\tronquer($post['text'], 150); ?></p>
      <a href="posts/<?php echo $post['postId']; ?>/<?php echo \Noyau\Fonctions\slugify($post['title']); ?>" class="button button-style button-anim fa fa-long-arrow-right"><span>Read More</span></a>

      <?php endforeach; ?>
    </div>
    <!-- Blog Post End -->

  </div>
</div>
