<?php
/*
  @package theme sunset

    ----  post image--------
 */
?>
<?php /* all my function in /sunset_theme_support.php  */?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sunset-format-image'); ?>>
  <?php $feature_image = sunset_get_attchment() ;?>
    <header class="entry_header text-center background_image" style='background-image:url(<?php echo $feature_image ?>);'>
      <?php the_title("<h1 class='entry_title'><a href='" . esc_url(get_the_permalink()) . "' rel='bookmark'>", "</a></h1>"); ?>
      <div class="entry_meta">
        <?php echo sunset_posted_meta(); ?>
      </div>
      <div class="entry_expert image-caption"><?php the_excerpt(); ?> </div>
    </header>

  <footer class="entry_footer">
    <?php echo sunset_posted_footer(); ?>
  </footer>
</article>