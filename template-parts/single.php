<?php
/*
  @package theme sunset

    ---- single post --------
 */
?>
<?php /* all my function in /sunset_theme_support.php  */?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry_header text-center">
        <?php the_title("<h1 class='entry_title'>", "</h1>"); ?>
        <div class="entry_meta">
            <?php echo sunset_posted_meta(); ?>
        </div>
    </header>
    <div class="entry_content clearfix">
    <?php
          the_content();
    ?>
    </div>

    <footer class="entry_footer">
        <?php echo sunset_posted_footer(); ?>
    </footer>
</article>