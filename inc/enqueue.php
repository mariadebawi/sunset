<?php

/*
@package theme sunset
 ============================
    Admin Enqueue Function
 ============================
 */

function sunset_load_admin_scripts($hook)
{
  /* don't repeat the style to the author pages 
     $hook ====> the name of the page when I click
   */
  if ('toplevel_page_maria_sunset' == $hook) {
    /* 'toplevel_page_maria_sunset' =====> the name of our page from inspect */
    //echo $hook ; //sunset_page_maria_sunset_css

    wp_enqueue_script('jquery');
    wp_enqueue_script('respond', get_template_directory_uri() . "/js/admin.js", '', null, true);

    wp_register_style('sunset_admin_style', get_template_directory_uri() . '/css/admin.css', array(), '1.1.0', 'all');
    wp_enqueue_style('sunset_admin_style');


    /* upload a picture  with jquery 'admin.js'*/
    wp_enqueue_media();
  }
   else if ('sunset_page_maria_sunset_css' == $hook) {
     /* with "ace" we can add an editor css */
    wp_enqueue_script('jquery');
    wp_enqueue_script('ace', get_template_directory_uri() . "/js/ace/ace.js", '1.2.1', true);
    wp_enqueue_script('custom_css_script', get_template_directory_uri() . "/js/custom_css.js",'' ,null, true);

    wp_register_style('custom_css_style', get_template_directory_uri() . '/css/custom_css.css', array(), '1.1.0', 'all');
    wp_enqueue_style('custom_css_style');

    } 
   else {
    return;
  }
}
/* style of admin */
add_action('admin_enqueue_scripts', 'sunset_load_admin_scripts');
