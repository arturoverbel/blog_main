<?php

function my_theme_enqueue_styles() {

    $parent_style = 'personalblogily_style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    //wp_enqueue_script('scroll_fixed_js', get_stylesheet_directory_uri() . '/js/scroll_fixed.js', array('jquery'), wp_get_theme()->get('Version') ) ;
    //wp_enqueue_script('resize_iframe', get_stylesheet_directory_uri() . '/js/resize_iframe.js', array('jquery'), wp_get_theme()->get('Version') ) ;
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles');
