<?php 

/*
Plugin Name: Custom Post Types
Plugin URI: 
Description: Custom Post Types for Fictional University Theme
Author: Brais Cao
Version: 1.0
Author URI: 
*/

function mariaada_post_types(){
    //CAMPUS POST TYPE
    register_post_type( 'trabajo', array(
        'capability_type' => 'trabajo',
        'map_meta_cap'=> true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' =>array(
            'slug' => 'trabajos' //URL slug para el archive
        ),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Trabajos',
            'add_new_item' => 'Añadir nuevo trabajo',
            'edit_item' => 'Edita Trabajo',
            'all_items' => 'Todos los Trabajos',
            'singular_name' => 'Trabajo'
        ),
        'menu_icon' => 'dashicons-hammer'
    ));
}
 
add_action( 'init', 'mariaada_post_types' );

?> 