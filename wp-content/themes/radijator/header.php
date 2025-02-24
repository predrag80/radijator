<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radijator</title>

    <?php wp_head();?>
</head>
<body <?php body_class();?>>

    <?php 
        $dir_path = get_stylesheet_directory_uri(); 
    ?>

   <header class="main-header">
        <div class="main-header__inner">
            <div class="wrap-top">
                <div class="container">
                   <div class="wrapper-items">
                        <div>
                            <span class="item-name">Phone:</span>
                            <span>+381 36 399 170</span>
                        </div>
                        <div>
                            <span class="item-name">Email:</span>
                            <span>radijator@radijator.rs</span>
                        </div>
                        <div class="search-item">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div class="social-items">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                        </div>
                        <div class="flag-items">
                            <a href="#"><img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icons/7.2.3/flags/1x1/gb.svg" width="15" alt=""></a>
                            <a href="#"><img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icons/7.2.3/flags/1x1/gb.svg" width="15" alt=""></a>
                        </div>
                   </div>
                </div>
            </div>

            <div class="main-header__inner--nav container">
                <a href="<?php echo home_url();?>" class="logo">
                    <img src="<?php echo $dir_path;?>/assets/img/radijator.png" width="300" height="54" alt="Radijator logo">
                </a>
                <nav class="main-nav">

                <?php
                    if ( has_nav_menu( 'header_menu' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'products_menu',
                                'menu_class' => 'main-nav__list',
                                'walker'   => new Custom_Walker_Nav_Menu(),
                            )
                        );
                    } else {
                        echo '<p>Go to <a href="' . esc_url( admin_url( 'nav-menus.php?action=locations' ) ) . '">Appearance > Menu</a> and set Header menu</p>';
                    }
                ?>      

                <span class="search-item">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-magnifying-glass" style="line-height: 1;"><path fill="#fff" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" class=""></path></svg>
                </span>
                </nav>
                <div class="toggle-menu">
                    <i class="fa-solid fa-bars"></i>
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="secondary-nav">
                    <?php
                        if ( has_nav_menu( 'header_menu' ) ) {
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'header_menu'
                                )
                            );
                        } else {
                            echo '<p>Go to <a href="' . esc_url( admin_url( 'nav-menus.php?action=locations' ) ) . '">Appearance > Menu</a> and set Header menu</p>';
                        }
                    ?>      
                </div>
            </div>
        </div>
   </header>
    <main>
