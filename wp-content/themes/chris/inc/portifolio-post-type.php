<?php
/**
* Register a post type, with REST API support
*
* Based on example at: http://codex.wordpress.org/Function_Reference/register_post_type
* @package chris
*/
add_action( 'init', 'chris_custom_post_portfolio' );
function chris_custom_post_portfolio()
{
    $labels = array(
    'name'               => _x( 'Portfolio', 'post type general name' ),
    'singular_name'      => _x( 'Portfolio', 'post type singular name' ),
    'menu_name'          => _x( 'Portfolio', 'admin menu' ),
    'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar' ),
    'add_new'            => _x( 'Adicionar Novo', 'item' ),
    'add_new_item'       => __( 'Adicionar Novo' ),
    'new_item'           => __( 'Novo' ),
    'update_item'        => __( 'Salvar' ),
    'edit_item'          => __( 'Editar Portfolio' ),
    'view_item'          => __( 'Ver Portfolio' ),
    'all_items'          => __( 'Todos Portfolios' ),
    'search_items'       => __( 'Procurar Portfolio' ),
    'parent_item_colon'  => __( 'Parent Itens:' ),
    'not_found'          => __( 'Portfolio não encontrado.' ),
    'not_found_in_trash' => __( 'Portfolio não encontrado.' )
    );
    
    $args = array(
    'labels'                => $labels,
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true,
    'show_in_rest'          => true,
    'show_in_menu'          => true,
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'portfolio' ),
    'capability_type'       => 'post',
    'has_archive'           => true,
    'menu_icon'             => 'dashicons-camera',
    'hierarchical'          => false,
    'menu_position'         => 5,
    'rest_base'             => 'portfolio',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'supports'              => array( 'title','assunto')
    );
    
    register_post_type( 'portfolio', $args );
}

add_action( 'init', 'chris_create_assunto_cat' );

function chris_create_assunto_cat()
{
    register_taxonomy(
        'assunto',
        'portfolio',
        array(
            'label'        => __( 'Assunto' ),
            'rewrite'      => array( 'slug' => 'assunto' ),
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
}

/*
replacing the default "Enter title here" placeholder text in the title input box
with something more descriptive can be helpful for custom post types
place this code in your theme's functions.php or relevant file
source: http://flashingcursor.com/wordpress/change-the-enter-title-here-text-in-wordpress-963
*/
function chris_change_default_title($title)
{
    $screen = get_current_screen();
    if ('portfolio' == $screen->post_type) {
        $title = 'Título';
    }
    
    return $title;
}
add_filter( 'enter_title_here', 'chris_change_default_title' );
