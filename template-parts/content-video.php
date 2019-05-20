<?php
/*
  @package theme sunset

    ---- video post --------
 */
?>
<?php /* all my function in /sunset_theme_support.php  */?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sunset-format-video'); ?>>
    <header class="entry_header text-center">
        <div class="embed-responsive embed-responsive-16by9"> 
          <!--embed-responsive embed-responsive-16by9 is a style of vedio   -->
          <?php 
            echo sunset_get_embedded_media(array('video', 'iframe')); 
          ?>
        </div>
    
    <?php the_title("<h1 class='entry_title'><a href='".esc_url(get_the_permalink())."' rel='bookmark'>", "</a></h1>"); ?>
         <div class="entry_meta">
           <?php echo sunset_posted_meta() ; ?>
        </div>
    </header>
    <div class="entry_content">
      <div class="entry_expert"><?php the_excerpt(); ?> </div>

      <div class="button-container text-center ">
          <a href="<?php the_permalink() ; ?>" class="btn btn-sunset"><?php _e('Read More') ; ?></a>
      </div>
    </div>

    <footer class="entry_footer" >
       <?php echo sunset_posted_footer() ; ?>
    </footer>
</article>