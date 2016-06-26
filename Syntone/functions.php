<?php

add_filter('show_admin_bar', '__return_false');

function lm_dequeue_header_styles()
{
    wp_dequeue_style('cssmenumaker-base-styles');
    wp_dequeue_style('woocommerce-layout');
    wp_dequeue_style('woocommerce-smallscreen');
    wp_dequeue_style('woocommerce-general');

}
add_action('wp_head','lm_dequeue_header_styles',1);


add_theme_support( 'post-thumbnails' );

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
    global $post;
    return '<a class="moretag" href="'. str_replace(get_home_url(),"",get_permalink($post->ID)).'"> (Read More)...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


if ( function_exists('register_sidebar') )
    register_sidebar();

function new_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'new_excerpt_length');

function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );