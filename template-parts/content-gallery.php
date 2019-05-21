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
      $attachments = sunset_get_attchment(7);
      //var_dump($attachments);
      ?>
      <div id="post-gallery-<?php the_ID(); ?>" class="carousel slide sunset-carousel-thumb" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <?php /* give you all the gallery with an empty image */
          /*  $i = 0;
          foreach ($attachments as $attachment) :
            $active = ($i == 0 ? ' active' : '');
            ?>
        <div class="item<?php echo $active; ?> background_image standard-feature" style="background-image: url( <?php echo wp_get_attachment_url($attachment->ID); ?> );"></div>
        <?php $i++;
          endforeach; 
          */
          ?>
          <?php
          $count = count($attachments) - 1;
          for ($i = 0; $i <= $count; $i++) : /* the empty image not display now */
            $active = ($i == 0 ? ' active' : '');

            $n = ($i == $count ? 0 : $i + 1);
            $nextImg = wp_get_attachment_thumb_url($attachments[$n]->ID);
            $p = ($i == 0 ? $count : $i - 1);
            $prevImg = wp_get_attachment_thumb_url($attachments[$p]->ID);

            ?>
            <div class="item<?php echo $active; ?> background_image standard-feature" style="background-image: url( <?php echo wp_get_attachment_url($attachments[$i]->ID); ?> );">
              <div class="hide next-image-preview" data-image="<?php echo $nextImg ?>">
                <!-- let's add this variable to .thumbnail-container with js on '/js/sunset.js'  -->
              </div>
              <div class="hide prev-image-preview" data-image="<?php echo $prevImg ?>"></div>
            </div>
          <?php endfor; ?>

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