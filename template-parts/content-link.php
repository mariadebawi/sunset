<?php
/*
  @package theme sunset

    ---- Standart post title--------
 */
?>
<?php /* all my function in /sunset_theme_support.php  */?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sunset-link-post-format'); ?>>
    <header class="entry_header text-center">
        <?php
         $link = sunset_grap_url() ;
         the_title( "<h1 class='entry_title'><a href=". $link." target='_blank'>", "<div class='link-icon'> <span class='icon sunset-link'></span></div></a></h1>"); 
         ?>
    </header>

</article>