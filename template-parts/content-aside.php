<?php
/*
  @package theme sunset

    ---- Aside post title--------
 */
?>
<?php /* all my function in /sunset_theme_support.php  */?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sunset-format-aside'); ?>>
 
  <div class="aside_container ">

    <div class="row">

      <div class="col-md-2 col-sm-3 col-xs-12 ">
        <?php if (sunset_get_attchment()) :
          ?>
          <div class="aside-feature background_image" style="background-image:url(<?php echo sunset_get_attchment();  ?>);"> </div>
        <?php endif; ?>
      </div>

      <div class="col-md-10 col-sm-9 col-xs-12 ">
        <header class="entry_header ">
          <div class="entry_meta">
            <?php echo sunset_posted_meta(); ?>
          </div>
        </header>
        <div class="entry_content">
          <div class="entry_expert"><?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>

    <footer class="entry_footer">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
          <?php echo sunset_posted_footer(); ?>
        </div>
      </div>
    </footer>
  </div>
</article>