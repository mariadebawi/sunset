<h1> Sunset Theme Options</h1>

<?php settings_errors(); ?>

<?php
/* get the data with get_option */
$options = get_option('post_formats');
$option_header = get_option('custom_header');
$option_background = get_option('custom_background');

?>

<form method="post" action="options.php" class="sunset_general_form">
    <?php
    //settings_fields($option_group)
    settings_fields('sunset-theme-support');

    //do_settings_sections($page)
    do_settings_sections('maria_support_sunset');
    submit_button();
    ?>
</form>