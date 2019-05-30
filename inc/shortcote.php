<?php
 /*=====================
     ShortCode
 =========================== */

function sunset_tooltip($atts , $content=null){ // shortcode like a tag 
  //get the attributes
  $atts = shortcode_atts(
      array(
          'placement' => 'top' ,
          'title' => '',
      ),
      $atts ,
      'tooltip'
  );
  //return HTML
  $title = ($atts['title'] == '' ? $content : $atts['title']) ;
   return '<span class="sunset_tooltip" data-toggle="tooltip" data-placement="'.$atts['placement'].'" title="'.$title.'">'.$content.'</span>' ;
}

add_shortcode('tooltip', 'sunset_tooltip')

















?>