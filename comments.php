<?php
/*
  @package theme sunset

    ---- comment post --------
    
 */
?>

<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>

        <ol class="comment-list">
            <?php
            $args = array(
                'walker'       => null,
                'max_depth'    => '',
                'style'        =>    'ol',
                'callback'     => null,
                'end-callback' => null,
                'replay_text'  => 'Replay',
                'page'         => '',
                'per_page'     => '',
                'avatar_size'  => 32,
                'reverse_top_level' => '',
                'format'       => 'html5',
                'short_ping'   => false,
                'echo'         => true,
            );
            wp_list_comments($args);
            ?>
        </ol>

        <?php if (!(comments_open() && get_comments_number())) : ?>
            <p class="no-comments"> <?php esc_html_e('Comments are closed', 'Sunset'); ?> </p>
        <?php endif; ?>

    <?php endif; ?>
    
    <?php comment_form(); ?>

</div>




































































































<?php /* all my function in /sunset_theme_support.php  */?>