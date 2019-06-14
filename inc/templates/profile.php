

<?php 
  $picture = esc_attr(get_option('profile_picture'));
  $firstName = esc_attr(get_option('first_name'));
  $lastName = esc_attr(get_option('last_name'));
  $fullName = $firstName . '  ' . $lastName;
  $description = esc_attr(get_option('description_name'));

  $twitter_icon =  esc_attr(get_option('twitter'));
  $facebook_icon = esc_attr(get_option('facebook'));
  $gplus_icon = esc_attr(get_option('gplus'));
?>


<div class="text-center">
        <div class="sunset_sidebar_preview">
            <div class="sunset_sidebar">
                <div class="image_container">
                    <div id="picture_profile_preview" class="profile_container background_image" style="background-image: url(<?php print $picture; ?>) ;">
                    </div>
                </div>
                <h1 class="sunset_username"> <?php print $fullName; ?></h1>
                <h2 class="sunset_description"> <?php print $description; ?></h1>
                    <div class="icon_wrapper">
                        <?php if (!empty($twitter_icon)) : ?>
                            <a href="https://twitter.com/<?php echo $twitter_icon; ?>" target="_blank"><span class="sunset-icon-sidebar sunset-icon sunset-twitter"></span></a>
                        <?php endif;
                    if (!empty($gplus_icon)) : ?>
                            <a href="https://plus.google.com/u/0/+<?php echo $gplus_icon; ?>" target="_blank"><span class="sunset-icon-sidebar sunset-icon sunset-googleplus"></span></a>
                        <?php endif;
                    if (!empty($facebook_icon)) : ?>
                            <a href="https://facebook.com/<?php echo $facebook_icon; ?>" target="_blank"><span class="sunset-icon-sidebar sunset-icon sunset-facebook"></span></a>
                        <?php endif; ?>
                    </div>
            </div>
        </div>
    </div>