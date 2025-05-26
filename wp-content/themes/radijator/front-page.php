

<?php
    get_header(); 
    $dir_path = get_stylesheet_directory_uri(); 
?>

<!-- home slider -->
<?php get_template_part( 'template-parts/slider/slider' ); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
<?php endwhile; ?>


<!-- filter products -->
<section class="products_filter">
    <div class="container">
        <div class="grid-block">
            <div class="products_filter__left">
                <h2>
                    Pretraga proizvoda
                </h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut dolore magna aliqua.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
             <div class="products_filter__right">

                
                <?php
                    // Sanitize incoming GET parameters
                    $surface_raw      = $_GET['surface'] ?? [];
                    $fuels_raw        = $_GET['fuels'] ?? [];
                    $object_types_raw = $_GET['object_type'] ?? [];

                    $surface      = array_map('sanitize_text_field', (array) $surface_raw);
                    $fuels        = array_map('sanitize_text_field', (array) $fuels_raw);
                    $object_types = array_map('sanitize_text_field', (array) $object_types_raw);
                    ?>

                   <form method="GET" action="">
                        <div class="wrap-groups">
                          
                            <div class="form-group">

                                <div class="form-group__title">
                                    <img src="<?php echo $dir_path;?>/assets/img/image-17.png" alt="">
                                    <p>površina</p>
                                </div>

                                <label class="custom-label">
                                    <input type="checkbox" name="surface[]" value="50">
                                    <span class="custom-radio">do 50m2</span>
                                </label>
                                  <label class="custom-label">
                                    <input type="checkbox" name="surface[]" value="50-120">
                                    <span class="custom-radio">50-120m2</span>
                                </label>
                                 <label class="custom-label">
                                    <input type="checkbox" name="surface[]" value="60-130">
                                    <span class="custom-radio">60-130m2</span>
                                </label>
                                  <label class="custom-label">
                                    <input type="checkbox" name="surface[]" value="120-180">
                                    <span class="custom-radio">120-180m2</span>
                                </label>
                                 <label class="custom-label">
                                    <input type="checkbox" name="surface[]" value="180-240">
                                    <span class="custom-radio">180-240m2</span>
                                </label>

                                  <label class="custom-label">
                                    <input type="checkbox" name="surface[]" value="240-300">
                                    <span class="custom-radio">240-300m2</span>
                                </label>

                                  <label class="custom-label">
                                    <input type="checkbox" name="surface[]" value="300+">
                                    <span class="custom-radio">preko 300m2</span>
                                </label>

                            </div>
                             <div class="form-group">

                                <div class="form-group__title">
                                    <img src="<?php echo $dir_path;?>/assets/img/image-16.png" alt="">
                                    <p>gorivo</p>
                                </div>

                                 <label class="custom-label">
                                    <input type="checkbox" name="fuels[]" value="pelet">
                                    <span class="custom-radio">pelet</span>
                                </label>
                                  <label class="custom-label">
                                    <input type="checkbox" name="fuels[]" value="drvo">
                                    <span class="custom-radio">drvo</span>
                                </label>
                                 <label class="custom-label">
                                    <input type="checkbox" name="fuels[]" value="ugalj">
                                    <span class="custom-radio">ugalj</span>
                                </label>
                                  <label class="custom-label">
                                    <input type="checkbox" name="fuels[]" value="energija">
                                    <span class="custom-radio">električna energija</span>
                                </label>
                                  <label class="custom-label">
                                    <input type="checkbox" name="fuels[]" value="kombinovani">
                                    <span class="custom-radio">kombinovani</span>
                                </label>

                    
                            </div>

                              <div class="form-group">

                                <div class="form-group__title">
                                    <img src="<?php echo $dir_path;?>/assets/img/image-18.png" alt="">
                                    <p>vrsta objekta</p>
                                </div>

                                 <label class="custom-label">
                                    <input type="checkbox" name="object_type[]" value="stan">
                                    <span class="custom-radio">stan</span>
                                </label>
                                  <label class="custom-label">
                                    <input type="checkbox" name="object_type[]" value="kuća">
                                    <span class="custom-radio">kuća</span>
                                </label>
                                  <label class="custom-label">
                                    <input type="checkbox" name="object_type[]" value="industrija">
                                    <span class="custom-radio">industrija</span>
                                </label>                             
                            </div>
                        </div>
                        <div class="products_filter__right--btn">
                            <input type="submit" value="prikaži" class="btn btn-red">
                        </div>
                    </form>
             </div>
        </div>

        <div class="products_filter__result"></div>
           

          <?php
            // Build WP_Query based on filters
            $meta_query = ['relation' => 'AND'];

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

            $args = [
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'meta_query'     => $meta_query
            ];

            $query = new WP_Query($args);
            ?>
             <h2>Rezultati pretrage</h2> 
            <?php if ($query->have_posts()) : ?>
            <ul>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li>
                    <strong><?php the_title(); ?></strong><br>
                    Surface: <?php the_field('povrsina'); ?><br>
                    Fuels: <?php the_field('gorivo'); ?><br>
                    Object Type: <?php the_field('vrsta_objekta'); ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php else : ?>
                <p>No products match your filters.</p>
                <?php endif; ?>
        <?php wp_reset_postdata(); ?>



        </div>
    </div>
</section>

<!-- services slider -->
<section class="part-services">
    <div class="wrap-slider">
        <div class="container">
            <img class="block-logo" src="<?php echo $dir_path;?>/assets/img/logo-small.png" alt="">
            <h2>Uslužne delatnosti</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>

            <div class="swiper servicesSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="<?php echo $dir_path;?>/assets/img/service-slide-1.jpg" alt="">
                        <div class="slide__content">
                            <h3>Montaža sistema za grejanje</h3>
                            <p>I pored široke mreže podrške i partnera koji ugrađuju naše kotlove u velikom broju zemalja, ispostavilo se veoma korisnim razviti i posebno stručnu ekipu za projektovanje i instalaciju sistema za grejanje koja radi na najzahtevnijim zadacima i kada posao zahteva posebnu preciznost i odgovornost.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php echo $dir_path;?>/assets/img/service-slide-1.jpg" alt="">
                        <div class="slide__content">
                            <h3>Montaža sistema za grejanje</h3>
                            <p>I pored široke mreže podrške i partnera koji ugrađuju naše kotlove u velikom broju zemalja, ispostavilo se veoma korisnim razviti i posebno stručnu ekipu za projektovanje i instalaciju sistema za grejanje koja radi na najzahtevnijim zadacima i kada posao zahteva posebnu preciznost i odgovornost.</p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                            <img src="<?php echo $dir_path;?>/assets/img/service-slide-1.jpg" alt="">
                            <div class="slide__content">
                            <h3>Montaža sistema za grejanje</h3>
                            <p>I pored široke mreže podrške i partnera koji ugrađuju naše kotlove u velikom broju zemalja, ispostavilo se veoma korisnim razviti i posebno stručnu ekipu za projektovanje i instalaciju sistema za grejanje koja radi na najzahtevnijim zadacima i kada posao zahteva posebnu preciznost i odgovornost.</p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <img src="<?php echo $dir_path;?>/assets/img/service-slide-1.jpg" alt="">
                        <div class="slide__content">
                            <h3>Montaža sistema za grejanje</h3>
                            <p>I pored široke mreže podrške i partnera koji ugrađuju naše kotlove u velikom broju zemalja, ispostavilo se veoma korisnim razviti i posebno stručnu ekipu za projektovanje i instalaciju sistema za grejanje koja radi na najzahtevnijim zadacima i kada posao zahteva posebnu preciznost i odgovornost.</p>
                        </div>
                    </div>
                </div> 
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
           
        </div>
    </div>
</section>


<section class="part-news">
    <div class="container">
        <h2>Vesti</h2>
        <div class="grid-block">

            <?php 
                $args = array(
                    'category_name'  => 'vesti', 
                    'posts_per_page' => 1, 
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );
                $latest_news = new WP_Query($args);
            ?>

            <div class="part-news__left">
                <?php 
                if ($latest_news->have_posts()) :
                    while ($latest_news->have_posts()) : $latest_news->the_post(); ?>
                         <div class="part-news--featured">
                            <a href="<?php echo esc_url(get_permalink());?>">
                                <img src="<?php the_post_thumbnail_url();?>" alt="">
                            </a>
                            <h3><a href="<?php echo esc_url(get_permalink());?>"><?php the_title();?></a></h3>
                            <?php echo wpautop( $short_description = get_field('short_description'));?>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No news posts found.</p>';
                endif;
                ?>   

               
            </div>
            <div class="part-news__right">

                <?php 
                    $args = array(
                        'category_name'  => 'vesti', 
                        'posts_per_page' => 2, 
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'offset' => 1
                    );
                    $news = new WP_Query($args);
                ?>

                <?php 
                    if ($news->have_posts()) :
                        while ($news->have_posts()) : $news->the_post(); ?>
                            <div class="part-news-item">
                                <div class="part-news-item--image">
                                    <a href="<?php echo esc_url(get_permalink());?>">
                                        <img src="<?php the_post_thumbnail_url();?>" alt="">
                                    </a>
                                </div>
                                <div class="part-news-item--content">
                                    <h3><a href="<?php echo esc_url(get_permalink());?>"><?php the_title();?></a></h3>
                                    <?php echo wpautop( $short_description = get_field('short_description'));?>
                                </div>
                            </div>
                        <?php endwhile;
                    wp_reset_postdata();
                    else :
                        echo '<p>No news posts found.</p>';
                    endif;
                ?>   
            </div>            
        </div>
        <div class="part-btn-all">
            <a href="<?php echo home_url();?>/vesti" class=" btn btn-transparent-red view-all-news">Sve vesti</a>
        </div>
    </div>
</section>


<section class="banner">
    <div class="grid-block">
        <div class="banner__left">
            <?php echo wpautop($info_text = get_field('info_text', 'options'));?>
        </div>
        <div class="banner__right">
            <div class="banner__right--content">
                <div>
                    <span class="banner__right--content--heading">info linija:</span>
                    <span> <?php echo $phone_number_info = get_field('phone_number_info', 'options');?> </span>
                </div>
                <div>
                    <span class="banner__right--content--heading">email:</span>
                    <span><?php echo $email_info = get_field('email_info', 'options');?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="map">
    <img src="<?php echo $dir_path;?>/assets/img/contact-map.jpg" alt="">
</div>

<?php get_footer();?>