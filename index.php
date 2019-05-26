 <?php
 /*
  @package theme sunset
 */
 ?>
<?php ?>
<?php get_header() ; ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
     <div class="container sunset_post_container">
        <?php 
          if(have_posts()):
						echo '<div class="page-limit" data-page="/' . sunset_check_paged() . '">';
            while(have_posts()):
                the_post();
                  get_template_part('template-parts/content', get_post_format());
            endwhile;
          endif;
          echo '</div>';
          ?>
     </div>
     <div class="container text-center">
       <a class="btn btn-lg btn-sunset-loading sunset-load-more" data-page="<?php echo sunset_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
       <span class="icon sunset-loading "></span>
          <span class="text"> Load More</span>
       </a>
     </div>
    </main>
  </div>

<?php get_footer() ; ?>