<?php
/*
  @package theme sunset

    ---- Standart post title--------
 */
?>
<?php /* all my function in /sunset_theme_support.php  */?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry_header text-center">
        <?php the_title("<h1 class='entry_title'><a href='".esc_url(get_the_permalink())."' rel='bookmark'>", "</a></h1>"); ?>
         <div class="entry_meta">
           <?php echo sunset_posted_meta() ; ?>
        </div>
    </header>
    <div class="entry_content">

      <?php if(sunset_get_attchment() ) :
      ?>
      <a  class="standard-feature-link" href='<?php the_permalink() ; ?>'>
        <div class="standard-feature background_image" style="background-image:url(<?php echo sunset_get_attchment() ;  ?>);"> </div>
      </a>
        <?php endif ; ?>

      <div class="entry_expert"><?php the_excerpt(); ?> </div>

      <div class="button-container text-center ">
          <a href="<?php the_permalink() ; ?>" class="btn btn-sunset"><?php _e('Read More') ; ?></a>
      </div>
    </div>

    <footer class="entry_footer" >
       <?php echo sunset_posted_footer() ; ?>
    </footer>
</article>