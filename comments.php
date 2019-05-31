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
                esc_html(_nx('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'Sunset')),
                number_format_i18n(get_comments_number()),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2>

        <?php
        if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav id="comment-nav-top" class="comment-navigation" role="navigation">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="post-link-nav">
                            <span class="sunset-icon sunset-chevron-left" aria-hidden="true"></span>
                            <?php previous_comments_link(esc_html__('Older comments', 'Sunset')) ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 text-right">
                        <div class="post-link-nav">
                            <span class="sunset-icon sunset-chevron-right" aria-hidden="true"></span>
                            <?php next_comments_link(esc_html__('Newer comments', 'Sunset')) ?>
                        </div>
                    </div>
                </div>
            </nav>
        <?php endif; ?>

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
                'avatar_size'  => 64,
                'reverse_top_level' => '',
                'format'       => 'html5',
                'short_ping'   => false,
                'echo'         => true,
            );
            wp_list_comments($args);
            ?>
        </ol>

        <?php
        if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav id="comment-nav-bottom" class="comment-navigation" role="navigation">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="post-link-nav">
                            <span class="sunset-icon sunset-chevron-left" aria-hidden="true"></span>
                            <?php previous_comments_link(esc_html__('Older comments', 'Sunset')) ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 text-right">
                        <div class="post-link-nav">
                            <span class="sunset-icon sunset-chevron-right" aria-hidden="true"></span>
                            <?php next_comments_link(esc_html__('Newer comments', 'Sunset')) ?>
                        </div>
                    </div>
                </div>
            </nav>
        <?php endif; ?>


        <?php if (!(comments_open() && get_comments_number())) : ?>
            <p class="no-comments"> <?php esc_html_e('Comments are closed', 'Sunset'); ?> </p>
        <?php endif; ?>

    <?php endif; ?>

    <?php comment_form(); ?>

</div>




































































































<?php /* all my function in /sunset_theme_support.php  */?>