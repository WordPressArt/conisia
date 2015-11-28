 <div class="content-info home">
            <h1 class="title">

                <?php
                if (get_option('inkthemes_mainheading') != '') {
                    echo stripslashes(get_option('inkthemes_mainheading'));
                } else {
                    _e('Your Main Heading Comes Here! Set It From Themes Options Panel', 'colorway');
                }
                ?>
            </h1>
        </div>
        <div  id="content">
            <div class="columns">
                <div class="one_fourth animated" style="-webkit-animation-delay: 0s; -moz-animation-delay: 0s; -o-animation-delay: 0s; -ms-animation-delay: 0s;">
                    <a href="<?php echo get_option('inkthemes_link1'); ?>" class="bigthumbs">
					<div class='img_thumb_feature'><span></span>
                        <?php if (get_option('inkthemes_fimg1') != '') { ?>
                            <img src="<?php echo get_option('inkthemes_fimg1'); ?>" alt="Feature Image 1"/>
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/img.jpg" alt="Feature Image 1"/>
                        <?php } ?>
						</div>
                    </a>
                    <?php if (get_option('inkthemes_headline1') != '') { ?>  
                        <h3>
                            <a href="<?php echo get_option('inkthemes_link1'); ?>">
                                <?php echo stripslashes(get_option('inkthemes_headline1')); ?>
                            </a>
                        </h3>
                    <?php } else { ?>
                        <h3>
                            <a href="#"><?php _e('Power of Easiness', 'colorway'); ?>
                            </a>
                        </h3> 
                        <?php
                    }
                    if (get_option('inkthemes_feature1') != '') {
                        ?> <p>
                            <?php echo stripslashes(get_option('inkthemes_feature1')); ?>
                        </p>
                    <?php } else { ?>
                        <p>
                            <?php _e('This Colorway Wordpress Theme gives you the easiness of building your site without any coding skills required.', 'colorway'); ?>
                        </p> 
                    <?php } ?>
                </div>
                <div class="one_fourth middle animated" style="-webkit-animation-delay: 0s; -moz-animation-delay: 0s; -o-animation-delay: 0s; -ms-animation-delay: 0s;"> 
                    <a href="<?php echo get_option('inkthemes_link2'); ?>" class="bigthumbs">
					<div class='img_thumb_feature'><span></span>
                        <?php if (get_option('inkthemes_fimg2') != '') { ?>
                            <img src="<?php echo get_option('inkthemes_fimg2'); ?>" alt="Feature Image 2"/>
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/img.jpg" alt="Feature Image 2"/>
                        <?php } ?>
						</div>
                    </a>                    
                    <?php if (get_option('inkthemes_headline2') != '') { ?>  
                        <h3>
                            <a href="<?php echo get_option('inkthemes_link2'); ?>">
                                <?php echo stripslashes(get_option('inkthemes_headline2')); ?>
                            </a>
                        </h3>
                    <?php } else { ?>
                        <h3>
                            <a href="#"><?php _e('Power of Speed', 'colorway'); ?>
                            </a>
                        </h3>
                        <?php
                    }
                    if (get_option('inkthemes_feature2') != '') {
                        ?> <p>
                            <?php echo stripslashes(get_option('inkthemes_feature2')); ?>
                        </p>
                    <?php } else { ?>
                        <p>
                            <?php _e('The Colorway Wordpress Theme is highly optimized for Speed. So that your website opens faster than any similar themes.', 'colorway'); ?>
                        </p> 
                    <?php } ?>				
                </div>
                <div class="one_fourth animated" style="-webkit-animation-delay: 0s; -moz-animation-delay: 0s; -o-animation-delay: 0s; -ms-animation-delay: 0s;"> 
                    <a href="<?php echo get_option('inkthemes_link3'); ?>" class="bigthumbs">
					<div class='img_thumb_feature'><span></span>
                        <?php if (get_option('inkthemes_fimg3') != '') { ?>
                            <img src="<?php echo get_option('inkthemes_fimg3'); ?>" alt="Feature Image 3" />
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/img.jpg" alt="Feature Image 3"/>
                        <?php } ?>
					</div>
                    </a>
                    <?php if (get_option('inkthemes_headline3') != '') { ?>  
                        <h3>
                            <a href="<?php echo get_option('inkthemes_link3'); ?>">
                                <?php echo stripslashes(get_option('inkthemes_headline3')); ?>
                            </a>
                        </h3>
                    <?php } else { ?>
                        <h3>
                            <a href="#"><?php _e('Power of SEO', 'colorway'); ?>
                            </a>
                        </h3> 
                        <?php
                    }
                    if (get_option('inkthemes_feature3') != '') {
                        ?> 
                        <p>
                            <?php echo stripslashes(get_option('inkthemes_feature3')); ?>
                        </p>
                    <?php } else { ?>
                        <p>
                            <?php _e('Visitors to the Website are very highly desirable. With the SEO Optimized Themes, You get more traffic from Google.', 'colorway'); ?>
                        </p> 
                    <?php } ?>
                </div>				
                <div class="one_fourth middle last animated" style="-webkit-animation-delay: 0s; -moz-animation-delay: 0s; -o-animation-delay: 0s; -ms-animation-delay: 0s;"> 
                    <a href="<?php echo get_option('inkthemes_link4'); ?>" class="bigthumbs">
					<div class='img_thumb_feature'><span></span>
                        <?php if (get_option('inkthemes_fimg4') != '') { ?>
                            <img src="<?php echo get_option('inkthemes_fimg4'); ?>" alt="Feature Image 4"/>
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/img.jpg" alt="Feature Image 4"/>
                        <?php } ?>
						</div>
                    </a>
                    <?php if (get_option('inkthemes_headline4') != '') { ?>
                        <h3>
                            <a href="<?php echo get_option('inkthemes_link4'); ?>">
                                <?php echo stripslashes(get_option('inkthemes_headline4')); ?>
                            </a>
                        </h3>
                    <?php } else { ?>
                        <h3>
                            <a href="#"><?php _e('Ready Contact Form', 'colorway'); ?>
                            </a>
                        </h3> 
                        <?php
                    }
                    if (get_option('inkthemes_feature4') != '') {
                        ?> 
                        <p>
                            <?php echo stripslashes(get_option('inkthemes_feature4')); ?>
                        </p>
                    <?php } else { ?>
                        <p>
                            <?php _e('Let your visitors easily contact you. The builtin readymade contact form makes it easier for clients to contact.', 'colorway'); ?>
                        </p> 
                    <?php } ?>				    
                </div>	
                <?php if (get_option('inkthemes_featurebox_unlimited') != '') { ?>
                    <?php echo do_shortcode(get_option('inkthemes_featurebox_unlimited')); ?>
                <?php } ?>
            </div>            
        </div>
