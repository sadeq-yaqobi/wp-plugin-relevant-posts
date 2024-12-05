<?php
function rp_relevant_posts_front_layout()
{
    include_once RP_PLUGIN_INC . 'front/get-relevant-posts.php';
    $the_query = new WP_Query($args);
    $title = get_option('_rp_title');
    $display_type = get_option('_rp_display_type');
    ?>
    <!-- Set up your HTML -->
    <div class="rp-container">
        <h4><?php echo $title !== null ? esc_html($title) : 'مطالب مرتبط' ?></h4>

        <!--show relevant posts in slider way-->
        <?php if ($display_type == 'block'): ?>
            <div class="owl-carousel owl-theme">
                <?php
                if ($the_query->have_posts()):
                    while ($the_query->have_posts()):$the_query->the_post(); ?>
                        <div class="rp-wrapper"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?>
                                <p><?php the_title() ?></p></a></div>
                    <?php endwhile;
                    wp_reset_postdata();
                else:?>
                    <div>مطلب مرتبطی پیدا نشد.</div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!--show relevant posts in list way-->
        <?php if ($display_type == 'list'): ?>
            <ul class="rp-wrapper-list">
                <?php if ($the_query->have_posts()):
                    while ($the_query->have_posts()):$the_query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>">
                            <li class="rp-list-item"><span><?php the_post_thumbnail(); ?></span><?php the_title() ?>
                            </li>
                        </a>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else:?>
                    <div>مطلب مرتبطی پیدا نشد.</div>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php
}

add_shortcode('relevant-posts', 'rp_relevant_posts_front_layout');