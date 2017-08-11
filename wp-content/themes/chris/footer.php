<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chris
 */

?>

  </div>
  <!-- #content -->

  <footer id="colophon" class="site-footer text-center">
    <div class="footer_social_holder">
      <a class="footer__social footer_social-insta" href="<?php the_field('link_instagram', 'option'); ?>" title="Chris Bonfatti Photography Instagram"
        target="_blank" rel="nofollow"></a>
      <a class="footer__social footer_social-face" href="<?php the_field('link_facebook', 'option'); ?>" title="Chris Bonfatti Photography Facebook"
        target="_blank" rel="nofollow"></a>
    </div>
    <!-- footer_social_holder -->
    <div class="site-info text-center">
      <mark class="footer__tel"><?php the_field('telefone_de_contato', 'option'); ?></mark>
      <a class="footer__email" href="mailto:<?php the_field('e-mail_de_contato', 'option'); ?>" data-rel="external" rel="external" title="Chris Bonfatti Photography E-mail"><?php the_field('e-mail_de_contato', 'option'); ?></a>
      <span class="footer__ass">Chris Bonfatti Photography <?= date("Y"); ?></span>
    </div>
    <!-- .site-info -->
  </footer>
  <!-- #colophon -->
  </div>
  <!-- #page -->

  <?php wp_footer(); ?>

  </body>

  </html>