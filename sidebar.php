<?php

/********************************************************
   ==========  @package theme sunset   Sidebar=============
 **********************************************/
?>

<?php
if (!is_active_sidebar('sunset-sidebar')) //id = 'sunset-sidebar'
    { return;}
?>

<aside id="secondary" class="widget-area" role="complementary">

    <?php dynamic_sidebar('sunset-sidebar'); ?>
 
</aside>