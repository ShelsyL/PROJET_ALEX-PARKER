<?php
/*
	./app/vues/posts/show.php
	Variables disponibles :
    	- $post : ARRAY(id, title, text, created_at, quote,category_id)
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
        <?php $created_at = strtotime($post['created_at']); ?>
        <span><?php echo date('Y\-m\-d', $created_at) ?></span> | <span>Life style</span>
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
        <a href="form.html" type="button" class="btn btn-primary">Edit Post</a>
        <a href="#" type="button" class="btn btn-secondary" role="button">Delete Post</a>
      </div>
      <!-- Post Buttons End -->




    </div>
  </div>

</div>
