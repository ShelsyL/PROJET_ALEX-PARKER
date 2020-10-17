<?php
/*
  ./app/vues/posts/editForm.php
  Variables disponibles:
    -$posts: ARRAY(ARRAY(id AS postId, title, text, created_at AS postDate, quote, category_id))
    -$categories: ARRAY(ARRAY(id AS categorieId, name AS categorieName, created_at))
*/
 ?>

<div class="row">


  <div class="sub-title">
    <a href="posts" title="Go to Home Page"><h2>Back Home</h2></a>
    <a href="#comment" class="smoth-scroll"><i class="icon-bubbles"></i></a>
  </div>


  <div class="col-md-12 content-page">
    <div class="col-md-12 blog-post">


        <!-- Post Headline Start -->
      <div class="post-title">
        <h1><?php echo $title ?></h1>
      </div>
           <!-- Post Headline End -->

        <!-- Form Start -->
        <form action="posts/edit/<?php echo $post['postId']; ?>" method="post">

          <!-- TITLE -->
          <div class="form-group">
            <label for="title">Title</label>
            <input id="title" type="text" name="title" class="form-control" placeholder="Enter your title here" value="<?php echo $post['title']; ?>"/>
          </div>
          <!-- /FIN TITLE -->

          <!-- TEXT -->
          <div class="form-group">
            <label for="text">Text</label>
            <textarea id="text" name="text" class="form-control" rows="5" placeholder="Enter your text here"><?php echo $post['text']; ?></textarea>
          </div>
          <!-- /FIN TEXT -->

          <!-- QUOTE -->
          <div class="form-group">
            <label for="quote">Quote</label>
            <textarea id="quote" name="quote" class="form-control" rows="5" placeholder="Enter your quote here"><?php echo $post['quote']; ?></textarea>
          </div>
          <!-- /FIN QUOTE -->

          <!-- CATEGORIES -->
          <div class="form-group">
            <label for="categorie">Category</label>
            <select id="categorie" name="categorie" class="form-control">
              <option disabled selected>Select your category</option>
              <?php foreach ($categories as $categorie): ?>

                <!-- si c'est l'id que l'on rechercher on selectionne l'option dans la liste -->
                <option
                value="<?php echo $categorie['id']; ?>"
                <?php if($categorie['id'] == $post['categorieId']) {echo 'selected="selected"';}?>>
                <?php echo $categorie['name']; ?>
              </option>

            <?php endforeach; ?>
            </select>
          </div>
          <!-- /FIN CATEGORIES -->

          <!-- SUBMIT | RESET -->
          <div>
            <input class="btn btn-primary" type="submit" value="submit" />
            <input class="btn btn-secondary" type="reset" value="reset" />
          </div>
          <!-- /FIN SUBMIT | RESET -->

        </form>
        <!-- Form End -->




    </div>
  </div>

</div>
