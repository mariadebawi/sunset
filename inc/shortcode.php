<?php
 /*=====================
     ShortCode
 =========================== */


//tooltip
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

add_shortcode('tooltip', 'sunset_tooltip');



//popover
function sunset_popover($atts , $content=null){ // shortcode like a tag 
    //get the attributes
    $atts = shortcode_atts(
        array(
            'placement' => 'top' ,
            'title' => '',
            'trigger' => 'click',
            'content' => '',
        ),
        $atts ,
        'popover'
    );
    //return HTML
     return '<span class="sunset_popover" data-toggle="popover" data-content="'.$atts['content'].'" data-placement="'.$atts['placement'].'" title="'.$atts['title'].'" data-trigger="'.$atts['trigger'].'">'.$content.'</span>' ;
  }
  
  add_shortcode('popover', 'sunset_popover') ;
  
  
// Contact Form shortcode
function sunset_contact_form( $atts, $content = null ) {
	
	//[contact_form]
	
	//get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'contact_form'
	);

	//return HTML
	ob_start();
	include 'templates/contact_form.php';
	return ob_get_clean();
	
}
 add_shortcode( 'contact_form', 'sunset_contact_form' );





  














?>