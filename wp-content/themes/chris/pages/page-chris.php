<?php
/**
 *
 * Template name: Sobre
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package chris
 */

get_header(); ?>

    <div id="primary" class="content-area sobre" itemscope itemtype="http://schema.org/ProfilePage">
        <?php  while (have_posts()) :
            the_post();?>
        <main id="main" class="site-main" itemprop="about" itemscope itemtype="http://schema.org/Person">
          <meta itemprop="gender" content="Female">
          <meta itemprop="alternateName" content="Chris">
          <meta itemprop="givenName" content="Christiana">
          <meta itemprop="familyName" content="Bonfatti">
          <meta itemprop="telephone" content="<?php the_field('telefone_de_contato', 'option'); ?>">
          <div itemprop="nationality" itemscope itemtype="http://schema.org/Country" style="display:none">
            <span itemprop="name">Brazil</span>
          </div>
          <meta itemprop="email" content="<?php the_field('e-mail_de_contato', 'option'); ?>" >


          <header class="page__banner">
            <div class="container">
              <div class="row">
                <div class="col-xs-5 hidden-xs">
                  <figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                        <?php
                        $imagem = get_field('imagem_banner');
                        echo wp_get_attachment_image( $imagem['id'], 'full', '', array('itemprop' => 'image') );
                        ?>
                      <meta itemprop="url" content="<?= $imagem['url']; ?>" />
                      <meta itemprop="name" content="Chris Bonfattti" />
                      <meta itemprop="uploadDate" content="<?= $imagem['date']; ?>" />
                      <meta itemprop="datePublished" content="<?= $imagem['date']; ?>" />
                      <meta itemprop="dateModified" content="<?= $imagem['modified']; ?>" />
                      <meta itemprop="fileFormat" content="<?= $imagem['mime_type']; ?>" />
                      <meta itemprop="thumbnailUrl" content="<?= $imagem['sizes']['thumbnail']; ?>" />
                      <meta itemprop="height" content="<?= $imagem['height']; ?>" />
                      <meta itemprop="width" content="<?= $imagem['width']; ?>" />
                      <meta itemprop="representativeOfPage" content="true" />
                  </figure>
                </div>
                <!-- col-sm-5 -->
                <div class="col-xs-7 page_banner_text">
                  <blockquote>
                    Me chamo <mark>Christiana</mark>, <br>
                    <span>mas podem me chamar de </span>  <br>
                    <strong>Chris.</strong> <br>
                  </blockquote>
                  <div style="color: #bbbbbb;font-size: 0.875em;">
                        <?php the_field('texto_banner'); ?>
                  </div>
                </div>
                <!-- col-sm-7 -->
              </div>
              <!-- row -->
            </div>
            <!-- container -->
          </header>
          <!-- page__banner -->

          <section class="container" itemscope itemprop="description" style="margin-top:35px;">
            <div class="row">
              <div class="col-sm-9 col-sm-offset-1">
                <div class="minha__historia">
                    <h2>Minha História</h2>
                    <?php the_field('minha_historia'); ?>
                </div>
                <!-- minha__historia -->
              </div>
              <!-- col-sm-9 col-sm-offset-1 -->
            </div>
            <!-- row -->
            <div class="row">
              <div class="col-sm-9 col-sm-offset-1 meu__objetivo">
                <h2>Meu Objetivo</h2>
                <?php the_field('meu_objetivo'); ?>
              </div>
            </div>
            <!-- row -->

            <div class="row">
              <div class="col-xs-12">
                <figure class="text-center" itemprop="image" itemscope itemtype="http://schema.org/ImageObject" style="margin:67px 0;">
                    <?php
                      $imagem = get_field('imagem');
                      echo wp_get_attachment_image( $imagem['id'], 'full', '', array('itemprop' => 'image') );
                    ?>
                    <meta itemprop="url" content="<?= $imagem['url']; ?>" />
                    <meta itemprop="uploadDate" content="<?= $imagem['date']; ?>" />
                    <meta itemprop="datePublished" content="<?= $imagem['date']; ?>" />
                    <meta itemprop="dateModified" content="<?= $imagem['modified']; ?>" />
                    <meta itemprop="fileFormat" content="<?= $imagem['mime_type']; ?>" />
                    <meta itemprop="thumbnailUrl" content="<?= $imagem['sizes']['thumbnail']; ?>" />
                    <meta itemprop="height" content="<?= $imagem['height']; ?>" />
                    <meta itemprop="width" content="<?= $imagem['width']; ?>" />
                    <meta itemprop="representativeOfPage" content="true" />
                </figure>
              </div>
              <!-- col-xs-12 -->
            </div>
            <!-- row -->
          </section>
          <!-- container -->

        </main><!-- #main -->
        <?php endwhile; ?>

    </div><!-- #primary -->
<?php
get_footer();
