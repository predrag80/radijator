
<?php 

    /**
 * Services  Block template.
 *
 * @param array $block The block settings and attributes.
 */
?>


<section class="products_links">
    <div class="container">
        <div class="grid-block products_links--cols">
            <div class="products_links--cols---left">
                <h3>
                    <!--Ut enim ad minim veniam, <span>quis nostrud exercitation ullamco</span>-->
                    <?php echo $heading_services = esc_html(get_field('heading_services'));?>
                </h3>
                 <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>-->
                <?php echo $content_services = wpautop(get_field('content_services'));?>
            </div>
            <div class="products_links--cols---right">
                <?php if( have_rows('add_buttons_services') ): ?>
                    <?php while( have_rows('add_buttons_services') ): the_row(); 
                        $add_button_text_services = get_sub_field('add_button_text_services');
                        $add_button_url_services = get_sub_field('add_button_url_services');
                        $add_button_class_services = get_sub_field('add_button_class_services');
                        ?>
                        <a href="<?php echo $add_button_url_services;?>" class="btn btn-<?php echo $add_button_class_services;?>"><?php echo $add_button_text_services;?></a>
                       <!--<a href="#" class="btn btn-transparent-red">Kompletna ponuda</a>
                       <a href="#" class="btn btn-transparent-grey">Usluge</a>-->
                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
   </section>