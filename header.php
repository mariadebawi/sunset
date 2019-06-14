<?php

/*************************
     @package theme sunset
 ***************************/
?>

<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('bingback_url'); ?>">
    <?php endif; ?>

    <title><?php bloginfo('name');
            wp_title(); ?></title>

    <?php wp_head(); ?>

    <?php $custom_css = esc_attr(get_option('custom_css'));
    if (!empty($custom_css)) : echo '<style>' . $custom_css . '</style>';
    endif;
    ?>
</head>

<body <?php body_class(); ?>>

    <!-- Create a sidebar sidebar-closed   -->
    <div class="sunset-sidebar sidebar-closed ">
       
        <div class="sunset-sidebar-container">

            <div class="sidebar-scroll">
                <?php get_sidebar(); ?>
            </div>

            <a class="js-ToggleSidebar sidebar-close">
                <span class="sunset-icon sunset-close"></span>
            </a>
            
        </div>

    </div>
    <div class="sidebar-overlay"></div>
    <!-- end  sidebar -->

    <div class="container-fluid">
        <div class="row">
            <header class="header_container background_image text-center" style="background-image:url(<?php header_image(); ?>); ">
                
                <div class="header-content table ">
                    <div class="table-cell">
                        <!-- icons of sunset_icon.css file -->
                        <h1 class="site-title sunset-icon">
                            <!-- .icon class generic -->
                            <span class="sunset-logo"></span><!-- .icon-logo  class  -->
                            <span class="hide"> <?php bloginfo('name'); ?></span>
                        </h1>
                        <h2 class="site-description"> <?php bloginfo('description'); ?></h2>
                    </div>
                </div>
                <div class="nav-container ">
                    <div class="navbar navbar-defaut navbar-sunset">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container' => false,
                            'menu_class' => 'nav navbar-nav',
                            'walker' => new Sunset_Walker_Nav_Primary()
                        ));
                        ?>
                    </div>
                </div>
                <div class="sunset-sidebar-container">
                    <a class="js-ToggleSidebar sidebar-open">
                        <span class="sunset-icon sunset-menu"></span>
                    </a>
                </div>
            </header>
        </div>
    </div>