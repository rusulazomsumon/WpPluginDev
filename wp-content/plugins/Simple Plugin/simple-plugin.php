<?php

/*
Plugin Name: Simple Plugin
Plugin URI: https://rusulazom.xyz/
Description: Simple Plugin for testing wp plugin
Version: 1.0.0
Author: rasumon
Author URI: https://rusulazom.xyz/wordpress-plugins/
License: GPLv2 or later
Text Domain: simpleplugin
*/

function simple_plugin_register_post_type() {
    register_post_type( 'simple_plugin',
        array(
            'labels' => array(
                'name' => __( 'Simple Plugins' ),
                'singular_name' => __( 'Simple Plugin' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
}
add_action( 'init', 'simple_plugin_register_post_type' );

function ePaper_button( $title ) {
    $title .= '<a href="#" class="ePaper-button">ePaper</a>';
    return $title;
}
add_filter( 'the_title', 'ePaper_button' );


function ePaper_button_styles() {
    wp_enqueue_style( 'ePaper-button', plugin_dir_url( __FILE__ ) . 'ePaper-button.css' );
}
add_action( 'wp_enqueue_scripts', 'ePaper_button_styles' );

