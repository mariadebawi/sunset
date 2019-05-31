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

        <h2 class="comment-title">
            <?php
            //2 comments on “Gallery Post Format”
            printf(
             /* translators: 1: number of comments, 2: post title */
                esc_html(
                    _nx('One comment on &ldquo;%2$s&rdquo;',

                     '%1$s comments on &ldquo;%2$s&rdquo;', 
                     get_comments_number(),
                      'comments title', 'Sunset'
                    )),
                number_format_i18n(get_comments_number()),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2>

        <?php sunset_get_navigatin(); ?>

        <ol class="comment-list"> 
            <?php
            // comtr and reply
            $args = array(
                'walker'       => null,
                'max_depth'    => '',
                'style'        =>    'ol',
                'callback'     => null,
                'end-callback' => null,
                'replay_text'  => 'Replay',
                'page'         => '',
                'per_page'     => '',
                'avatar_size'  => 64,
                'reverse_top_level' => '',
                'format'       => 'html5',
                'short_ping'   => false,
                'echo'         => true,
            );
            wp_list_comments($args);
            ?>
        </ol>

        <?php sunset_get_navigatin(); ?>

        <?php if (!(comments_open() && get_comments_number())) : ?>
            <p class="no-comments"> <?php esc_html_e('Comments are closed', 'Sunset'); ?> </p>
        <?php endif; ?>

    <?php endif; ?>

    <?php  comment_form(sunset_comment_form());  ?>


</div>




































































































<?php /* all my function in /sunset_theme_support.php  */?>