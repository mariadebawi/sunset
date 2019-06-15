<?php
/*
  @package theme sunset

    ---- page  --------
 */
?>
<?php /* all my function in /sunset_theme_support.php  */?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
  <header class="entry_header text-center">
      
      <?php the_title("<h1 class='entry_title'>", "</h1>"); ?>
      
  </header>

  <div class="entry_content single clearfix">
    <?php the_content(); ?>
  </div>
  
  <?php //echo do_shortcode("[contact_form]" , false); ?>

 
 
</article>