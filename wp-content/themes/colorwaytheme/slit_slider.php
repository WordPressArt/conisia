<div id="slider" class="sl-slider-wrapper">
    <input type="hidden" id="txt_slidespeed" value="<?php if (get_option('colorway_slide_speed') != '') { ?> <?php echo stripslashes(get_option('colorway_slide_speed')); ?>
           <?php } else { ?>3000<?php } ?>"/>
    <div class="sl-slider">				
        <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">							
                <div class="salesdetails">
                    <?php if (get_option('colorway_slideheading1') != '') { ?>
                        <a href="<?php
                        if (get_option('colorway_slidelink1') != '') {
                            echo get_option('colorway_slidelink1');
                        } else {
                            echo "#";
                        }
                        ?>"><h1><?php echo get_option('colorway_slideheading1'); ?></h1></a>
                       <?php } else { ?>
                        <a href="#"><h1>
                                <?php _e('Your Site is faster to build.', 'colorway'); ?>
                            </h1></a>
                    <?php } ?>
                    <?php if (get_option('colorway_slidedescription1') != '') { ?>
                        <p><?php echo get_option('colorway_slidedescription1'); ?></p>
                    <?php } else { ?>
                        <p>
                            <?php _e('Premium WordPress Themes with Single Click Installation, Just a Click and your website is ready for use.', 'colorway'); ?>
                        </p>
                    <?php } ?>
                </div>
            </div>
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
                <div class="bg-img bg-img-1"><?php echo get_option('colorway_slideimage1'); ?></div>
            <?php } else { ?>  
                <div class="bg-img bg-img-1">
                    <?php if (get_option('colorway_slideimage1') != '') { ?>
                        <a href="<?php
                        if (get_option('colorway_slidelink1') != '') {
                            echo get_option('colorway_slidelink1');
                        }
                        ?>" >
                            <img  src="<?php echo get_option('colorway_slideimage1'); ?>" alt="Slide Image 1"/></a>
                    <?php } else { ?>
                        <img  src="<?php echo get_template_directory_uri(); ?>/images/colorway-img.jpg" alt="Slide Image 1"/>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>	
        <?php if (get_option('colorway_slideimage2') != '') { ?>
            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <?php if (get_option('colorway_slideheading2') != '') { ?>
                    <div class="sl-slide-inner">							
                        <div class="salesdetails">
                            <?php if (get_option('colorway_slideheading2') != '') { ?>
                                <a href="<?php
                                if (get_option('colorway_slidelink2') != '') {
                                    echo get_option('colorway_slidelink2');
                                } else {
                                    echo "#";
                                }
                                ?>"><h1><?php echo get_option('colorway_slideheading2'); ?></h1></a>
                               <?php } if (get_option('colorway_slidedescription2') != '') { ?>
                                <p><?php echo get_option('colorway_slidedescription2'); ?></p>
                            <?php } ?>                                
                        </div>
                    </div>
                    <?php
                }
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring2 = get_option('colorway_slideimage2');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring2)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
                <?php if ($check_img_ofset == 0 && get_option('colorway_slideimage2') != '') { ?>
                    <div class="bg-img bg-img-2"><?php echo get_option('colorway_slideimage2'); ?></div>
                <?php } else { ?>  
                    <div class="bg-img bg-img-2">
                        <?php if (get_option('colorway_slideimage2') != '') { ?>
                            <a href="<?php
                            if (get_option('colorway_slidelink2') != '') {
                                echo get_option('colorway_slidelink2');
                            }
                            ?>" >
                                <img  src="<?php echo get_option('colorway_slideimage2'); ?>" alt="Slide Image 2"/></a>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } if (get_option('colorway_slideimage3') != '') { ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <?php if (get_option('colorway_slideheading3') != '') { ?>
                    <div class="sl-slide-inner">						
                        <div class="salesdetails">
                            <?php if (get_option('colorway_slideheading3') != '') { ?>
                                <a href="<?php
                                if (get_option('colorway_slidelink3') != '') {
                                    echo get_option('colorway_slidelink3');
                                } else {
                                    echo "#";
                                }
                                ?>"><h1><?php echo get_option('colorway_slideheading3'); ?></h1></a>
                               <?php } ?>
                               <?php if (get_option('colorway_slidedescription3') != '') { ?>
                                <p><?php echo get_option('colorway_slidedescription3'); ?></p>
                            <?php } ?>          
                        </div>
                    </div>
                    <?php
                }
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring3 = get_option('colorway_slideimage3');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring3)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>				   
                <?php if ($check_img_ofset == 0 && get_option('colorway_slideimage3') != '') { ?>
                    <div class="bg-img bg-img-3"><?php echo get_option('colorway_slideimage3'); ?></div>
                <?php } else { ?>                        
                    <div class="bg-img bg-img-3">
                        <?php if (get_option('colorway_slideimage3') != '') { ?>
                            <a href="<?php
                            if (get_option('colorway_slidelink3') != '') {
                                echo get_option('colorway_slidelink3');
                            }
                            ?>" >
                                <img  src="<?php echo get_option('colorway_slideimage3'); ?>" alt="Slide Image 3"/></a>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } if (get_option('colorway_slideimage4') != '') { ?>
            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
                <?php if (get_option('colorway_slideheading4') != '') { ?>
                    <div class="sl-slide-inner">						
                        <div class="salesdetails">
                            <?php if (get_option('colorway_slideheading4') != '') { ?>
                                <a href="<?php
                                if (get_option('colorway_slidelink4') != '') {
                                    echo get_option('colorway_slidelink4');
                                } else {
                                    echo "#";
                                }
                                ?>"><h1><?php echo get_option('colorway_slideheading4'); ?></h1></a>
                               <?php } ?>
                               <?php if (get_option('colorway_slidedescription4') != '') { ?>
                                <p><?php echo get_option('colorway_slidedescription4'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                } //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring4 = get_option('colorway_slideimage4');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring4)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
                <?php if ($check_img_ofset == 0 && get_option('colorway_slideimage4') != '') { ?>
                    <div class="bg-img bg-img-4"><?php echo get_option('colorway_slideimage4'); ?></div>					
                <?php } else { ?>
                    <div class="bg-img bg-img-4">
                        <?php if (get_option('colorway_slideimage4') != '') { ?>
                            <a href="<?php
                            if (get_option('colorway_slidelink4') != '') {
                                echo get_option('colorway_slidelink4');
                            }
                            ?>" >
                                <img  src="<?php echo get_option('colorway_slideimage4'); ?>" alt="Slide Image 4"/></a>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                <?php } ?>                   
            </div>
        <?php } if (get_option('colorway_slideimage5') != '') { ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                <?php if (get_option('colorway_slideheading5') != '') { ?>	
                    <div class="sl-slide-inner">
                        <div class="salesdetails">
                            <?php if (get_option('colorway_slideheading5') != '') { ?>
                                <a href="<?php
                                if (get_option('colorway_slidelink5') != '') {
                                    echo get_option('colorway_slidelink5');
                                } else {
                                    echo "#";
                                }
                                ?>"><h1><?php echo get_option('colorway_slideheading5'); ?></h1></a>
                               <?php } ?>
                               <?php if (get_option('colorway_slidedescription5') != '') { ?>
                                <p><?php echo get_option('colorway_slidedescription5'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring5 = get_option('colorway_slideimage5');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring5)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
                <?php if ($check_img_ofset == 0 && get_option('colorway_slideimage5') != '') { ?>
                    <div class="bg-img bg-img-5"><?php echo get_option('colorway_slideimage5'); ?></div>					
                <?php } else { ?>
                    <div class="bg-img bg-img-5">
                        <?php if (get_option('colorway_slideimage5') != '') { ?>
                            <a href="<?php
                            if (get_option('colorway_slidelink5') != '') {
                                echo get_option('colorway_slidelink5');
                            }
                            ?>" >
                                <img  src="<?php echo get_option('colorway_slideimage5'); ?>" alt="Slide Image 5"/></a>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } if (get_option('colorway_slideimage6') != '') { ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                <?php if (get_option('colorway_slideheading6') != '') { ?>	
                    <div class="sl-slide-inner">
                        <div class="salesdetails">
                            <?php if (get_option('colorway_slideheading6') != '') { ?>
                                <a href="<?php
                                if (get_option('colorway_slidelink6') != '') {
                                    echo get_option('colorway_slidelink6');
                                } else {
                                    echo "#";
                                }
                                ?>"><h1><?php echo get_option('colorway_slideheading6'); ?></h1></a>
                               <?php } ?>
                               <?php if (get_option('colorway_slidedescription6') != '') { ?>
                                <p><?php echo get_option('colorway_slidedescription6'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring5 = get_option('colorway_slideimage6');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring5)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
                <?php if ($check_img_ofset == 0 && get_option('colorway_slideimage6') != '') { ?>
                    <div class="bg-img bg-img-5"><?php echo get_option('colorway_slideimage6'); ?></div>					
                <?php } else { ?>
                    <div class="bg-img bg-img-5">
                        <?php if (get_option('colorway_slideimage6') != '') { ?>
                            <a href="<?php
                            if (get_option('colorway_slidelink6') != '') {
                                echo get_option('colorway_slidelink6');
                            }
                            ?>" >
                                <img  src="<?php echo get_option('colorway_slideimage6'); ?>" alt="Slide Image 5"/></a>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } if (get_option('colorway_slideimage7') != '') { ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                <?php if (get_option('colorway_slideheading7') != '') { ?>	
                    <div class="sl-slide-inner">
                        <div class="salesdetails">
                            <?php if (get_option('colorway_slideheading7') != '') { ?>
                                <a href="<?php
                                if (get_option('colorway_slidelink7') != '') {
                                    echo get_option('colorway_slidelink7');
                                } else {
                                    echo "#";
                                }
                                ?>"><h1><?php echo get_option('colorway_slideheading7'); ?></h1></a>
                               <?php } ?>
                               <?php if (get_option('colorway_slidedescription7') != '') { ?>
                                <p><?php echo get_option('colorway_slidedescription7'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring7 = get_option('colorway_slideimage7');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring7)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
                <?php if ($check_img_ofset == 0 && get_option('colorway_slideimage7') != '') { ?>
                    <div class="bg-img bg-img-5"><?php echo get_option('colorway_slideimage7'); ?></div>		 <?php } else { ?>
                    <div class="bg-img bg-img-5">
                        <?php if (get_option('colorway_slideimage7') != '') { ?>
                            <a href="<?php
                            if (get_option('colorway_slidelink7') != '') {
                                echo get_option('colorway_slidelink7');
                            }
                            ?>" >
                                <img  src="<?php echo get_option('colorway_slideimage7'); ?>" alt="<?php echo get_option('colorway_slideheading7'); ?>"/></a>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } if (get_option('colorway_slideimage8') != '') { ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                <?php if (get_option('colorway_slideheading8') != '') { ?>	
                    <div class="sl-slide-inner">
                        <div class="salesdetails">
                            <?php if (get_option('colorway_slideheading8') != '') { ?>
                                <a href="<?php
                                if (get_option('colorway_slidelink8') != '') {
                                    echo get_option('colorway_slidelink8');
                                } else {
                                    echo "#";
                                }
                                ?>"><h1><?php echo get_option('colorway_slideheading8'); ?></h1></a>
                               <?php } ?>
                               <?php if (get_option('colorway_slidedescription8') != '') { ?>
                                <p><?php echo get_option('colorway_slidedescription8'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring8 = get_option('colorway_slideimage8');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring8)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
                <?php if ($check_img_ofset == 0 && get_option('colorway_slideimage8') != '') { ?>
                    <div class="bg-img bg-img-5"><?php echo get_option('colorway_slideimage8'); ?></div>		  <?php } else { ?>
                    <div class="bg-img bg-img-5">
                        <?php if (get_option('colorway_slideimage8') != '') { ?>
                            <a href="<?php
                            if (get_option('colorway_slidelink8') != '') {
                                echo get_option('colorway_slidelink8');
                            }
                            ?>" >
                                <img  src="<?php echo get_option('colorway_slideimage8'); ?>" alt="<?php echo get_option('colorway_slideheading8'); ?>"/></a>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } if (get_option('colorway_slideimage9') != '') { ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                <?php if (get_option('colorway_slideheading9') != '') { ?>	
                    <div class="sl-slide-inner">
                        <div class="salesdetails">
                            <?php if (get_option('colorway_slideheading9') != '') { ?>
                                <a href="<?php
                                if (get_option('colorway_slidelink9') != '') {
                                    echo get_option('colorway_slidelink9');
                                } else {
                                    echo "#";
                                }
                                ?>"><h1><?php echo get_option('colorway_slideheading9'); ?></h1></a>
                               <?php } ?>
                               <?php if (get_option('colorway_slidedescription9') != '') { ?>
                                <p><?php echo get_option('colorway_slidedescription9'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring9 = get_option('colorway_slideimage9');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring9)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
                <?php if ($check_img_ofset == 0 && get_option('colorway_slideimage9') != '') { ?>
                    <div class="bg-img bg-img-5"><?php echo get_option('colorway_slideimage9'); ?></div>		 <?php } else { ?>
                    <div class="bg-img bg-img-5">
                        <?php if (get_option('colorway_slideimage9') != '') { ?>
                            <a href="<?php
                            if (get_option('colorway_slidelink9') != '') {
                                echo get_option('colorway_slidelink9');
                            }
                            ?>" >
                                <img  src="<?php echo get_option('colorway_slideimage9'); ?>" alt="<?php echo get_option('colorway_slideheading9'); ?>"/></a>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } if (get_option('colorway_slideimage10') != '') { ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                <?php if (get_option('colorway_slideheading10') != '') { ?>	
                    <div class="sl-slide-inner">
                        <div class="salesdetails">
                            <?php if (get_option('colorway_slideheading10') != '') { ?>
                                <a href="<?php
                                if (get_option('colorway_slidelink10') != '') {
                                    echo get_option('colorway_slidelink10');
                                } else {
                                    echo "#";
                                }
                                ?>"><h1><?php echo get_option('colorway_slideheading10'); ?></h1></a>
                               <?php } ?>
                               <?php if (get_option('colorway_slidedescription10') != '') { ?>
                                <p><?php echo get_option('colorway_slidedescription10'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring10 = get_option('colorway_slideimage10');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring10)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
                <?php if ($check_img_ofset == 0 && get_option('colorway_slideimage10') != '') { ?>
                    <div class="bg-img bg-img-5"><?php echo get_option('colorway_slideimage10'); ?></div>		  <?php } else { ?>
                    <div class="bg-img bg-img-5">
                        <?php if (get_option('colorway_slideimage10') != '') { ?>
                            <a href="<?php
                            if (get_option('colorway_slidelink10') != '') {
                                echo get_option('colorway_slidelink10');
                            }
                            ?>" >
                                <img  src="<?php echo get_option('colorway_slideimage10'); ?>" alt="<?php echo get_option('colorway_slideheading10'); ?>"/></a>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } if (get_option('colorway_slideimage11') != '') { ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                <?php if (get_option('colorway_slideheading11') != '') { ?>	
                    <div class="sl-slide-inner">
                        <div class="salesdetails">
                            <?php if (get_option('colorway_slideheading11') != '') { ?>
                                <a href="<?php
                                if (get_option('colorway_slidelink11') != '') {
                                    echo get_option('colorway_slidelink11');
                                } else {
                                    echo "#";
                                }
                                ?>"><h1><?php echo get_option('colorway_slideheading11'); ?></h1></a>
                               <?php } ?>
                               <?php if (get_option('colorway_slidedescription11') != '') { ?>
                                <p><?php echo get_option('colorway_slidedescription11'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring11 = get_option('colorway_slideimage11');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring11)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
                <?php if ($check_img_ofset == 0 && get_option('colorway_slideimage11') != '') { ?>
                    <div class="bg-img bg-img-5"><?php echo get_option('colorway_slideimage11'); ?></div>		 <?php } else { ?>
                    <div class="bg-img bg-img-5">
                        <?php if (get_option('colorway_slideimage11') != '') { ?>
                            <a href="<?php
                            if (get_option('colorway_slidelink11') != '') {
                                echo get_option('colorway_slidelink11');
                            }
                            ?>" >
                                <img  src="<?php echo get_option('colorway_slideimage11'); ?>" alt="<?php echo get_option('colorway_slideheading11'); ?>"/></a>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } if (get_option('colorway_slideimage12') != '') { ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                <?php if (get_option('colorway_slideheading12') != '') { ?>	
                    <div class="sl-slide-inner">
                        <div class="salesdetails">
                            <?php if (get_option('colorway_slideheading12') != '') { ?>
                                <a href="<?php
                                if (get_option('colorway_slidelink12') != '') {
                                    echo get_option('colorway_slidelink12');
                                } else {
                                    echo "#";
                                }
                                ?>"><h1><?php echo get_option('colorway_slideheading12'); ?></h1></a>
                               <?php } ?>
                               <?php if (get_option('colorway_slidedescription12') != '') { ?>
                                <p><?php echo get_option('colorway_slidedescription12'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring12 = get_option('colorway_slideimage12');
                $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring12)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
                <?php if ($check_img_ofset == 0 && get_option('colorway_slideimage12') != '') { ?>
                    <div class="bg-img bg-img-5"><?php echo get_option('colorway_slideimage12'); ?></div>		  <?php } else { ?>
                    <div class="bg-img bg-img-5">
                        <?php if (get_option('colorway_slideimage12') != '') { ?>
                            <a href="<?php
                            if (get_option('colorway_slidelink12') != '') {
                                echo get_option('colorway_slidelink12');
                            }
                            ?>" >
                                <img  src="<?php echo get_option('colorway_slideimage12'); ?>" alt="<?php echo get_option('colorway_slideheading12'); ?>"/></a>
                        <?php } else { ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>        
    </div><!-- /sl-slider -->
    <?php if ((get_option('colorway_slideimage2') != '') || (get_option('colorway_slideimage3') != '') || (get_option('colorway_slideimage4') != '') || (get_option('colorway_slideimage4') != '')) { ?>
    <nav id="nav-arrows" class="nav-arrows">
        <span class="nav-arrow-prev">Previous</span>
        <span class="nav-arrow-next">Next</span>
    </nav>  
     <nav id="nav-dots" class="nav-dots">
        <?php if (get_option('colorway_slideimage1') != '') { ?>
            <span class="nav-dot-current"></span>
        <?php } if (get_option('colorway_slideimage2') != '') { ?>
            <span></span>
        <?php } if (get_option('colorway_slideimage3') != '') { ?>
            <span></span>
        <?php } if (get_option('colorway_slideimage4') != '') { ?>
            <span></span>
        <?php } if (get_option('colorway_slideimage5') != '') { ?>
            <span></span>
        <?php } if (get_option('colorway_slideimage6') != '') { ?>
            <span></span>
        <?php } if (get_option('colorway_slideimage7') != '') { ?>
            <span></span>
        <?php } if (get_option('colorway_slideimage8') != '') { ?>
            <span></span>
        <?php } if (get_option('colorway_slideimage9') != '') { ?>
            <span></span>
        <?php } if (get_option('colorway_slideimage10') != '') { ?>
            <span></span>
        <?php } if (get_option('colorway_slideimage11') != '') { ?>
            <span></span>
        <?php } if (get_option('colorway_slideimage12') != '') { ?>
            <span></span>
        <?php } ?>
    </nav>
    <?php } ?>
</div>