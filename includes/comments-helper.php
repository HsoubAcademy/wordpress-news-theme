<?php
if( ! function_exists( 'better_comments' ) ):
function better_comments($comment, $args, $depth) { ?>
    <div class="comment-cards" id="comment-cards">
        <div class="comment-card">
            <div class="row">
                <div class="col-lg-2 col-3">
                <div class="user-photo">
                    <?php echo get_avatar($comment ); ?>
                </div>
                </div>
                <div class="col-lg-10 col-9">
                <div class="comment-text">
                    <span class="user-name"><?php echo get_comment_author() ?> </span>
                    <time datetime="<?php the_time('d/m/Y'); ?>" class="d-block"><?php printf(esc_html__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></time>
                    <p><?php comment_text() ?></p>

                    <span class="btn button mb-0"><?php comment_reply_link(array_merge( $args, array('depth' => $depth))) ?></span>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
endif;