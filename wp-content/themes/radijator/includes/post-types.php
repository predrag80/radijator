<?php 

    function create_product_post_type() {
        register_post_type('product',
            array(
                'labels' => array(
                    'name' => __('Products'),
                    'singular_name' => __('Product'),
                    'add_new_item'  => 'Add New Product'

                ),
                'show_in_nav_menus' => true,
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'products'),
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            )
        );

        register_taxonomy(
            'product_category',
            'product',
            array(
                'label' => __('Product Categories'),
                'rewrite' => array('slug' => 'proizvodni-program'),
                'hierarchical' => true,
                'show_in_nav_menus' => true
            )
        );
    }
    add_action('init', 'create_product_post_type');

    function create_slider_post_type() {
        register_post_type('slider',
            array(
                'labels' => array(
                    'name' => __('Slider'),
                    'singular_name' => __('Slider'),
                    'add_new_item'  => 'Add New Slide'

                ),
                'public' => true,
                'supports' => array('title', 'editor', 'thumbnail'),
                'show_in_rest' => true
            )
        );
    }
    add_action('init', 'create_slider_post_type'); 