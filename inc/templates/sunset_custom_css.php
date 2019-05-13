<h1> Sunset Custom css</h1>

<?php settings_errors(); ?>

<?php
/* get the data with get_option */

?>
<form id="sunset_custom_css" method="post" action="options.php" class="sunset_general_form">
    <?php
    //var_dump($options) ;
    //settings_fields($option_group)
    settings_fields('sunset-custom_css');

    //do_settings_sections($page)
   do_settings_sections('maria_sunset_css');
   submit_button();
    ?>
</form>





