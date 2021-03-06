<?php
/**
 * chris functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chris
 */

if (! function_exists( 'chris_setup' )) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function chris_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on chris, use a find and replace
		 * to change 'chris' to the name of your theme in all the template files.
		 */
        load_theme_textdomain( 'chris', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support( 'title-tag' );

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'chris' ),
        ) );

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'chris_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'chris_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chris_content_width()
{
    $GLOBALS['content_width'] = apply_filters( 'chris_content_width', 640 );
}
add_action( 'after_setup_theme', 'chris_content_width', 0 );

function dequeue_jquery_migrate(&$scripts)
{
    if (!is_admin()) {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', array( 'jquery-core' ) );
    }
}

add_filter( ???wp_default_scripts???, ???dequeue_jquery_migrate??? );

/**
 * Enqueue scripts and styles.
 */
function chris_scripts()
{
    wp_enqueue_style( 'bxslider-style', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.css' );

    wp_enqueue_style( 'fancybox-style', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.css' );

    wp_enqueue_style( 'animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css' );

    wp_enqueue_style( 'chris-fonts', get_template_directory_uri() . '/fonts/stylesheet.css' );

    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );

    wp_enqueue_style( 'bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css' );
  
    wp_enqueue_style( 'chris-style', get_stylesheet_uri(), array('bxslider-style','chris-fonts','font-awesome','bootstrap','animate-css', 'fancybox-style')  );

    wp_enqueue_script( 'angular', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js', '0.0.1' );

    wp_enqueue_script( 'angular-animate', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular-animate.min.js', array('angular'), '0.0.1' );

    wp_enqueue_script( 'bxslider', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '0.0.1' );

    wp_enqueue_script( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js', array('jquery'), '0.0.1' );

    wp_enqueue_script( 'modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array('jquery'), '0.0.1' );
  
    wp_enqueue_script( 'chris-theme', get_template_directory_uri() . '/js/theme.js', array('jquery'), '0.0.1' );

    wp_enqueue_script( 'chris-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'chris-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if (is_singular() && comments_open() && get_option( 'thread_comments' )) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'chris_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined( 'JETPACK__VERSION' )) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Menus extras 
 */
require get_template_directory() . '/inc/options-page.php';

/**
 * Portfolio
 */
 require get_template_directory() . '/inc/portifolio-post-type.php';
