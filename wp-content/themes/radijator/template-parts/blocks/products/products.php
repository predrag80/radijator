
<?php 

    /**
 * Products  Block template.
 *
 * @param array $block The block settings and attributes.
 */

 $dir_path = get_stylesheet_directory_uri(); 
?>


<section class="products-type">

    <div class="container">
        <img class="block-logo" src="<?php echo $dir_path;?>/assets/img/logo-small.png" alt="">
        <h2><?php echo $heading_products = esc_html(get_field('heading_products'));?></h2>
        <?php echo $content_products = wpautop(get_field('content_products'));?>
        <div class="grid-block product-type__items">
          <?php 
                if( have_rows('add_product') ): ?>
                
                <?php while( have_rows('add_product') ): the_row(); 
                    $product_title = get_sub_field('product_title');
                    $product_description = get_sub_field('product_description');
                    $upload_image_product = get_sub_field('upload_image_product')['url'];
                    $add_link = get_sub_field('add_link');
                    ?>

                    <div class="products-type__item">
                        <h3><?php echo esc_html($product_title);?></h3>
                        <p><?php echo esc_html($product_description);?></p>
                        <a href="<?php echo esc_url( $add_link);?>" class="link-hover">Saznajte vise</a>
                        <div class="products-type__item--image">
                            <img src="<?php echo $upload_image_product;?>" alt="" width="270" height="350">
                        </div>
                        <div class="hidden-wrapper"></div>
                    </div>
                
                <?php endwhile; ?>
         <?php endif; ?>
        </div>
    </div>
   
</section>