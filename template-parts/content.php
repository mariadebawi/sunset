<?php
/*
  @package theme sunset

    ---- Standart post title--------
 */
?>
<?php ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry_header">
        <?php the_title("<h1 class=''entry_title''>", "</h1>"); ?>
         <div class="entry_meta">
           <?php echo sunset_posted_meta() ; ?>
        </div>
    </header>
    <div class="entry_content">

      <?php if(has_post_thumbnail()) : ?>
        <div class="standart-feature"><?php the_post_thumbnail(); ?> </div>
      <?php endif ; ?>

      <div class="entry_expert"><?php the_excerpt(); ?> </div>

      <div class="button-container">
          <a href="<?php the_permalink() ; ?>" class="btn btn-default"><?php _e('Read More') ; ?></a>
      </div>
    </div>

    <footer class="entry_footer" >
       <?php echo sunset_posted_footer() ; ?>
    </footer>
</article>