<?php
/*
  @package theme sunset

    ---- Quote post title--------
 */
?>
<?php /* all my function in /sunset_theme_support.php  */?>
<article id="post-<?php the_ID(); ?>" <?php post_class("quote_post_format"); ?>>
    <header class="entry_header text-center">
       <div class="row">
         <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offst-1">
            <h1 class="quote_content"><a href="<?php the_permalink(); ?>" rel='bookmark'><?php echo get_the_content(); ?></a></h1>
            <?php the_title('<h2 class="quote_author"> _ ',' _ </h2>'); ?>
         </div>
       </div>     
    </header>
  
    <footer class="entry_footer" >
       <?php echo sunset_posted_footer() ; ?>
    </footer>
</article>