<?php

/*
@package theme sunset
 ============================
    Admin Enqueue Function
 ============================
 */

function sunset_load_admin_scripts( $hook){
  /* don't repeat the style to the author pages 
     $hook ====> the name of the page when I click
   */
  if('toplevel_page_maria_sunset' != $hook){
     /* 'toplevel_page_maria_sunset' =====> the name of our page from inspect */
     return ;
    }
  wp_enqueue_script('jquery');
  wp_enqueue_script('respond', get_template_directory_uri() . "/js/admin.js", '', null, true);
  
  wp_register_style('sunset_admin_style', get_template_directory_uri().'/css/admin.css',array() , '1.1.0' , 'all' );
  wp_enqueue_style('sunset_admin_style') ;

  
  /* upload a picture  with jquery 'admin.js'*/
  wp_enqueue_media() ;
  

}
/* style of admin */
add_action('admin_enqueue_scripts','sunset_load_admin_scripts');
