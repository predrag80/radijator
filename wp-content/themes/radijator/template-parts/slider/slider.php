<div class="r_slider">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            $args = array(
                'post_type' => 'slider',
                'posts_per_page' => 3
            );
            $slider = new WP_Query( $args ); ?>
            <?php if ( $slider->have_posts() ) : ?>
                <?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
                    <div class="swiper-slide">
                        <img src="<?php the_post_thumbnail_url();?>" alt="">
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>        

        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>