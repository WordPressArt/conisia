<ul class="blog_post">
    <!-- Start the Loop. -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li id="post-<?php the_ID(); ?>" <?php post_class('animated'); ?>>
                <?php
                if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
                    inkthemes_get_thumbnail(258, 190);
                } else {
                    inkthemes_get_image(258, 190);
                }
                ?>
                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to ', 'colorway') . the_title_attribute(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <?php
                _e('Posted on ', 'colorway') . the_time('F j, Y') . _e(' by ', 'colorway') . the_author_posts_link() . _e(' in ', 'colorway') . the_category(', ');
                the_excerpt();
                comments_popup_link(__('No Comments.', 'colorway'), __('1 Comment.', 'colorway'), __('% Comments.', 'colorway'));
                ?>
                <a href="<?php the_permalink() ?>"><?php _e('Continue Reading...', 'colorway'); ?></a> </li>
            <!-- End the Loop. -->
            <?php
        endwhile;
    else:
        ?>
        <li>
            <p>
                <?php _e('Sorry, no posts matched your criteria.', 'colorway'); ?>
            </p>
        </li>
    <?php endif; ?>
</ul>