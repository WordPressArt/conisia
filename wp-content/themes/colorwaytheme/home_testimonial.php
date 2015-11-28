<div class="testimonial_item_container"> 
            <div class="testimonial_heading_container animated fading"> 
                <?php if (get_option('inkthemes_testimonial_main_head') != '') { ?>
                    <h2><?php echo stripslashes(get_option('inkthemes_testimonial_main_head')); ?></h2>
                <?php } else { ?>	
                    <h2>Our Customer Love Us</h2>
                <?php } ?>
                <?php if (get_option('inkthemes_testimonial_main_desc') != '') { ?>
                    <p><?php echo stripslashes(get_option('inkthemes_testimonial_main_desc')); ?></p>
                <?php } else { ?>
                    <p>Read the reviews of some of our  Customers </p>
                <?php } ?>
            </div>
            <div class="testimonial_item_content"> 
                <div class="testimonial_item animated fading" style="-webkit-animation-delay: .4s; -moz-animation-delay: .4s; -o-animation-delay: .4s; -ms-animation-delay: .4s;">  
                    <?php if (get_option('inkthemes_testimonial') != '') { ?>
                        <p><?php echo stripslashes(get_option('inkthemes_testimonial')); ?></p>
                    <?php } else { ?>	
                        <p>Create and Manage multiple contact forms using single dashboard. You can show Form on any single/every page of your website. You can also collect payments, leads and much more...</p>
                    <?php } ?>
                    <div class="testimonial_item_inner">  
                        <?php if (get_option('inkthemes_testimonial_img') != '') { ?>
                            <img src="<?php echo stripslashes(get_option('inkthemes_testimonial_img')); ?>"  />
                        <?php } else { ?>	
                            <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial.png" />
                        <?php } ?>
                        <div class="testimonial_name_wrapper">  
                            <?php if (get_option('inkthemes_testimonial_name') != '') { ?>
                                <span><?php echo stripslashes(get_option('inkthemes_testimonial_name')); ?></span>
                            <?php } else { ?>	
                                <span>Robin Chang</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="testimonial_item animated fading" style="-webkit-animation-delay: .8s; -moz-animation-delay: .8s; -o-animation-delay: .8s; -ms-animation-delay: .8s;">    
                    <?php if (get_option('inkthemes_testimonial_2') != '') { ?>
                        <p><?php echo stripslashes(get_option('inkthemes_testimonial_2')); ?></p>
                    <?php } else { ?>	
                        <p>Create and Manage multiple contact forms using single dashboard. You can show Form on any single/every page of your website. You can also collect payments, leads and much more...</p>
                    <?php } ?>
                    <div class="testimonial_item_inner">  
                        <?php if (get_option('inkthemes_testimonial_img_2') != '') { ?>
                            <img src="<?php echo stripslashes(get_option('inkthemes_testimonial_img_2')); ?>"  />
                        <?php } else { ?>	
                            <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial.png" />
                        <?php } ?>
                        <div class="testimonial_name_wrapper">  
                            <?php if (get_option('inkthemes_testimonial_name_2') != '') { ?>
                                <span><?php echo stripslashes(get_option('inkthemes_testimonial_name_2')); ?></span>
                            <?php } else { ?>	
                                <span>Rown wiesly</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="testimonial_item animated fading" style="-webkit-animation-delay: 1.2s; -moz-animation-delay: 1.2s; -o-animation-delay: 1.2s; -ms-animation-delay: 1.2s;">    
                    <?php if (get_option('inkthemes_testimonial_3') != '') { ?>
                        <p><?php echo stripslashes(get_option('inkthemes_testimonial_3')); ?></p>
                    <?php } else { ?>	
                        <p>Create and Manage multiple contact forms using single dashboard. You can show Form on any single/every page of your website. You can also collect payments, leads and much more...</p>
                    <?php } ?>
                    <div class="testimonial_item_inner">  
                        <?php if (get_option('inkthemes_testimonial_img_3') != '') { ?>
                            <img src="<?php echo stripslashes(get_option('inkthemes_testimonial_img_3')); ?>"  />
                        <?php } else { ?>	
                            <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial.png" />
                        <?php } ?>
                        <div class="testimonial_name_wrapper">  
                            <?php if (get_option('inkthemes_testimonial_name_3') != '') { ?>
                                <span><?php echo stripslashes(get_option('inkthemes_testimonial_name_3')); ?></span>
                            <?php } else { ?>	
                                <span>Jex Polack</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                 <?php if (get_option('inkthemes_testimonial_unlimited') != '') { ?>
                    <?php echo do_shortcode(get_option('inkthemes_testimonial_unlimited')); ?>
                <?php } ?>
            </div>
        </div>