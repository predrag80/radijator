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
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
            )
        );

        register_taxonomy(
            'product_category',
            'product',
            array(
                'label' => __('Category'),
                'rewrite' => array('slug' => 'proizvodni-program'),
                'hierarchical' => true,
            )
        );
    }
    add_action('init', 'create_product_post_type');