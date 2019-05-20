<?php
/*
  @package theme sunset

    ----  post audio --------
 */
?>
<?php /* all my function in /sunset_theme_support.php  */?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sunset-format-audio'); ?>>
    <header class="entry_header">
        <?php the_title("<h1 class='entry_title'><a href='".esc_url(get_the_permalink())."' rel='bookmark'>", "</a></h1>"); ?>
         <div class="entry_meta">
           <?php echo sunset_posted_meta() ; ?>
        </div>
    </header>
    <div class="entry_content">
      <?php 
          echo sunset_get_embedded_media(array('audio', 'iframe')); 
       ?>
    </div>

    <footer class="entry_footer" >
       <?php echo sunset_posted_footer() ; ?>
    </footer>
</article>