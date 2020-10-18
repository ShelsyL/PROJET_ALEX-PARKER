<?php
/*
	./app/vues/categories/index.php
	Variables disponibles :
    	- $categories : ARRAY(ARRAY(id, name))
*/
?>

<!-- CATEGORIES -->
<ul class="menu-link">
  <?php foreach ($categories as $category): ?>
    <li>
      <a href="index.html">
        <?php echo $category['name']; ?>[xx]</a>
    </li>
  <?php endforeach; ?>
 </ul>
 <!-- /FIN CATEGORIES -->
