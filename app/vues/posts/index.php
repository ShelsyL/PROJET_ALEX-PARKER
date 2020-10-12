<?php
/*
	./app/vues/posts/index.php
	Variables disponibles :
    	- $posts : ARRAY(ARRAY(id, title, content, created_at, quote, category_id))
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
      $created_at = strtotime($post['created_at']);
      ?>

      <!-- TITRE - SLUG URL -->
      <div class="post-title">
        <a href="posts/<?php echo $post['id']; ?>/<?php echo \Noyau\Fonctions\slugify($post['title']); ?>">
          <h1><?php echo $post['title']; ?></h1>
        </a>
      </div>

      <!-- DATE -->
      <div class="post-info">
        <span><?php echo date('Y\-m\-d', $created_at) ?></span> | <span>Life style</span>
      </div>

      <!-- TEXT -->
      <p><?php echo \Noyau\Fonctions\tronquer($post['content'], 150); ?></p>
      <a href="posts/<?php echo $post['id']; ?>/<?php echo \Noyau\Fonctions\slugify($post['title']); ?>" class="button button-style button-anim fa fa-long-arrow-right"><span>Read More</span></a>

      <?php endforeach; ?>
    </div>
    <!-- Blog Post End -->

  </div>
</div>
