<?php
/**
 * chris Home Slider
 *
 * @package chris
 */

/**
 * Adiciona um menu para slides
 *
 */

function chris_acf_init()
{
    if (function_exists('acf_add_options_page')) {
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
