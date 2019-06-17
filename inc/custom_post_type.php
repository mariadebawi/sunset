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

  /* add and change the name columns of cpt message */
  //add_filter('manage_{your name of register post type}_posts_columns', 'function') !always like this example;
  add_filter('manage_sunset-contact_posts_columns', 'sunset_set_columns_list');

  /* show the data message */
  //add_action('manage_{your name of your register cpt }_posts_custom_column', function', 10, 2) !always like this example;
  add_action('manage_sunset-contact_posts_custom_column', 'sunset_custom_columns_list', 10, 2);

  /* add meta box email */
  add_action('add_meta_boxes', 'sunset_contact_add_meta_box');
  add_action('save_post', 'sunset_save_contact_email_data');
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

/* add and change the name columns of cpt message */
function sunset_set_columns_list($columns)
{
  unset($columns['title']);
  unset($columns['date']);
  unset($columns['author']);

  $columns['title']     = 'Full Name';
  $columns['message']     = 'Message';
  $columns['email']     = 'Email';
  $columns['date']     = 'Date';

  return $columns;
}

/* show the data message */
function sunset_custom_columns_list($columns, $post_id)
{
  switch ($columns) {
    case 'message':
      echo get_the_excerpt();
      break;
    case 'email':
      $email = get_post_meta($post_id, '_email_contact_value_key', true);
      echo '<a href="mailto:' . $email . '">' . $email . '</a>';
      break;
  }
}

/* CONTACT META BOXES */

function sunset_contact_add_meta_box()
{
  //'side' , 'normal ' : postion of the meta bow
  // 'heigh , 'default' : win bethabt
  add_meta_box('contact_email', 'User Email', 'sunset_contact_email_callback', 'sunset-contact', 'side');
}

function sunset_contact_email_callback($post)
{
  wp_nonce_field('sunset_save_contact_email_data', 'sunset_contact_email_meta_box_nonce');

  $value = get_post_meta($post->ID, '_email_contact_value_key', true);

  echo '<label for="sunset_contact_email_field">User Email Address: </lable>';
  echo '<input type="email" id="sunset_contact_email_field" name="sunset_contact_email_field" value="' . esc_attr($value) . '" size="25" />';
}

function sunset_save_contact_email_data($post_id)
{

  if (!isset($_POST['sunset_contact_email_meta_box_nonce'])) {
    return;
  }

  if (!wp_verify_nonce($_POST['sunset_contact_email_meta_box_nonce'], 'sunset_save_contact_email_data')) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (!isset($_POST['sunset_contact_email_field'])) {
    return;
  }

  $my_data = sanitize_text_field($_POST['sunset_contact_email_field']);

  update_post_meta($post_id, '_email_contact_value_key', $my_data);
}
