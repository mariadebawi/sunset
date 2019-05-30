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

function sunset_get_attchment($num = 1)
{
   $output = '';
   if (has_post_thumbnail() && $num == 1) : /* upload a picture and not have a media picture */
      $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
   else :
      /* not upload picture  */
      /* so  get the picture from the media */
      $attachments = get_posts(array(
         'post_type' => 'attachment',
         'numberposts' => $num,
         'post_parent' => get_the_ID()
      ));
      //  var_dump($attachments);
      if ($attachments && $num == 1) /* not have a thumbnails picture */ :
         foreach ($attachments as $attachment) :
            $output = wp_get_attachment_url($attachment->ID);
         endforeach;
      elseif ($attachments && $num > 1) :
         $output = $attachments;
      endif;

   endif;
   return $output;
}

function sunset_get_embedded_media($type = array()) /* type mp3 or mp4 ..... */
{
   /* copy link from this link and paste it in the post "https://soundcloud.com/polo-g/polo-g-feat-lil-tjay-pop-out" */
   $content = do_shortcode(apply_filters('the_content', get_the_content()));
   $embed = get_media_embedded_in_content($content, $type);
   if (in_array('audio', $type)) :
      $output = str_replace('?visual=true', '?visual=false', $embed[0]); /* we shoud always do this with audio  */
   else :
      $output = $embed[0]; // the postion
   endif;
   return $output;
}

function sunset_get_bs_slides( $attachments ){
	
	$output = array();
	$count = count($attachments)-1;
	
	for( $i = 0; $i <= $count; $i++ ): 
	
		$active = ( $i == 0 ? ' active' : '' );
		
		$n = ( $i == $count ? 0 : $i+1 );
		$nextImg = wp_get_attachment_thumb_url( $attachments[$n]->ID );
		$p = ( $i == 0 ? $count : $i-1 );
		$prevImg = wp_get_attachment_thumb_url( $attachments[$p]->ID );
		
		$output[$i] = array( 
			'class'		=> $active, 
			'url'		=> wp_get_attachment_url( $attachments[$i]->ID ),
			'next_img'	=> $nextImg,
			'prev_img'	=> $prevImg,
			'caption'	=> $attachments[$i]->post_excerpt
		);
	
	endfor;
	
	return $output;
	
}

function sunset_grap_url(){
   /* preg_match ==> function de recherche */
   if(!preg_match('/<a\s[^>]*?href=[\'"](.+?)[\'"]/i',get_the_content() , $link)){ 
       /* \s ==> white space  */
      return false ;
   }
    return esc_url_raw($link[1]) ;
}



function sunset_grab_current_uri() {
	$http = ( isset( $_SERVER["HTTPS"] ) ? 'https://' : 'http://' );
	$referer = $http . $_SERVER["HTTP_HOST"];
	$archive_url = $referer . $_SERVER["REQUEST_URI"];
	
	return $archive_url;
}


/*
============================
 Single Page custom functions
============================
*/

function sunset_post_navigation(){
   $nav = '<div class="row">';
 
   $prev = get_previous_post_link('<div class="post-link-nav"><span class="icon sunset-chevron-left" aria-hidden="true"></span>%link</div>','%title');
   $nav .= '<div class="col-xs-12 col-sm-6">'.$prev.'</div>';
 
   $next = get_next_post_link('<div class="post-link-nav">%link <span class="icon sunset-chevron-right" aria-hidden="true"></span></div>','%title');
   $nav .= '<div class="col-xs-12 col-sm-6 text-right">'.$next.'</div>';
 
   $nav .= '</div>';
   return $nav ;
}



   