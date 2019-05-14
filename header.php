<?php

/*************************
     @package theme sunset
 ***************************/
?>
<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('bingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="header_container background_image text-center" style="background-image:url(<?php header_image(); ?>); ">
                    <div class="header-content table " >
                        <div class="table-cell">
                            <h1 class="site-title icon"> 
                                <span class="sunset-logo"></span>
                                <span class="hide"> <?php bloginfo('name'); ?></span>
                            </h1>
                            <h2 class="site-description"> <?php bloginfo('description'); ?></h2>
                        </div>
                    </div>
                    <div class="nav-container">
                    </div>
                </div>
            </div>
        </div>
    </div>