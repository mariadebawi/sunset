<h1> Sunset Contact Form</h1>

<?php settings_errors(); ?>

<?php
/* get the data with get_option */
  $options = get_option('activate_contact');

?>
<form method="post" action="options.php" class="sunset_general_form">
    <?php
    //var_dump($options) ;
    //settings_fields($option_group)
    settings_fields('sunset-contact');

    //do_settings_sections($page)
   do_settings_sections('maria_sunset_contact');
   submit_button();
    ?>
</form>





