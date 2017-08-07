<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package chris
 */

get_header();

$images = get_field('imagens', 'option');
?>

<div id="primary" class="content-area" ng-app="app" ng-controller="HomeController as home">
  <main id="main" class="site-main">

    <section class="slider" ng-style="{height:home.height}">
        <?php if ($images) : ?>
      <ul class="bxslider">
        <?php foreach ($images as $image) : ?>
        
        <li itemprop="image" itemscope itemtype="http://schema.org/ImageObject" ng-style="{height:home.height}">
        
          <meta itemprop="url" content="<?= $image['url']; ?>" />
            <?php
            $slide = wp_get_attachment_image_src( $image['id'], "full");
            ?>
          <meta itemprop="height" content="<?= $slide[2]; ?>" />
          <meta itemprop="width" content="<?= $slide[1]; ?>" />
     
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" itemscope="image" >
        </li>
        <?php endforeach; ?>
      </ul>
        <?php endif; ?>
    </section>
    <!-- slider -->
  </main><!-- #main -->
</div><!-- #primary -->

<script>
  (function () {
  'use strict';

  angular.module('app', []); // Startup

    angular
    .module('app')
    .controller('HomeController', HomeController);

  HomeController.$inject = ['$window'];

  function HomeController($window) {
    var vm = this;
    vm.height = $window.innerHeight - 227;
    vm.height += 'px';
  }
})();
</script>

<?php
get_footer();
