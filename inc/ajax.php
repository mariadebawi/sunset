<?php

/*
	
@package sunsettheme
	
	========================
		AJAX FUNCTIONS
	========================
*/

/* load more */
add_action('wp_ajax_nopriv_sunset_load_more', 'sunset_load_more');
add_action('wp_ajax_sunset_load_more', 'sunset_load_more');

/* contact form  */
add_action('wp_ajax_nopriv_sunset_save_contact_form', 'sunset_save_contact_form');
add_action('wp_ajax_sunset_save_contact_form', 'sunset_save_contact_form');


function sunset_load_more()
{

	$paged = $_POST["page"] + 1;
	$prev = $_POST["prev"];
	$archive = $_POST["archive"];

	if ($prev == 1 && $_POST["page"] != 1) {
		$paged = $_POST["page"] - 1;
	}

	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'paged' => $paged
	);

	if ($archive != '0') {
		//explode() retourne un tableau de chaînes de caractères, chacune d'elle étant une sous-chaîne du paramètre string extraite en utilisant le séparateur delimiter.
		$archVal = explode('/', $archive);
		$flipped = array_flip($archVal);
		//var_dump($flipped) ; 
		//array(5) { ["http:"]=> int(0) [""]=> int(5) ["sunset2019.test"]=> int(2) ["tag"]=> int(3) ["mp3"]=> int(4) }

		//array_flip() retourne un tableau dont les clés sont les valeurs du précédent tableau array, et les valeurs sont les clés.
		switch (isset($flipped)) {
				/*array(6) {
			    [0]=> string(5) "http:"
				[1]=> string(0) ""
				[2]=> string(15) "sunset2019.test"
				[3]=> string(3) "tag" 
				[4]=> string(3) "mp3" 
				[5]=> string(0) ""
		 }*/
			case $flipped["category"]:
				$type = "category_name";
				$key = "category";
				break;

			case $flipped["tag"]:
				$type = "tag";
				$key = $type;
				break;

			case $flipped["author_name"]:
				$type = "author_name";
				$key = $type;
				break;
		}

		$currKey = array_keys($archVal, $key);
		$nextKey = $currKey[0] + 1;
		$value = $archVal[$nextKey]; //the name of category or tag on pos +1 

		$args[$type] = $value;

		//check page trail and remove "page" value
		if (isset($flipped["page"])) {

			$pageVal = explode('page', $archive);
			$page_trail = $pageVal[0];
		} else {
			$page_trail = $archive;
		}
	} else {
		$page_trail = '/';
	}

	$query = new WP_Query($args);

	if ($query->have_posts()) :
		echo '<div class="page-limit" data-page="' . $page_trail . 'page/' . $paged . '/">';

		while ($query->have_posts()) : $query->the_post();
			get_template_part('template-parts/content', get_post_format());

		endwhile;
		echo '</div>';
	else :
		echo 0;
	endif;

	wp_reset_postdata();

	die();
}

function sunset_check_paged($num = null)
{
	$output = '';
	if (is_paged()) {
		$output = 'page/' . get_query_var('paged');
	}
	if ($num == 1) {
		$paged = (get_query_var('paged') == 0 ? 1 : get_query_var('paged'));
		return $paged;
	} else {
		return $output;
	}
}


/* Contact form  */
function sunset_save_contact_form()
{
	$title = wp_strip_all_tags($_POST['name']);
	$email = wp_strip_all_tags($_POST['email']);
	$message = wp_strip_all_tags($_POST['message']);

	$args = array(
		'post_title'    =>  $title,
		'post_content'  =>  $message,
		'post_author'   =>  1,
		'post_status'   =>  'publish',
		'post_type'     =>  'sunset-contact', // slug of page message
		'meta_input'    =>  array(
			'_email_contact_value_key' /* meta_box_key  */ => $email
		)
	);

	$postId = wp_insert_post($args);

	if ($postId !== 0) {
      //form to send email 
		$to = get_bloginfo('admin_email');
		$subject = 'Sunset Contact Form - ' . $title;
		$headers[] = 'From :' . get_bloginfo('name') . ' <' . $to . '>';
		$headers[] = 'Reply-To :' . $title . ' <' . $email . '>';
		$headers[] = 'Content-Type : text/html : charset=UTF-8';

		wp_mail($to, $subject, $message, $headers);
		echo $postId;
	} else {
		echo 0;
	}

	die();
}
