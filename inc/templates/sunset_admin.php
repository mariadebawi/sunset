<h1> Sunset Sidebar Options</h1>

<?php settings_errors(); ?>

<?php
/* get the data with get_option */
$picture = esc_attr(get_option('profile_picture'));
$firstName = esc_attr(get_option('first_name'));
$lastName = esc_attr(get_option('last_name'));
$fullName = $firstName . '  ' . $lastName;
$description = esc_attr(get_option('description_name'));


$twitter_icon =  esc_attr(get_option('twitter'));
$facebook_icon = esc_attr(get_option('facebook'));
$gplus_icon = esc_attr(get_option('gplus'));

?>
<div class="sunset_sidebar_preview">
  <div class="sunset_sidebar">
    <div class="image_container">
      <div id="picture_profile_preview" class="profile_container" style="background-image: url(<?php print $picture; ?>) ;">
      </div>
    </div>
    <h1 class="sunset_username"> <?php print $fullName; ?></h1>
    <h2 class="sunset_description"> <?php print $description; ?></h1>
      <div class="icon_wrapper" >
          <?php if (!empty($twitter_icon)) : ?>
            <span class="sunset-icon-sidebar dashicons-before dashicons-twitter"></span>
          <?php endif;
           if (!empty($gplus_icon)) : ?>
            <span class="sunset-icon-sidebar sunset-icon-sidebar--gplus dashicons-before dashicons-googleplus"></span>
          <?php endif;
           if (!empty($facebook_icon)) : ?>
            <span class="sunset-icon-sidebar dashicons-before dashicons-facebook-alt"></span>
          <?php endif; ?>

      </div>
  </div>
</div>
<form method="post" action="options.php" class="sunset_general_form">
  <?php
  /* add sidebar  */
  settings_fields('sunset-settings-group');
  /* show sidebar */
  //do_settings_sections($page)
  do_settings_sections('maria_sunset');
  submit_button('Save changes', 'primary', 'submit');












  ?>


</form>