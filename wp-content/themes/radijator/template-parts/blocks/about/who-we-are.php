<?php 

    /**
 * Services  About template.
 *
 * @param array $block The block settings and attributes.
 */
?>



<section class="about gap-block">
    <div class="container">
        <span class="subheading"><?php echo $small_heading = get_field('small_heading');?></span>
        <div class="grid-block">
            <div class="about__left">
                <h2><?php echo $main_heading = get_field('main_heading');?></h2>
            </div>
            <div class="about__right">
                <?php echo wpautop($content_about = get_field('content_about'));?>
            </div>
        </div>

        <div class="grid-block about__items">
            <div class="about__items--left">
                <img class="responsive-image" src="<?php echo $upload_image_about = get_field('upload_image_about')['url'];?>" alt="">
            </div>
            <div class="about__items--right">
                <?php if( have_rows('icons') ): ?>
                    <?php while( have_rows('icons') ): the_row(); ?> 
                        <?php 
                            $upload_icon_about = get_sub_field('upload_icon_about')['url'];
                            $title_about = get_sub_field('title_about');
                            $description_about = get_sub_field('description_about');
                        ?>

                        <div class="about__items--wrapper">
                            <div>
                                <img src="<?php echo $upload_icon_about;?>" alt="">
                                <span><?php echo $title_about;?></span>
                            </div>
                            <div>
                                <?php echo wpautop($description_about);?>
                            </div>
                        </div>

                    <?php endwhile;?> 
                <?php endif;?>
            </div>
        </div>
    </div>
</section>