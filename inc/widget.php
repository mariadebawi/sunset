<?php
/*
	
@package sunsettheme
	
	========================
		WIDGET CLASS
	========================
*/

class Sunset_Profile_Widget extends WP_Widget
{

    //setup the widget name, description, etc...
    public function __construct()
    {

        $widget_ops = array(
            'classname' => 'sunset-profile-widget',
            'description' => 'Custom Sunset Profile Widget',
        );
        parent::__construct('sunset_profile', 'Sunset Profile', $widget_ops);
    }

    //back-end display of widget
    public function form($instance)
    {
        echo '<p><strong>No options for this Widget!</strong><br/>You can control the fields of this Widget from <a href="./admin.php?page=maria_sunset" target="_blank">This Page</a></p>';
    }

    //front-end display of widget
    public function widget($args, $instance)
    {

        $picture = esc_attr(get_option('profile_picture'));
        $firstName = esc_attr(get_option('first_name'));
        $lastName = esc_attr(get_option('last_name'));
        $fullName = $firstName . '  ' . $lastName;
        $description = esc_attr(get_option('description_name'));

        $twitter_icon =  esc_attr(get_option('twitter'));
        $facebook_icon = esc_attr(get_option('facebook'));
        $gplus_icon = esc_attr(get_option('gplus'));

        echo $args['before_widget'];
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
    <?php
    echo $args['after_widget'];
}
}

add_action('widgets_init', function () {
    register_widget('Sunset_Profile_Widget');
});

// edit default wordpress widgets
function sunset_tag_cloud_font_change($args){
    $args['smallest'] = 8 ;
    $args['largest'] = 8 ;
       return $args ;
}
add_filter('widget_tag_cloud_args','sunset_tag_cloud_font_change');


// change tag a to tag span 
function sunset_list_categories_output_change( $links ) {
	
	$links = str_replace('</a> (', '</a> <span>', $links);
	$links = str_replace(')', '</span>', $links);
	
	return $links;
	
}
add_filter( 'wp_list_categories', 'sunset_list_categories_output_change' );

