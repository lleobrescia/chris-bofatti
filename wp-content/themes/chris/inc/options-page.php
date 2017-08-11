<?php
/**
* Custom options page for admin menu
*
* Use Advanced Custom Fields Plugin
*
* @link https://www.advancedcustomfields.com/resources/options-page/
*
* @package chris
*/

function chris_acf_init()
{
    if (function_exists('acf_add_options_page')) {
      acf_add_options_page(array(
        'page_title'  => __('Theme Information', 'chris'),
        'menu_title'  => __('Theme Information', 'chris'),
        'menu_slug'   => 'information',
        'capability'  => 'edit_posts'
      ));

      // Slider na home
      acf_add_options_page(array(
        'page_title'  => __('Slider', 'chris'),
        'menu_title'  => __('Slider', 'chris'),
        'menu_slug'   => 'slider',
        'capability'  => 'edit_posts',
        'icon_url' => 'dashicons-slides',
        'position' => 5
      ));
    }
}


add_action('acf/init', 'chris_acf_init');
