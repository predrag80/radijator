<?php 
    get_header();
    $dir_path = get_stylesheet_directory_uri(); 
?>

<section class="hero" style="background: url('<?php the_post_thumbnail_url();?>') no-repeat top center / cover;">
    <div class="container" >

    </div>
</section>

<section class="product-content">
        <div class="container">
          
            <div class="grid-block">
                <div>
                    <h1><?php the_title();?></h1>

                    <?php custom_breadcrumbs(); ?>

                    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>

                    <?php if( have_rows('add_pdf') ): ?>
                        <?php while( have_rows('add_pdf') ): the_row(); 
                            $add_pdf_docs = get_sub_field('add_pdf_docs')['url'];
                            $add_pdf_name = get_sub_field('add_pdf_name');
                            ?>
                            <div class="upload-docs">
                                <a href="<?php echo $add_pdf_docs;?>" class="btn" target="_blank"><?php echo $add_pdf_name;?> <i class="fa-regular fa-file-pdf"></i></a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                  
                </div>
                <div>
                    <div class="related-products">
                        <div class="accordion">

                            <?php
                                $terms = get_terms( array(
                                    'taxonomy'   => 'product_category', 
                                    'hide_empty' => false,
                                ) );

                                $count = 1;
                                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
                                    foreach ( $terms as $term ) : ?>
                                        <article>
                                            <input id="article<?php echo $term->term_id;?>" type="radio" name="articles" >
                                            <label for="article<?php echo $term->term_id;?>">
                                                <h2><?php echo esc_html( $term->name );?></h2>
                                            </label>

                                             
                                            <?php 
                                                $posts = get_posts(array(
                                                    'post_type' => 'product',
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'product_category',
                                                            'field' => 'term_id',
                                                            'terms' => $term->term_id,
                                                        ),
                                                    ),
                                                ));
                                            ?>

                                            <?php 
                                                if (!empty($posts)) {
                                                    foreach ($posts as $post) {?>
                                                        <?php  
                                                            $upload_product_image = get_field('upload_product_image', $post->ID)['url'];
                                                         ?>
                                                        <div>
                                                            <img src="<?php echo $upload_product_image;?>" alt="">    
                                                            <h3><a href="<?php echo get_permalink($post->ID);?>"><?php echo esc_html($post->post_title);?></a></h3>                          
                                                        </div>
                                                    <?php }
                                                } else {
                                                    echo '<p>No posts found for this term.</p>';
                                                }
                                                                                                                                                
                                              ?>

                                        </article>
                                            <?php $count++;?>
                                    <?php endforeach;
                                else :
                                    echo 'No terms found.';
                                endif;
                            ?>
                          </div>
                    </div>
                </div>
            </div>
        </div>
   </section>

   

<?php get_footer();?>