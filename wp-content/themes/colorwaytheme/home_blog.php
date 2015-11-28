            <div class="feature_blog_content">
                <div class=" grid_12 testimonial_div alpha animated fade_left">
                    <?php if (is_active_sidebar('home-page-right-feature-widget-area')) : ?>
                        <div class="sidebar home">
                            <?php dynamic_sidebar('home-page-right-feature-widget-area'); ?>
                        </div>
                    <?php else : ?>			
                        <div class="feature_widget">
                            <?php if (get_option('inkthemes_widget_head') != '') { ?>
                                <h2><?php echo stripslashes(get_option('inkthemes_widget_head')); ?></h2>
                            <?php } else { ?>
                                <h2>What Our Clients Say</h2>
                            <?php } ?>  
                            <?php if (get_option('inkthemes_widget_desc') != '') { ?>
                                <div class="feature_widget_desc"><?php echo stripslashes(get_option('inkthemes_widget_desc')); ?></div>
                            <?php } else { ?>
                                <div class="feature_widget_desc">
                                    <iframe src="//player.vimeo.com/video/51223888?title=0&amp;byline=0&amp;portrait=0&amp;color=005030" width="850" height="375" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endif; ?>	
                </div>
                <div class=" grid_12 blog_slider omega">  
                    <div class="blog_slider_wrapper animated fade_right">
                        <div class="flexslider_blog">
                            <?php if (get_option('inkthemes_blog_head') != '') { ?>
                                <h2><?php echo stripslashes(get_option('inkthemes_blog_head')); ?></h2>
                            <?php } else { ?>
                                <h2>Latest From The Blog</h2>
                            <?php } ?>  
                            <ul class="slides">			
                                <?php
                                while (have_posts()) : the_post();
                                    $content = $post->post_content;
                                    $searchimages = '~<img [^>]* />~';
                                    /* Run preg_match_all to grab all the images and save the results in $pics */
                                    preg_match_all($searchimages, $content, $pics);
                                    // Check to see if we have at least 1 image
                                    $iNumberOfPics = count($pics[0]);
                                    if (($iNumberOfPics > 0) || (has_post_thumbnail())) {
                                        $key_1_value = get_post_meta(get_the_ID(), 'img_key', true);
                                        // check if the custom field has a value
                                        if (empty($key_1_value)) {
                                            inkthemes_image_post($post->ID);
                                        }
                                    }
                                endwhile;
                                ?>  			
                                <?php
                                if (get_option('inkthemes_blog_post') != '') {
                                    $post_limit = stripslashes(get_option('inkthemes_blog_post'));
                                } else {
                                    $post_limit = 3;
                                }
                                $args = array(
                                    'post_status' => 'publish',
                                    'posts_per_page' => $post_limit,
                                    'meta_key' => 'img_key',
                                    'meta_value' => 'on',
                                    'order' => 'DESC'
                                );
                                $query = new WP_Query($args);
                                ?>
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <?php
                                    $content = $post->post_content;
                                    $searchimages = '~<img [^>]* />~';
                                    /* Run preg_match_all to grab all the images and save the results in $pics */
                                    preg_match_all($searchimages, $content, $pics);
                                    // Check to see if we have at least 1 image
                                    $iNumberOfPics = count($pics[0]);
                                    if (($iNumberOfPics > 0) || (has_post_thumbnail())) {
                                        ?>		
                                        <li class="blog_item">                
                                            <div class="flex_thumbnail"> 				
                                                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                                                    <?php inkthemes_get_thumbnail(270, 345); ?>
                                                <?php } else { ?>
                                                    <?php inkthemes_get_image(270, 345); ?> 
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="flex_content"> 
                                                <h3><a href="<?php the_permalink() ?>"><?php the_titlesmall('', '...', true, '35'); ?></a></h3>
                                                <?php echo inkthemes_custom_trim_excerpt(40); ?>
                                                <a class="read_more" href="<?php the_permalink() ?>"><?php _e('Continue Reading &rarr;', 'colorway') ?></a>				
                                            </div>
                                        </li>
                                        <?php
                                    }
                                endwhile;
                                // Reset Query
                                wp_reset_query();
                                ?>  		  
                            </ul>
							<div class="flex-direction-nav ">
  <a href="javascript:void(0);" class="prev">Prev</a>
  <div class="custom-controls-container"></div>
  <a href="javascript:void(0);" class="next">Next</a>
</div>
                        </div>
                    </div>
                </div>
          </div>