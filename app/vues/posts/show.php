<?php
/*
	./app/vues/posts/show.php
	Variables disponibles :
    -$posts: ARRAY(ARRAY(id AS postId, title, text, created_at AS postDate, quote, category_id))
    -$categories: ARRAY(ARRAY(id AS categorieId, name AS categorieName, created_at))
*/
?>

<div class="row">

  <div class="sub-title">
    <a href="post" title="Go to Home Page"><h2>Back Home</h2></a>
    <a href="#comment" class="smoth-scroll"><i class="icon-bubbles"></i></a>
  </div>

  <div class="col-md-12 content-page">
    <div class="col-md-12 blog-post">

      <!-- Post Headline Start -->
      <div class="post-title">
        <h1><?php echo $post['title']; ?></h1>
      </div>
      <!-- Post Headline End -->

      <!-- Post Detail Start -->
      <div class="post-info">

        <!-- DATE -->
        <?php $postDate = strtotime($post['postDate']); ?>
        <span><?php echo date('Y\-m\-d', $postDate) ?></span> | <span><?php echo $post['categorieName']; ?></span>
      </div>
      <!-- Post Detail End -->

      <!-- TEXT -->
      <p><?php echo $post['text']; ?></p>

      <!-- Post Blockquote (Italic Style) Start -->
      <!-- QUOTE -->
      <blockquote class="margin-top-40 margin-bottom-40">
        <p><?php echo $post['quote']; ?></p>
      </blockquote>
      <!-- Post Blockquote (Italic Style) End -->

      <!-- Post Buttons -->
      <div>
        <a href="posts/edit/form/<?php echo $post['postId']; ?>" type="button" class="edit">Edit Post</a> |
        <a href="posts/delete/<?php echo $post['postId']; ?>"  type="button" class="delete" role="button">Delete Post</a>
      </div>
      <!-- Post Buttons End -->




    </div>
  </div>

</div>
