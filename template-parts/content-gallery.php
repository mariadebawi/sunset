<?php
/*
  @package theme sunset

    ---- Standart post title--------
 */
?>
<?php /* all my function in /sunset_theme_support.php  */?>
<article id="post-gallery<?php the_ID(); ?>" <?php post_class('sunset-format-gallery'); ?>>
  <header class="entry_header text-center">
    
  	<?php if( sunset_get_attchment() ): 
			$attachments = sunset_get_attchment(7);
			//var_dump($attachments);
		?>
			<div id="post-gallery-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<?php 
						$i = 0;
						foreach( $attachments as $attachment ): 
						$active = ( $i == 0 ? ' active' : '' );
					?>
						<div class="item<?php echo $active; ?> background_image standard-feature" style="background-image: url( <?php echo wp_get_attachment_url( $attachment->ID ); ?> );"></div>
					<?php $i++; endforeach; ?>
        </div>
        <a class="left carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
          <i class="fa fa-chevron-left" aria-hidden="true"></i>
          <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
          <span class="sr-only">Next</span>
				</a>
      </div>
    <?php endif; ?>



    <?php the_title("<h1 class='entry_title'><a href='" . esc_url(get_the_permalink()) . "' rel='bookmark'>", "</a></h1>"); ?>
    <div class="entry_meta">
      <?php echo sunset_posted_meta(); ?>
    </div>
  </header>
  <div class="entry_content">
    <div class="entry_expert"><?php the_excerpt(); ?> </div>

    <div class="button-container text-center ">
      <a href="<?php the_permalink(); ?>" class="btn btn-sunset"><?php _e('Read More'); ?></a>
    </div>
  </div>

  <footer class="entry_footer">
    <?php echo sunset_posted_footer(); ?>
  </footer>
</article>