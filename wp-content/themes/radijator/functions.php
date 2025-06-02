<?php 

define( 'RADIJATOR_THEME_PATH', get_stylesheet_directory() );
define( 'RADIJATOR_THEME_URI', get_stylesheet_directory_uri() );

require_once 'includes/load_assets.php';
include_once 'includes/post-types.php';
include_once 'includes/nav_walker.php';

add_theme_support('post-thumbnails');
add_theme_support('editor-styles');
add_editor_style( 'editor-style.css' );



/**
 * Load Font Awesome css.
 */
function r_enqueue_styles() {
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css', array(), '6.6.0' );
	wp_enqueue_style( 'swiper-slider-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');

	
}

add_action( 'wp_enqueue_scripts', 'r_enqueue_styles', 15 );


function r_external_sources() {
	wp_enqueue_script( 'swiper-slider-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '', true );
}

add_action( 'wp_enqueue_scripts', 'r_external_sources', 16 );


add_filter( 'show_admin_bar', '__return_false' );



/**
 * Add Theme Support.
 */
if ( ! function_exists( 'radijator_setup' ) ) {
	function radijator_setup() {
		register_nav_menus(
			array(
				'header_menu' => __( 'Header Menu', 'radijator' ),
				'products_menu' => __( 'Products Menu', 'radijator' ),
				'footer_menu' => __( 'Footer Menu', 'radijator' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'radijator_setup' );

/* Breadcrumbs */
function custom_breadcrumbs() {
    $home = 'Home';
    $blog = 'Products'; 

    echo '<ul class="breadcrumb">';
    echo '<li><a href="' . home_url() . '">' . $home . '</a></li>';

    if (is_category() || is_single()) {
        echo '<li><a href="' . get_permalink(get_option('page_for_posts')) . '">' . $blog . '</a></li>';
        if (is_single()) {
            echo '<li>'. get_the_title().'</li>';
        }
    }
    echo '</ul>';
}

/* body class term name */
function term_name_body_classes($classes) {
    if (is_singular('product')) {
        $terms = get_the_terms(get_the_ID(), 'product_category');
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $classes[] = 'article' . sanitize_title($term->term_id);
            }
        }
    }
    return $classes;
}
add_filter('body_class', 'term_name_body_classes');




function r_register_acf_blocks() {
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */
    register_block_type( __DIR__ . '/template-parts/blocks/products' );
	register_block_type( __DIR__ . '/template-parts/blocks/services' );
	register_block_type( __DIR__ . '/template-parts/blocks/about' );
	register_block_type( __DIR__ . '/template-parts/blocks/search' );
	register_block_type( __DIR__ . '/template-parts/blocks/process' );
}
// Here we call our tt3child_register_acf_block() function on init.
add_action( 'init', 'r_register_acf_blocks' );


/* Products */
function r_register_products_post_type() {
    // Register custom post type
    $labels = array(
        'name'               => _x( 'Products', 'post type general name', 'radijator' ),
        'singular_name'      => _x( 'Product', 'post type singular name', 'radijator' ),
        'menu_name'          => _x( 'Products', 'admin menu', 'radijator' ),
        'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'radijator' ),
        'add_new'            => _x( 'Add New', 'product', 'radijator' ),
        'add_new_item'       => __( 'Add New Product', 'radijator' ),
        'new_item'           => __( 'New Product', 'radijator' ),
        'edit_item'          => __( 'Edit Product', 'radijator' ),
        'view_item'          => __( 'View Product', 'radijator' ),
        'all_items'          => __( 'All Products', 'radijator' ),
        'search_items'       => __( 'Search Products', 'radijator' ),
        'parent_item_colon'  => __( 'Parent Products:', 'radijator' ),
        'not_found'          => __( 'No products found.', 'radijator' ),
        'not_found_in_trash' => __( 'No products found in Trash.', 'radijator' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'proizvodni-program' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
    );

    register_post_type( 'product', $args );

    // Register taxonomy
    $taxonomy_labels = array(
        'name'              => _x( 'Types', 'taxonomy general name', 'radijator' ),
        'singular_name'     => _x( 'Type', 'taxonomy singular name', 'radijator' ),
        'search_items'      => __( 'Search Types', 'radijator' ),
        'all_items'         => __( 'All Types', 'radijator' ),
        'parent_item'       => __( 'Parent Type', 'radijator' ),
        'parent_item_colon' => __( 'Parent Type:', 'radijator' ),
        'edit_item'         => __( 'Edit Type', 'radijator' ),
        'update_item'       => __( 'Update Type', 'radijator' ),
        'add_new_item'      => __( 'Add New Type', 'radijator' ),
        'new_item_name'     => __( 'New Type Name', 'radijator' ),
        'menu_name'         => __( 'Proizvodni program', 'radijator' ),
    );

    $taxonomy_args = array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'proizvodni-program' ),
    );

    register_taxonomy( 'product_category', array( 'product' ), $taxonomy_args );
}
add_action( 'init', 'r_register_products_post_type' );


/* ajax request search filter */
add_action('wp_ajax_filter_products', 'ajax_filter_products');
add_action('wp_ajax_nopriv_filter_products', 'ajax_filter_products');

function ajax_filter_products() {
  // Check nonce
  if (!isset($_POST['filter_nonce']) || !wp_verify_nonce($_POST['filter_nonce'], 'ajax_filter_nonce')) {
    wp_die('Security check failed');
  }

  // Sanitize
  $surface      = isset($_POST['surface']) ? array_map('sanitize_text_field', (array) $_POST['surface']) : [];
  $fuels        = isset($_POST['fuels']) ? array_map('sanitize_text_field', (array) $_POST['fuels']) : [];
  $object_types = isset($_POST['object_type']) ? array_map('sanitize_text_field', (array) $_POST['object_type']) : [];



 // ✅ If no filters are selected, return message
  if (empty($surface) && empty($fuels) && empty($object_types)) {
    echo '<p>Molimo Vas da izabere najmanje jedno polje u filteru kako bi videli rezultate pretrage.</p>';
    wp_die(); 
  }


  // Build meta_query
  $meta_query = [];

  if (!empty($surface)) {
    $meta_query[] = [
      'key'     => 'povrsina',
      'value'   => $surface,
      'compare' => 'IN'
    ];
  }

  if (!empty($fuels)) {
    $meta_query[] = [
      'key'     => 'gorivo',
      'value'   => $fuels,
      'compare' => 'IN'
    ];
  }

  if (!empty($object_types)) {
    $meta_query[] = [
      'key'     => 'vrsta_objekta',
      'value'   => $object_types,
      'compare' => 'IN'
    ];
  }

  // Query
  $query = new WP_Query([
    'post_type'      => 'product',
    'posts_per_page' => -1,
     'meta_query'     => array_merge(['relation' => 'AND'], $meta_query),
  ]);

  // Output
  if ($query->have_posts()) :
    echo '<h2>Rezultat pretrage</h2>';
    echo '<ul>';
    while ($query->have_posts()) : $query->the_post(); ?>
      <li>
       <a href="<?php echo get_permalink();?>"><?php echo esc_html(get_the_title()); ?></a>
      </li>
    <?php endwhile;
    echo '</ul>';
  else :
    echo '<p>Ne postoje proizvodi na osnovu filtera koji ste izabrali</p>';
  endif;

  wp_reset_postdata();
  wp_die(); // Always terminate AJAX
}



function enqueue_ajax_filter_script() {
  // Register JS
  wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/assets/js/ajax-filter.js',['jquery'], );
  // Pass data to JS
  wp_localize_script('ajax-filter', 'ajaxFilter', ['ajax_url' => admin_url('admin-ajax.php'),]);
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_filter_script');

