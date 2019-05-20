<?php

/*
@package theme sunset
 ============================
    Theme support Options
 ============================
 */

$options = get_option('post_formats');
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = array();
foreach ($formats as $format) {
   $output[] = (@$options[$format] == 1 ? $format : '');
}
/* list type of format post  */
add_theme_support('post-formats', $output);

/* activate custom header */
$header = get_option('custom_header');
if (@$header == 1) {
   add_theme_support('custom-header');
}
/* activate custom background  */
$background = get_option('custom_background');
if (@$background == 1) {
   add_theme_support('custom-background');
}

/* activate nav menu option  */
function sunset_register_nav_menu()
{
   register_nav_menu('primary', 'Header Navigation Menu');
}
add_action('after_setup_theme', 'sunset_register_nav_menu');

/* active the upload picture */
add_theme_support('post-thumbnails');


/*
============================
  Blog loop custom functions
============================
*/

function sunset_posted_meta()
{
   $posted_on = human_time_diff(get_the_time('U'), current_time('timestamp'));
   $output = "";
   $categories = get_the_category();
   $separator = ', ';
   $i = 1;
   if (!(empty($categories))) :
      foreach ($categories as $category) :
         if ($i > 1) : $output .= $separator;
         endif;
         $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr('View all posts in%s', $category->name) . '"> ' . esc_html($category->name) . ' </a>';
         $i++;
      endforeach;
   endif;
   return '<span class="posted-on">Posted<a href="' . esc_url(get_the_permalink()) . '"> ' . $posted_on . ' </a> ago </span>/
 <span class="posted-in">' . $output . '</span>';
}

function sunset_posted_footer()
{
   $comments_nbr = get_comments_number();
   if (comments_open()) {
      if ($comments_nbr == 0) {
         $comments = __('No Comments');
      } elseif ($comments_nbr > 1) {
         $comments = $comments_nbr . __('Comments');
      } else {
         $comments = __('1 Comment');
      }
      $comments = '<a class="comments-link" href="' . get_comments_link() . '">' . $comments . '<span class="icon sunset-comment"></span></a>';
   } else {
      $comments = __('Comments Closed');
   }
   return "
   <div class='post-footer-container'>
     <div class='row'>
     <div class='col-xs-12 col-sm-12 col-md-6 '>"
      . get_the_tag_list("<div class='tags-list'>
         <span class='icon sunset-tag'></span>", " ", "</div>") .
      '</div>
     <div class="col-xs-12 col-sm-12 col-md-6 text-right">' . $comments . "
     </div>
   </div>";
}

function sunset_get_attchment()
{
   $output = '';
   if (has_post_thumbnail()) : /* upload a picture  */
      $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
   else :
      /* not upload picture  */
      /* so  get the picture from the media */
      $attachments = get_posts(array(
         'post_type' => 'attachment',
         'numberposts' => 1,
         'post_parents' => get_the_ID()
      ));
      //  var_dump($attachments);
      if ($attachments) :
         foreach ($attachments as $attachment) :
            $output = wp_get_attachment_url($attachment->ID);
         endforeach;
      endif;

   endif;
   return $output;
}

function sunset_get_embedded_media($type = array())/* type mp3 or mp4 ..... */
{
   /* copy link from this link and paste it in the post "https://soundcloud.com/polo-g/polo-g-feat-lil-tjay-pop-out" */
   $content = do_shortcode(apply_filters('the_content', get_the_content()));
   $embed = get_media_embedded_in_content($content, $type);
   $output = str_replace('?visual=true', '?visual=false', $embed[0]); /* we shoud always do this with audio  */
   return $output;
}
