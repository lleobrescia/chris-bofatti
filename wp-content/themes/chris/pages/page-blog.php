<?php
/**
 * Template name: Blog
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

  $banner = get_field('blog_banner',get_the_ID());
  ?>
<style>
.banner__blog{
  background: url('<?= $banner['url']; ?>') no-repeat center;
  height:481px
}
</style>

  <div id="primary" class="content-area blog"  itemscope itemtype="http://schema.org/Blog">
    <main id="main" class="site-main">
      <header class="banner__blog">
        <div class="container">
          <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
              <h1 class="text-center pull-left">
                Posiciona, enquadra, <br>
                fotometra, clica... <br>
                <span>... o resto é </span> <br>
                <strong>história.</strong>
              </h1>
            </div>
            <!-- col-sm-8 -->
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </header>

      <section class="container">
      <div class="row filter__assunto">
        <div class="col-xs-12">
          <span class="filter__title">Filtre por assunto:</span>
          <button type="button" ng-click="port.assunto = 'todos'" class="filter__single"  ng-class="{'active' : port.assunto == 'todos'}">Todos</button>
          <?php 
            $categories = get_categories( array(
              'orderby' => 'name',
              'order'   => 'ASC'
            ));
            foreach ($categories as $term):
              
        ?>
            <button type="button" ng-click="port.assunto = '<?= $term->slug; ?>'" class="filter__single" ng-class="{'active' : port.assunto == '<?= $term->slug; ?>'}"><?= $term->name; ?></button>
            <?php endforeach; ?>
        </div>
      </div>
        <div class="row">
          <?php
                $query = new WP_Query(array(
                  'posts_per_page' => '-1',
                ));
                if ( $query->have_posts() ):
                  while ( $query->have_posts() ): $query->the_post();
              ?>
            <div class="col-sm-4 animated fadeInDown" itemid="<?php the_ID(); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>  itemscope itemtype=" http://schema.org/BlogPosting">
              <div class="image__wapper">
                <header class="image__content" style=" background-image: url('<?= $image[0]; ?>')">
                  <h2 class="entry-title" itemprop="name headline">
                    <a itemprop="url" href="<?= esc_url( get_permalink() ); ?>" rel="bookmark" title="<?= get_the_title(); ?>">
                      <?php the_title(); ?>
                      <?php $categories = get_the_category(); ?> <br>
                      <span class="sub__titulo"> 
                          <span itemprop="genre"><?= $categories[0]->cat_name; ?></span>
                      <?php if(get_field('local')): ?> ||
                      <?= get_field('local'); ?>
                        <?php endif; ?>
                      </span>
                    </a>
                  </h2>
                </header>
              </div>
              <!-- image__wapper -->
              <span itemprop="author " itemscope itemtype="http://schema.org/Person" style="display:none">
                <span itemprop="name">Chris Bonfatti</span>
              </span>
              <time datetime="<?= get_the_date('c'); ?>" itemprop="datePublished" style="display:none"></time>
              <time datetime="<?php the_modified_date('c'); ?>" itemprop="dateModified" style="display:none"></time>
              <figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject" style="display:none">
                <meta itemprop="url" content="<?= get_the_post_thumbnail_url(); ?>" />
                <?php 
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id(),"full");
                ?>
                <meta itemprop="height" content="<?= $image[2]; ?>" />
                <meta itemprop="width" content="<?= $image[1]; ?>" />
                <?php echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'itemscope' => 'image' ) );  ?>
              </figure>
            </div>
            <!-- col-sm-4 -->
            <?php endwhile; wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
      </section>
      <!-- container -->
    </main>
    <!-- #main -->
  </div>
  <!-- #primary -->

  <?php
get_footer();