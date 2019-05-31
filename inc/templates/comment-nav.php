
<nav  class="comment-navigation" role="navigation">
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