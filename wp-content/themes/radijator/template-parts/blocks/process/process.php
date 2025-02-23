<?php 

    /**
 * Services  Process template.
 *
 * @param array $block The block settings and attributes.
 */
?>

<section class="our-steps">
    <div class="container">
        <span class="subheading"><?php echo $subheading_process = get_field('subheading_process');?></span>
        <h2><?php echo $heading_process = get_field('heading_process');?></h2>
        <div class="grid-block">

            <?php if( have_rows('add_steps') ): ?>
                <?php while( have_rows('add_steps') ): the_row(); ?>
                <?php 
                    $title_step = get_sub_field('title_step');
                    $content_step = get_sub_field('content_step');
                 ?>
                <div class="our-steps__item">
                    <h3><?php echo $title_step;?></h3>
                    <?php echo wpautop($content_step);?>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>
