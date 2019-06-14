<?php /*
	
@package sunsettheme

*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-2">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            save_post_views(get_the_ID()) ;
                            get_template_part('template-parts/single', get_post_format());
                            echo sunset_post_navigation(); //the navigation 
                            if (comments_open()) :
                                comments_template();
                            endif;
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>

        </div><!-- .container -->
    </main>
</div><!-- #primary -->

<?php get_footer(); ?>