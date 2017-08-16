<?php
/**
 * Template name: Portfolio
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package chris
 */

get_header(); ?>

  <script>
    <?php $url_info = parse_url( home_url() );  ?>
    (function () {
      'use strict';
      angular.module('app', ['ngAnimate']); // Startup
      angular
        .module('app')
        .controller('PortfolioController', PortfolioController);
      PortfolioController.$inject = ['$http'];

      function PortfolioController($http) {
        var vm = this;

        vm.assunto = 'todos';

        }
    })();
  </script>
  <?php
   $banner = get_field('banner', get_the_ID());
   ?>
  <style>
  .banner{
    background: url('<?= $banner['url']; ?>') no-repeat center;
    height:481px
  }
  </style>
  <div id="primary" class="content-area" ng-app="app" ng-controller="PortfolioController as port">
    <header class="banner">
      <div class="container">
        <div class="row">
          <div class="col-sm-11 col-sm-offset-1">
            <h1>
              Um pouco do<br>
              meu trabalho: <br>
              <span>uma amostra grátis de</span> <strong>alegria.</strong>
            </h1>
          </div>
        </div>
      </div>

    </header>
    <main id="main" class="site-main container">
      <div class="row filter__assunto">
        <div class="col-xs-12">
          <span class="filter__title">Filtre por assunto:</span>
          <button type="button" ng-click="port.assunto = 'todos'" class="filter__single"  ng-class="{'active' : port.assunto == 'todos'}">Todos</button>
            <?php $terms = get_terms('assunto'); foreach ($terms as $term) :?>
          <button type="button" ng-click="port.assunto = '<?= $term->slug; ?>'" class="filter__single" ng-class="{'active' : port.assunto == '<?= $term->slug; ?>'}"><?= $term->name; ?></button>
            <?php endforeach; ?>
        </div>
      </div>
        <?php
      // WP_Query arguments
        $argsPortfolio = array(
        'posts_per_page' => '-1',
        'post_type'      => 'portfolio'
        );

      // The Query
        $portfolio = new WP_Query( $argsPortfolio );

        if ($portfolio->have_posts()) :
        ?>

        <section class="row portfolio__list" >
        <?php while ($portfolio->have_posts()) :
              $portfolio->the_post();
              $image = get_field('imagem');
              $assunto = get_the_terms( get_the_ID(), 'assunto' );
        ?>
          <div class="col-sm-4 portfolio__single fadeInDown animated <?= $assunto[0]->slug ?>" itemscope itemtype="http://schema.org/Photograph" ng-class="port.assunto == '<?= $assunto[0]->slug ?>' || port.assunto == 'todos' ? 'zoomIn' : 'zoomOut'"  itemid="<?php the_ID(); ?>" id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>
            <time datetime="<?= get_the_date('c'); ?>" itemprop="datePublished" style="display:none"></time>
            <time datetime="<?php the_modified_date('c'); ?>" itemprop="dateModified"  style="display:none"></time>
            <meta itemprop="name" content="<?php the_title(); ?>" />
            <span itemprop="author" itemscope itemtype="http://schema.org/Person" style="display:none">
              <span itemprop="name">Chris Bonfatti</span>
            </span>
            <figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
              <meta itemprop="url" content="<?= $image['url']; ?>" />
                <?php
                $imageSource = wp_get_attachment_image_src( $image['id'], "full");
                ?>
              <meta itemprop="height" content="<?= $imageSource[2]; ?>" />
              <meta itemprop="width" content="<?= $imageSource[1]; ?>" />
              <a href="<?= $image['url']; ?>" data-fancybox="gallery" title="<?php the_title(); ?>">
                <?php echo wp_get_attachment_image( $image['id'], 'full', array( 'itemscope' => 'image' ) );  ?>
              </a>
            </figure>
          </div>
        <?php endwhile; ?>
        <?php
        endif;
            // Restore original Post Data
            wp_reset_postdata();
        ?>
      </section>

    </main>
    <!-- #main -->
  </div>
  <!-- #primary -->
    <?php
    get_footer();
