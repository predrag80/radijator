<?php
  
    /**
     * Load assets
     *
     * @package Radijator
     */
    function radijator_load_styles() {
        wp_enqueue_style('radijator_style', get_theme_file_uri() . '/assets/dist/css/bundle.min.css', array(), wp_get_theme()->get( 'Version' ));
        wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', false );
    }
        add_action( 'wp_enqueue_scripts', 'radijator_load_styles' );
    
    /**
     * Load JS
     */
    function radijator_load_js() {
        wp_enqueue_script('radijator_script', get_theme_file_uri() . '/assets/dist/js/bundle.js', array(), wp_get_theme()->get( 'Version' ), true );
    }
    add_action( 'wp_enqueue_scripts', 'radijator_load_js' );
    
    /**
     * Load JS library
     */

    