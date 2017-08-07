<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chris
 */

?>
<!doctype html>
<!--[if IE 7]>
<html class="ie ie7 no-js" <?php language_attributes(); ?> >
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" <?php language_attributes(); ?> >
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html class="no-js"  <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>
  <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'chris' ); ?></a>

	<header id="masthead" class="site-header">
    <div class="container">
      <div class="row">
        <div class="site-branding col-sm-5">
          <a href="<?php $url_info = parse_url( home_url() ); echo trailingslashit( $url_info['path'] ); ?>" title="<?php echo $blog_title; ?>" rel="home" class="logo">
            <?php the_header_image_tag(); ?>
          </a>
        </div>
        <!-- .site-branding -->

        <div class="col-sm-7">
          <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <?php
              wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
              ) );
            ?>
          </nav><!-- #site-navigation -->
        </div>
        <!-- col-sm-6 -->
      </div>
      <!-- row -->

    </div>
    <!-- container -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
