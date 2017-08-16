<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package chris
 */

?>

<article class="blog__single" id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemid="<?php the_ID(); ?>" itemscope itemtype=" http://schema.org/BlogPosting">
  <time datetime="<?= get_the_date('c'); ?>" itemprop="datePublished" style="display:none"></time>
  <time datetime="<?php the_modified_date('c'); ?>" itemprop="dateModified"  style="display:none"></time>
  <meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>" />
  <figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject" style="display:none">
    <meta itemprop="url" content="<?= get_the_post_thumbnail_url(); ?>" />
    <?php
      $image = wp_get_attachment_image_src( get_post_thumbnail_id(), "full");
    ?>
    <meta itemprop="height" content="<?= $image[2]; ?>" />
    <meta itemprop="width" content="<?= $image[1]; ?>" />
    <?php echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'itemscope' => 'image' ) );  ?>
  </figure>
  <style>
    .entry-header{
      background: url('<?= $image[0]; ?>') no-repeat top center;
    }
  </style>
  <header class="entry-header">
  </header><!-- .entry-header -->


  <div class="container entry-content-top">
      <div class="row">
        <div class="col-xs-12 text-center">
          <a href="<?php $url_info = parse_url( home_url() ); echo trailingslashit( $url_info['path'] ); ?>/blog" class="back" title="Blog" rel="prev"></a>
          <h1 class="blog_single_title" itemprop="name headline">
            <?php the_title(); ?>
            <?php $categories = get_the_category(); ?> <br>
            <span class="sub__titulo"> 
              <span itemprop="genre"><?= $categories[0]->cat_name; ?></span>
                <?php if (get_field('local')) : ?>
                || <?= get_field('local'); ?>
                <?php endif; ?>
            </span>
          </h1>
        </div>
        <!-- col-xs-12  -->
      </div>
      <!-- row-->
    </div>
    <!-- container -->
   
  <div class=" container">
    <div class="row">
      <section class="col-xs-12" itemscope="articleBody">
        <?php the_content(); ?>
      </section>
      <!-- col-xs-12 -->
    </div>
    <!-- row -->

    <div class="row">
      <div class="col-xs-12 text-center comentarios">
        <h3>diga alguma coisa</h3>
        <div class="fb-comments" data-href="https://www.facebook.com/chrisbonfattiphotography" data-numposts="5"></div>
      </div>
    </div>
    <!-- row -->
        
  </div>
  <!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
