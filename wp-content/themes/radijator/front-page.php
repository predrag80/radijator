

<?php
    get_header(); 
    $dir_path = get_stylesheet_directory_uri(); 
?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
<?php endwhile; ?>

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

<footer>
     <div class="container">
         <div class="subscribe-newsletter">
             <div class="grid-block">
                 <div>
                     <i class="fa-solid fa-envelope"></i>
                 </div>
                 <div>
                     <p>Ostavite svoj kontak email i prijavite se za redovni info o odgađajima, pogodnostima kupovine, ponudama za saradnju i najnoviji katalog.</p>
                 </div>
                 <div>
                     <form action="">
                         <div class="form-group">
                             <input type="text" placeholder="Prijavite se za najnovije vesti">
                             <button type="submit" value=""><i class="fa-solid fa-angle-right"></i></button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
 
         <div class="grid-block">
             <div>
                 <img src="<?php echo $dir_path;?>/assets/img/logo.png" alt="">
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                 <div class="s-media">
                     <a href="#"></a>
                     <a href="#"></a>
                     <a href="#"></a>
                     <a href="#"></a>
                 </div>
             </div>
 
             <div>
                 <h3>Radno vreme</h3>
                 <ul>
                     <li>Radnim danima:
                         <ul>
                             <li>Ponedeljak– Petak : 09 - 20 h</li>
                             <li> Subota: 09 - 17 h</li>
                         </ul>
                     </li>
                     <li>Neradni dani:
                         <ul>
                             <li> Nedelja</li>
                             <li> Zvaniči praznični neradni dani</li>
                         </ul>
                     </li>
                 </ul>
             </div>
             <div>
                 <h3>Kontaktirajte nas</h3>
                 <p>Praesent aliquam, augue ac pulvinar risuaru malesuada est,imperdiet libero ac. dam est, porttitor vehicula gravda accumsan bindum tincidunt imperdiet.</p>
            
                 <div class="contact-info">
                     <i class="fa-solid fa-location-dot"></i>
                     <p>RADIJATOR-Inženjering d.o.o <br />
                         Živojina Lazića Solunca br.6 <br />
                         36000 Kraljevo</p>
                 </div>
                
                 <div class="contact-info">
                     <i class="fa-solid fa-mobile"></i> 
                     <p>+381 36 399 170</p>
                 </div>
 
                 <div class="contact-info">
                     <i class="fa-solid fa-envelope"></i>
                     <p> radijator@radijator.rs</p>
                 </div>
 
             </div>
             <div>
                 <h3>Najnovije vesti</h3>
                 <p>Naša kompanija na Sajmu zapošljavanjaStabilno poslovanje i inovacije uvek otvaraju nova radna mesta i mi smo veoma zadovoljni što vrata za kreativne i vredne ljude nikad nismo zatvarali.
                     [29.05.2024] </p>
             </div>
         </div>
     </div>
     <div class="f-copyright">
         <div class="container">
             <div class="grid-block">
                 <p>RADIJATOR Inženjering d.o.o 2024 &copy; All Rights Reserved.</p>
                 <ul>
                     <li>
                         <a href="#">Politika Privatnosti/Uslovi</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </footer>


<?php get_footer();?>