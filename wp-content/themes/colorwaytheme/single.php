<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * 
 */
get_header();
?>
<!--Start Content Grid-->
<div class="grid_24 content">
    <div  class="grid_16 alpha">
        <div class="content-wrap content_bar">
            <div class="content-info">
                <?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?>
            </div>
            <!--Start Blog Post-->
            <div class="blog">
                <ul class="single">
                    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
                            <li>				
                                <h2>
                                    <?php the_title(); ?>
                                </h2>
                                <ul class="post_meta">
                                    <li class="posted_by"><span><?php _e('Posted on ', 'colorway'); ?></span><?php the_time('F j, Y'); ?></li>
                                    <li class="posted_in"><span><?php _e(' by ', 'colorway'); ?></span><?php the_author_posts_link(); ?></li>
                                    <li class="post_date"><span><?php _e(' in ', 'colorway'); ?></span><?php the_category(', '); ?></li>
                                    <li class="postc_comment"><span><i class="fa fa-comments hi-icon"></i></span><?php comments_popup_link(__('No Comments.', 'colorway'), __('1 Comment.', 'colorway'), __('% Comments.', 'colorway')); ?></li>
                                </ul>
                                <?php the_content(); ?>
                            </li>
                            <!-- End the Loop. -->
                        <?php endwhile; ?>
                </ul>
            </div>
            <div class="hrline"></div>
            <!--End Blog Post-->
            <div class="clear"></div>
            <div class="social_link">
                <p><?php _e('If you enjoyed this article please consider sharing it!', 'colorway'); ?></p>
            </div>
            <div class="social_logo"> <a title="Tweet this!" href="http://twitter.com/home/?status=<?php the_title(); ?> : <?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-share.png" alt="twitter" title="twitter"/></a> <a title="Share on StumbleUpon!" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/stumbleupon-share.png" alt="upon" title="upon"/></a> <a title="Share on Facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;amp;t=<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-share.png" alt="facebook" title="facebook"/></a> <a title="Digg This!" href="http://digg.com/submit?phase=2&amp;amp;url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/digg-share.png" alt="digg" title="digg"/></a> </div>
            <div class="clear"></div>              
            <nav id="nav-single"> <span class="nav-previous">
                    <?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> Previous Post ', 'colorway')); ?>
                </span> <span class="nav-next">
                    <?php next_post_link('%link', __('Next Post <span class="meta-nav">&rarr;</span>', 'colorway')); ?>
                </span> </nav>
            <!--Start Comment Section-->
            <div class="comment_section">
                <!--Start Comment list-->
                <?php comments_template('', true); ?>
                <!--End Comment Form-->
            </div>
            <!--End comment Section-->
        </div>
    </div>
    <?php get_sidebar(); ?>
</div>
<div class="clear"></div>
<!--End Content Grid-->
</div>
<!--End Container Div-->
<?php
get_footer();
?>