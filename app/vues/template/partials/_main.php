<?php
/*
	./app/vues/template/partials/_main.php
*/
?>

<div id="main">
    <div class="container">
        <div class="row">



             <!-- About Me (Left Sidebar) Start -->
             <div class="col-md-3">
               <div class="about-fixed">

                 <div class="my-pic">
                    <a href="index.html"><img src="assets/images/pic/my-pic.png" alt=""></a>
                     <nav id="menu">
                       <ul class="menu-link">
                           <li><a href="index.html">My blog</a></li>
                        </ul>
                     </nav>

                     <!-- CATEGORIES -->
                       <?php
                         // Je passe directement par le chargement de la vue
                         // $categories est directement appelé par le modele et renvois un tableau indexé de tableau associatif.
                          include_once '../app/modeles/categoriesModele.php';
                          $categories = \App\Modeles\CategoriesModele\findAll($connexion);
                          include '../app/vues/categories/index.php';
                        ?>
                      <!-- /FIN CATEGORIES -->

                  </div>



                  <div class="my-detail">

                    <div class="white-spacing">
                        <h1>Alex Parker</h1>
                        <span>Web Developer</span>
                    </div>

                   <ul class="social-icon">
                     <li><a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                     <li><a href="#" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
                     <li><a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                     <li><a href="#" target="_blank" class="github"><i class="fa fa-github"></i></a></li>
                    </ul>

                </div>
              </div>
            </div>
            <!-- About Me (Left Sidebar) End -->





             <!-- Blog Post (Right Sidebar) Start -->
             <div class="col-md-9">
                <div class="col-md-12 page-body">
                  <?php echo $content; ?>
                </div>


<?php include '../app/vues/template/partials/_footer.php'; ?>


              </div>
              <!-- Blog Post (Right Sidebar) End -->

        </div>
     </div>
  </div>
