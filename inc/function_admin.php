<?php

/*
@package theme sunset
 ============================
    Admin Page
 ============================
 */

function sunset_add_admin_page()
{
   //generate admin page
   //add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position)
   add_menu_page("Sunset_theme_options", "Sunset", "manage_options", "maria_sunset", "sunset_create_page", get_template_directory_uri() . '/img/sunset-icon.png', 110);

   //generate admin page sub page
   add_submenu_page("maria_sunset", 'Sunset_sidebar_options', 'Sidebar', "manage_options", "maria_sunset", "sunset_create_page");
   add_submenu_page("maria_sunset", 'Sunset_theme_options', 'Theme Options', "manage_options", "maria_support_sunset", "sunset_support_page");
   add_submenu_page("maria_sunset", 'Sunset_theme_options', 'Contact Form', "manage_options", "maria_sunset_contact", "sunset_create_contact_page");
   add_submenu_page("maria_sunset", 'maria_theme_contact ', 'Custom CSS', "manage_options", "maria_sunset_css", "sunset_create_sttings_page");

   //activate custom settings
   add_action('admin_init', 'sunset_custom_settings');
}
//add_action($tag, $function_to_add, $priority, $accepted_args)
add_action('admin_menu', 'sunset_add_admin_page');


function sunset_custom_settings()
{
   /* 
      | | | | CREATE A SIDEBAR   | | | | 
   */

   register_setting('sunset-settings-group', 'profile_picture');
   register_setting('sunset-settings-group', 'first_name');
   register_setting('sunset-settings-group', 'last_name');
   register_setting('sunset-settings-group', 'description_name');

   /* Social media */
   register_setting('sunset-settings-group', 'twitter', 'santize_twitter');
   register_setting('sunset-settings-group', 'facebook');
   register_setting('sunset-settings-group', 'gplus');

   add_settings_section('sunset-sidebar-options', 'Siderbar Options', 'sunset_sidebar_options', "maria_sunset");
   add_settings_field("sidebar-picture", "Profile", "sunset_sidebar_picture", "maria_sunset", 'sunset-sidebar-options');
   add_settings_field("sidebar-name", "Full Name", "sunset_sidebar_name", "maria_sunset", 'sunset-sidebar-options');
   add_settings_field("description_name", "Description", "sunset_sidebar_description", "maria_sunset", 'sunset-sidebar-options');

   /* Social media */
   add_settings_field("sidebar-twitter", "Twitter", "sunset_sidebar_Twitter", "maria_sunset", 'sunset-sidebar-options');
   add_settings_field("sidebar-facebook", "Facebook", "sunset_sidebar_facebook", "maria_sunset", 'sunset-sidebar-options');
   add_settings_field("sidebar-gplus", "Google+", "sunset_sidebar_gplus", "maria_sunset", 'sunset-sidebar-options');

   /* 
      | | | | CREATE A THEME OPTIONS   | | | | 
   */

   register_setting('sunset-theme-support', 'post_formats', 'sunset_post_formats_callback');
   /* activate or desactivate custom header or background */
   register_setting('sunset-theme-support', 'custom_header', 'sunset_custom_header_callback');
   register_setting('sunset-theme-support', 'custom_background', 'sunset_custom_background_callback');

   add_settings_section('sunset_theme_option', 'Theme Options', 'sunset_support_options', 'maria_support_sunset');

   add_settings_field('post-formats', 'Post Format', 'sunset_post_formats', 'maria_support_sunset', 'sunset_theme_option');
   /* activate or desactivate custom header or background */
   add_settings_field('custom-header', 'Custom Header', 'sunset_custom_header', 'maria_support_sunset', 'sunset_theme_option');
   add_settings_field('custom-background', 'Background Header', 'sunset_custom_background', 'maria_support_sunset', 'sunset_theme_option');

   /* 
      | | | | CONTACT FORM    | | | | 
   */

   register_setting('sunset-contact', 'activate_contact');
   add_settings_section('sunset-contact-groups', ' Form Contact', 'sunset_contact_section', 'maria_sunset_contact');
   add_settings_field('activ-contact', 'Contact Form', 'active_contact_form',  'maria_sunset_contact', 'sunset-contact-groups');

   /* 
      | | | | CUSTOM CSS    | | | | 
   */

   





}



/* sidebar option */
function sunset_sidebar_options()
{
   echo 'Customize Your Sidebar Information';
}

function sunset_sidebar_picture()
{
   $picture = esc_attr(get_option('profile_picture'));
   if (!empty($picture)) {
      echo '
   <input type="button" class="button button-secondary" value="Replace profile picture" id="upload_button"/>
   <input id="profile" type="hidden"  name="profile_picture"' . $picture . '/>
   <input type="button" class="button button-secondary" value="Remove" id="remove_button"/>
   <input id="profile" type="hidden"  name="profile_picture"' . $picture . '/>';
   } else {
      echo '
   <input type="button" class="button button-secondary" value="Upload profile picture" id="upload_button"/>
   <input id="profile" type="hidden"  name="profile_picture"' . $picture . '/>';
   }
}

function sunset_sidebar_name()
{
   /* show sidebar */
   $firstName = esc_attr(get_option('first_name'));
   $lastName = esc_attr(get_option('last_name'));
   echo
      '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name" />
    <input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name" />';
}
function sunset_sidebar_description()
{
   /* show sidebar */
   $description = esc_attr(get_option('description_name'));
   echo '<input type="text" name="description_name" value="' . $description . '" placeholder="description" /><p class="description">write somthing smart</p>';
}
/* Social media */
function sunset_sidebar_Twitter()
{
   $twitter = esc_attr(get_option('twitter'));
   echo '<input type="text" name="twitter" value="' . $twitter  . '" placeholder="Twitter" /> <p class="description">input your username without @ character</p>';
}
/* suntization twitter settings */
function santize_twitter($input)
{
   $output = sanitize_text_field($input);
   $output = str_replace('@', '', $output);
   return $output;
}
function sunset_sidebar_facebook()
{
   $facebook = esc_attr(get_option('facebook'));
   echo '<input type="text" name="facebook" value="' . $facebook  . '" placeholder="Facebook" />';
}
function sunset_sidebar_gplus()
{
   $gplus = esc_attr(get_option('gplus'));
   echo '<input type="text" name="gplus" value="' . $gplus  . '" placeholder="Google+" />';
}


/* support theme function */
function sunset_post_formats_callback($input)
{
   return $input;
}
function sunset_custom_header_callback($input)
{
   return $input;
}
function sunset_custom_background_callback($input)
{
   return $input;
}
function sunset_support_options()
{
   echo 'Activate or Desactivate specific theme support options';
}
function sunset_post_formats()
{
   $options = get_option('post_formats');
   $formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
   $output = '';
   foreach ($formats as $format) {
      /* @  ==> EXIST */
      $checked = (@$options[$format] == 1 ? 'checked' : '');
      $output .= '<label><input type="checkbox" id="' . $format . '" name="post_formats[' . $format . ']" value="1" ' . $checked . ' />' . $format . '</label><br>';
   }
   echo $output;
}

/* custom header + background  */
function sunset_custom_header()
{
   $options = get_option('custom_header');
   $checked = (@$options == 1 ? 'checked' : '');
   echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" ' . $checked . ' />Activate the custom header </label><br>';
}

function sunset_custom_background()
{
   $options = get_option('custom_background');
   $checked = (@$options == 1 ? 'checked' : '');
   echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" ' . $checked . ' />Activate the custom background </label><br>';
}


/* COntact form  */
function sunset_contact_section()
{
   echo 'Activate Form Contact';
}
function active_contact_form()
{
   $options = get_option('activate_contact');
   $checked = (@$options == 1 ? 'checked' : '');
   echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" ' . $checked . ' /></label><br>';
}



/* Template Submenu page */
function sunset_create_page()
{
   //generation admin page
   require_once(get_template_directory() . '/inc/templates/sunset_admin.php');
}

function sunset_create_sttings_page()
{
   echo '<h1> Custom CSS</h1>';
}

function sunset_support_page()
{
   require_once(get_template_directory() . '/inc/templates/sunset_support_admin.php');
}

function sunset_create_contact_page()
{
   require_once(get_template_directory() . '/inc/templates/sunset_contact_form.php');
}
