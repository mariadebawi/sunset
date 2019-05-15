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
function sunset_register_nav_menu(){
   register_nav_menu( 'primary', 'Header Navigation Menu' ) ;
}
add_action('after_setup_theme' , 'sunset_register_nav_menu');
