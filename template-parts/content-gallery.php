<?php
/*
  @package theme sunset

    ---- Standart post title--------
 */
?>
<?php /* all my function in /sunset_theme_support.php  */?>
<article id="post-gallery<?php the_ID(); ?>" <?php post_class('sunset-format-gallery'); ?>>
  <header class="entry_header text-center">

    <?php if (sunset_get_attchment()) :
      //var_dump($attachments);
      ?>
      <div id="post-gallery-<?php the_ID(); ?>" class="carousel slide sunset-carousel-thumb" data-ride="carousel">
        <div class="carousel-inner" role="listbox">

        <?php 
						
						$attachments = sunset_get_bs_slides( sunset_get_attchment(7) );
						foreach( $attachments as $attachment ):
					?>
					
						<div class="item<?php echo $attachment['class']; ?> background_image standard-feature" style="background-image: url( <?php echo $attachment['url']; ?> );">
							
							<div class="hide next-image-preview" data-image="<?php echo $attachment['next_img']; ?>"></div>
							<div class="hide prev-image-preview" data-image="<?php echo $attachment['prev_img']; ?>"></div>
							
							<div class="entry_expert image-caption">
								<p><?php echo $attachment['caption']; ?></p>
							</div>
							
						</div>
					
					<?php endforeach; ?>

        </div>
        <a class="left carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
          <div class="table">
            <div class="table-cell">
              <div class="preview-container">
                <span class="thumbnail-container background_image">
                  <!-- let's add this image thumb to .thumbnail-container with js on '/js/sunset.js'  -->
                </span>
                <span class="icon sunset-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </div>
            </div>
          </div>
        </a>
        <a class="right carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
          <div class="table">
            <div class="table-cell">
              <div class="preview-container background_image">
                <span class="thumbnail-container"></span>
                <span class="icon sunset-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </div>
            </div>
          </div>
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