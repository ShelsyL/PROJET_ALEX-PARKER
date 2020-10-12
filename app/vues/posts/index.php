<?php
/*
	./app/vues/posts/index.php
	Variables disponibles :
    	- $posts : ARRAY(ARRAY(id, title, text, created_at, quote, category_id))
*/
?>





<!-- LISTE DES POSTS -->

<!-- Blog Post Start -->
<div class="col-md-12 blog-post">
  <?php foreach ($posts as $post):
    $created_at = strtotime($post['created_at']); // On transforme la date en champs de type date
  ?>
    <div class="post-title">
      <a href="single.html"><h1><?php echo $post['title']; ?></h1></a>
    </div>
    <div class="post-info">
      <span><?php echo date('Y\-m\-d', $created_at) ?></span> | <span>Life style</span>
    </div>
    <p><?php echo \Noyau\Fonctions\tronquer($post['text'], 150); ?></p>
    <a href="single.html" class="button button-style button-anim fa fa-long-arrow-right"><span>Read More</span></a>

  <?php endforeach; ?>
</div>
<!-- Blog Post End -->
<!-- 2016-03-03 -->
