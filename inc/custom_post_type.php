<?php

/*
@package theme sunset
 ============================
    Theme Custom post type
 ============================
 */

/* activate custom messages  */
$contact = get_option('activate_contact');
if (@$contact == 1) {
  add_action('init', 'sunsetCPT');
  /* change the name columns of cpt message */
  add_filter('manage_sunset-contact_posts_columns', 'my_custom_columns_list');
}

function sunsetCPT()
{
  //  options for Custom Post Type  CPT
  $labels = array(
    'name'                =>   'Messages',
    'singular_name'       =>   'Message',
    'menu_name'           =>   'Messages',
    'name_admin_bar'      =>   'Message'
  );

  $args = array(
    'labels'              => $labels,
    'supports'            => array('title', 'editor',  'author'),
    'hierarchical'        => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 26,
    'capability_type'     => 'post',
    'menu_icon'           => 'dashicons-email-alt',

  );

  // Registering your Custom Post Type
  register_post_type('sunset-contact', $args);
}

function my_custom_columns_list($columns)
{
  $columns['title']     = 'Full Name';
  
  $columns['author']     = 'email';
    return $columns;
}
