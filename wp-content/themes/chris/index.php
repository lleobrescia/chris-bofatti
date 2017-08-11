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

    <section class="slider" ng-style="{height:home.height}" itemprop="mainEntityOfPage">
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

    <?php 
      // WP_Query arguments
      $args = array(
        'posts_per_page' => '3',
      );

      // The Query
      $query = new WP_Query( $args );

      if ( $query->have_posts() ):
      ?>

    <section class="container blog__home">
      <div class="row">
        <div class="col-xs-12">
          <div class="title center-block">
            <h1>BLOG</h1>
            <span>Veja um pouco das histórias <br>que já tive o prazer de contar</span>
          </div>
        </div>
        <!-- col-xs-12 -->

        <?php while ( $query->have_posts() ): $query->the_post(); ?>
          
        <article  class="col-sm-4" itemid="<?php the_ID(); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>  itemscope itemtype=" http://schema.org/BlogPosting">
          <span itemprop="author " itemscope itemtype="http://schema.org/Person" style="display:none">
            <span itemprop="name">Chris Bonfatti</span>
          </span>
          <time datetime="<?= get_the_date('c'); ?>" itemprop="datePublished" style="display:none"></time>
			    <time datetime="<?php the_modified_date('c'); ?>" itemprop="dateModified"  style="display:none"></time>
          <figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject" style="display:none">
            <meta itemprop="url" content="<?= get_the_post_thumbnail_url(); ?>" />
						<?php 
							$image = wp_get_attachment_image_src( get_post_thumbnail_id(),"full");
						?>
						<meta itemprop="height" content="<?= $image[2]; ?>" />
						<meta itemprop="width" content="<?= $image[1]; ?>" />
						<?php echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'itemscope' => 'image' ) );  ?>
          </figure>

          <div class="image__wapper">
            <div class="image__content" style=" background-image: url('<?= $image[0]; ?>')">
              <h2 class="entry-title" itemprop="name headline">
                <a itemprop="url" href="<?= esc_url( get_permalink() ); ?>" rel="bookmark" title="<?= get_the_title(); ?>">
                  <?php the_title(); ?>
                  <?php $categories = get_the_category(); ?> <br>
                  <span class="sub__titulo"> 
                    <span itemprop="genre"><?= $categories[0]->cat_name; ?></span>
                    <?php if(get_field('local')): ?>
                      || <?= get_field('local'); ?>
                    <?php endif; ?>
                  </span>
                </a>
              </h2>
            </div>
          </div>
        </article >
        <?php endwhile; ?>
      </div>
      <!-- row -->
    </section>
    <!-- blog__home -->
    <?php
    endif;
    // Restore original Post Data
    wp_reset_postdata();
    ?>
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
