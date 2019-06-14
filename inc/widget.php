<?php
/*
	
@package sunsettheme
	
	========================
		WIDGET CLASS
	========================
*/

//profile widget 
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
        echo $args['before_widget'];

        require(get_template_directory() . '/inc/templates/profile.php');
     
        echo $args['after_widget'];
    }
}

add_action('widgets_init', function () {
    register_widget('Sunset_Profile_Widget');
});

// edit default wordpress widgets
function sunset_tag_cloud_font_change($args)
{
    $args['smallest'] = 8;
    $args['largest'] = 8;
    return $args;
}
add_filter('widget_tag_cloud_args', 'sunset_tag_cloud_font_change');


// change tag a to tag span 
function sunset_list_categories_output_change($links)
{

    $links = str_replace('</a> (', '</a> <span>', $links);
    $links = str_replace(')', '</span>', $links);

    return $links;
}
add_filter('wp_list_categories', 'sunset_list_categories_output_change');


//save post views 
function save_post_views($postId){
  $metaKey = 'sunset_post_views' ;
  $views = get_post_meta($postId, $metaKey, true) ;
   $count = (empty($views) ? 0 : $views) ;
   $count++ ;
     update_post_meta($postId, $metaKey, $count) ;
    // echo '<h1>'.$count.'</h1>';
}
remove_action('wp_head','adjacent_post_rel_link_wp_head',10,0);


// Popular Post
class Sunset_Popular_Posts_Widget extends WP_Widget
{

    //setup the widget name, description, etc...
    public function __construct()
    {

        $widget_ops = array(
            'classname' => 'sunset-popular-posts-widget',
            'description' => 'Popular Posts',
        );
        parent::__construct('sunset_popular_posts', 'Popular Posts', $widget_ops);
    }

    //back-end display of widget
    public function form($instance)
    {
       $title = (!empty($instance['title']) ? $instance['title'] : 'Popular Posts' ) ;
       $tot = (!empty($instance['tot']) ? absint($instance['tot']) : 4 ) ;

       $output = "<p>" ;
       $output .= "<label for ='". esc_attr($this->get_field_id('title'))."' > Title : </label>" ;
       $output .= "<input type = 'text' class='widefat' name ='". esc_attr($this->get_field_name('title'))."' id='". esc_attr($this->get_field_id('title'))."' value='". esc_attr($title)."' />" ;
       $output .= "</p>" ;

       $output .= "<p>" ;
       $output .= "<label for ='". esc_attr($this->get_field_id('tot'))."' > Number  : </label>" ;
       $output .= "<input type = 'number' class='widefat' name ='". esc_attr($this->get_field_name('tot'))."' id='". esc_attr($this->get_field_id('tot'))."' value='". esc_attr($tot)."' />" ;
       $output .= "</p>" ;

      echo $output ;
    }

    //front-end display of widget
    public function widget($args, $instance)
    {   
        $tot = absint($instance['tot']) ;
        $post_args = array(
            'post_type'       => 'post' ,
             'posts_per_page' =>  $tot ,
             'meta_key'       =>  'sunset_post_views' ,
             'orderby'        =>  'meta_value_num'  ,
             'order'          =>  'desc'
        ) ;
        $post_query = new WP_Query($post_args) ;

         echo $args['before_widget'];

          if(!empty($instance['title'])) :
            
            echo $args['before_title'] . apply_filters('widget_title' , $instance['title']) . $args['after_title'];
         
            endif ;
          
          if($post_query->have_posts()) : 
           
           // echo '<ul>' ; 
            
            while($post_query->have_posts()) : $post_query->the_post();

            
          
            echo '<div class="media">';
           //standart not foud on format wp
            echo 

            '<div class="media-left">
               <img class="media-object" src ="'.  get_template_directory_uri().'/img/post-'.(get_post_format() ? get_post_format(): 'standard').'.png" alt="'.get_the_title().'" />
             </div>';

            echo '<div class="media-body">'. get_the_title().'</div>';
          
                $comments_nbr = get_comments_number();
                if (comments_open()) {
                if ($comments_nbr == 0) {
                    $comments = '<span>No </span>'.__('Comments');
                } elseif ($comments_nbr > 1) {
                    $comments =  '<span> '.$comments_nbr .' </span>' . __('Comments');
                } else {
                    $comments = '<span> 1 </span>'.__('Comment');
                }
                $comments = '<a class="comments-link" href="' . get_comments_link() . '">' . $comments . '<span class="sunset-icon sunset-comment"></span></a>';
                } else {
                $comments = __('Comments Closed');
                }
              
                echo " <div class='media-comment'>  $comments </div>" ;
       
            endwhile ;    
           
          //   echo '</ul>' ;

          endif ;


         echo $args['after_widget'];
   
  







    }

  
    //update widget 
    public function update($newInstance , $oldInstance){
      $instance = array();
     
      $instance['title'] = (!empty($newInstance['title']) ? strip_tags($newInstance['title']) :'') ;
      $instance['tot'] = (!empty($newInstance['tot']) ? absint(strip_tags($newInstance['tot'])) : 0) ;
     
      return $instance ;
    }
}

add_action('widgets_init', function () {
    register_widget('Sunset_Popular_Posts_Widget');
});
