 <div class="grid_24 slider">
        <div class="slider-container animated">
            <input type="hidden" id="txt_slidespeed" value="<?php
            if (get_option('colorway_slide_speed') != '') {
                echo stripslashes(get_option('colorway_slide_speed'));
            } else {
                echo '3000';
            }
            ?>"/>
			<input type="hidden" id="txt_slide_transtion" value="<?php
            if (get_option('colorway_slide_transition') != '') {
                echo stripslashes(get_option('colorway_slide_transition'));
            } else {
                echo 'fade';
            }
            ?>"/>
           <div class="flexslider">
                <ul class="slides slide">              
                        <?php
                        //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                        $mystring1 = get_option('colorway_slideimage1');
                        $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring1)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        ?>
                        <?php if ($check_img_ofset == 0 && get_option('colorway_slideimage1') != '') { ?>        
							<li>
                                <div class="slide-image fl"><?php echo get_option('colorway_slideimage1'); ?></div>   
                            </li> 
                        <?php } else { ?>
                            <?php if (get_option('colorway_slideimage1') != '') { ?>
                                <li>
								<?php if (get_option('colorway_slideheading1') != '') { ?>
                                   <div class="slide-content entry fl">
                                        <h2 class="title"><a href="<?php echo get_option('colorway_slidelink1'); ?>" target="_blank"><?php echo stripslashes(get_option('colorway_slideheading1')); ?>  </a></h2>
                                        <p><?php echo stripslashes(get_option('colorway_slidedescription1')); ?></p>
                                    </div>
									<?php } else { ?>
										 <div class="slide-content entry fl">
                                        <h2 class="title"><a href="#"><?php _e('Beauty at its best', 'colorway'); ?></a></h2>
                                        <p><?php _e('What happens when beauty and simplicity connects. We tried to give you a slight hint.', 'colorway'); ?></p>
                                    </div>
									<?php } ?>
                                    <!-- /.slide-content -->
                                    <div class="slide-image fl"><a href="<?php
                                        if (get_option('colorway_slidelink1') != '') {
                                            echo get_option('colorway_slidelink1');
                                        } else {
                                            echo '#';
                                        }
                                        ?>" target="_blank"><img src="<?php echo get_option('colorway_slideimage1'); ?>" class="slide-img" alt="<?php echo stripslashes(get_option('colorway_slideheading1')); ?>"/> </a></div>
                                    <!-- /.slide-image -->
                                    <div class="fix"></div>
                                </li>
                                <!-- /.slide -->
                            <?php } else {
                                ?>
                                <li>
                                    <!-- /.slide-content -->
                                    <div class="slide-image fl"><a href="<?php
                                        if (get_option('colorway_slidelink2') != '') {
                                            echo get_option('colorway_slidelink2');
                                        } else {
                                            echo '#';
                                        }
                                        ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/colorway-img.jpg" class="slide-img" alt="<?php echo stripslashes(get_option('colorway_slideheading1')); ?>"/></a> </div>
                                    <!-- /.slide-image -->
                                    <div class="fix"></div>
                                </li>
                                <!-- /.slide -->
                                <?php
                            }
                        }
                        $check_img_ofset = 0;
                        //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                        $mystring2 = get_option('colorway_slideimage2');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring2)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        //            
                        if ($check_img_ofset == 0 && get_option('colorway_slideimage2') != '') {
                            ?>        
                            <li>
                                <div class="slide-image fl"><?php echo get_option('colorway_slideimage2'); ?></div>   
                            </li> 
                            <?php
                        } else {
                            if (get_option('colorway_slideimage2') != '') {
                                ?>
                                <li>
								<?php if (get_option('colorway_slideheading2') != '') { ?>
                                    <div class="slide-content entry fl">
                                        <h2 class="title"><a href="<?php echo get_option('colorway_slidelink2'); ?>" target="_blank"><?php echo stripslashes(get_option('colorway_slideheading2')); ?></a></h2>
                                        <p><?php echo stripslashes(get_option('colorway_slidedescription2')); ?></p>
                                    </div>
									<?php } ?>
                                    <!-- /.slide-content -->
                                    <div class="slide-image fl"><a href="<?php
                                        if (get_option('colorway_slidelink2') != '') {
                                            echo get_option('colorway_slidelink2');
                                        } else {
                                            echo '#';
                                        }
                                        ?>" target="_blank"><img  src="<?php echo get_option('colorway_slideimage2'); ?>" class="slide-img" alt="<?php echo stripslashes(get_option('colorway_slideheading2')); ?>" /></a></div>
                                    <!-- /.slide-image -->
                                    <div class="fix"></div>
                                </li>
                                <!-- /.slide -->
                                <?php
                            }
                        }
                        //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                        $mystring3 = get_option('colorway_slideimage3');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring3)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        //            
                        if ($check_img_ofset == 0 && get_option('colorway_slideimage3') != '') {
                            ?>        
                            <li>
                                <div class="slide-image fl"><?php echo get_option('colorway_slideimage3'); ?></div>   
                            </li> 
                            <?php
                        } else {
                            if (get_option('colorway_slideimage3') != '') {
                                ?>
                                <li>
								<?php if (get_option('colorway_slideheading3') != '') { ?>
                                    <div class="slide-content entry fl">
                                        <h2 class="title"><a href="<?php echo get_option('colorway_slidelink3'); ?>" target="_blank"><?php echo stripslashes(get_option('colorway_slideheading3')); ?></a></h2>
                                        <p><?php echo stripslashes(get_option('colorway_slidedescription3')); ?></p>
                                    </div>
									<?php } ?>
                                    <!-- /.slide-content -->
                                    <div class="slide-image fl"><a href="<?php
                                        if (get_option('colorway_slidelink3') != '') {
                                            echo get_option('colorway_slidelink3');
                                        } else {
                                            echo '#';
                                        }
                                        ?>" target="_blank"><img  src="<?php echo get_option('colorway_slideimage3'); ?>" class="slide-img" alt="<?php echo stripslashes(get_option('colorway_slideheading3')); ?>"/></a></div>
                                    <!-- /.slide-image -->
                                    <div class="fix"></div>
                                </li>
                                <?php
                            }
                        }
                        $check_img_ofset = 0;
//The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                        $mystring4 = get_option('colorway_slideimage4');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring4)) {
                                $check_img_ofset = 1;
                            }
                        }
// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
//            
                        if ($check_img_ofset == 0 && get_option('colorway_slideimage4') != '') {
                            ?>        
                            <li>
                                <div class="slide-image fl"><?php echo get_option('colorway_slideimage4'); ?></div>   
                            </li> 
                            <?php
                        } else {
                            if (get_option('colorway_slideimage4') != '') {
                                ?>
                                <li>
								<?php if (get_option('colorway_slideheading4') != '') { ?>
                                   <div class="slide-content entry fl">
                                        <h2 class="title"><a href="<?php echo get_option('colorway_slidelink4'); ?>" target="_blank"><?php echo stripslashes(get_option('colorway_slideheading4')); ?></a></h2>
                                        <p><?php echo stripslashes(get_option('colorway_slidedescription4')); ?></p>
                                    </div>
									<?php } ?>
                                    <!-- /.slide-content -->
                                    <div class="slide-image fl"><a href="<?php
                                        if (get_option('colorway_slidelink4') != '') {
                                            echo get_option('colorway_slidelink4');
                                        } else {
                                            echo '#';
                                        }
                                        ?>" target="_blank"><img  src="<?php echo get_option('colorway_slideimage4'); ?>" class="slide-img" alt="<?php echo stripslashes(get_option('colorway_slideheading4')); ?>"/></a></div>
                                    <!-- /.slide-image -->
                                    <div class="fix"></div>
                                </li>
                                <!-- /.slide -->
                                <?php
                            }
                        }
                        $check_img_ofset = 0;
//The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                        $mystring5 = get_option('colorway_slideimage5');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring5)) {
                                $check_img_ofset = 1;
                            }
                        }
// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
//            
                        if ($check_img_ofset == 0 && get_option('colorway_slideimage5') != '') {
                            ?>        
                            <li>
                                <div class="slide-image fl"><?php echo get_option('colorway_slideimage5'); ?></div>   
                            </li> 
                            <?php
                        } else {
                            if (get_option('colorway_slideimage5') != '') {
                                ?>
                                <li>
								<?php if (get_option('colorway_slideheading5') != '') { ?>
                                    <div class="slide-content entry fl">
                                        <h2 class="title"><a href="<?php echo get_option('colorway_slidelink5'); ?>" target="_blank"><?php echo stripslashes(get_option('colorway_slideheading5')); ?></a></h2>
                                        <p><?php echo stripslashes(get_option('colorway_slidedescription5')); ?></p>
                                    </div>
									<?php } ?>
                                    <!-- /.slide-content -->
                                    <div class="slide-image fl"><a href="<?php
                                        if (get_option('colorway_slidelink5') != '') {
                                            echo get_option('colorway_slidelink5');
                                        } else {
                                            echo '#';
                                        }
                                        ?>" target="_blank"><img  src="<?php echo get_option('colorway_slideimage5'); ?>" class="slide-img" alt="<?php echo stripslashes(get_option('colorway_slideheading5')); ?>"/></a></div>
                                    <!-- /.slide-image -->
                                    <div class="fix"></div>
                                </li>
                                <!-- /.slide -->
                                <?php
                            }
                        }
                        $check_img_ofset = 0;
//The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                        $mystring6 = get_option('colorway_slideimage6');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring6)) {
                                $check_img_ofset = 1;
                            }
                        }
// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
//            
                        if ($check_img_ofset == 0 && get_option('colorway_slideimage6') != '') {
                            ?>        
                            <li>
                                <div class="slide-image fl"><?php echo get_option('colorway_slideimage6'); ?></div>   
                            </li> 
                            <?php
                        } else {
                            if (get_option('colorway_slideimage6') != '') {
                                ?>
                                <li>
								<?php if (get_option('colorway_slideheading6') != '') { ?>
                                    <div class="slide-content entry fl">
                                        <h2 class="title"><a href="<?php echo get_option('colorway_slidelink6'); ?>" target="_blank"><?php echo stripslashes(get_option('colorway_slideheading6')); ?></a></h2>
                                        <p><?php echo stripslashes(get_option('colorway_slidedescription6')); ?></p>
                                    </div>
								<?php } ?>
                                    <!-- /.slide-content -->
                                    <div class="slide-image fl"><a href="<?php
                                        if (get_option('colorway_slidelink6') != '') {
                                            echo get_option('colorway_slidelink6');
                                        } else {
                                            echo '#';
                                        }
                                        ?>" target="_blank"><img  src="<?php echo get_option('colorway_slideimage6'); ?>" class="slide-img" alt="<?php echo stripslashes(get_option('colorway_slideheading6')); ?>"/></a></div>
                                    <!-- /.slide-image -->
                                    <div class="fix"></div>
                                </li>
                                <!-- /.slide -->
                                <?php
                            }
                        }
                        ?>
                    <!-- /.slides_container -->
					<?php if (get_option('inkthemes_slide_unlimited') != '') { ?>
			<?php echo do_shortcode(get_option('inkthemes_slide_unlimited')); ?>
			<?php } else {} ?>
                </ul>
                <!-- /#slide-box -->
            </div>
            <!-- /#slides -->
        </div>
    </div>