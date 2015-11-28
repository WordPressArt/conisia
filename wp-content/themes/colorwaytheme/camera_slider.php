 	<div class="fluid_container">
	<input type="hidden" id="txt_slidespeed" value="<?php
            if (get_option('colorway_slide_speed') != '') {
                echo stripslashes(get_option('colorway_slide_speed'));
            } else {
                echo '3000';
            }
            ?>"/>
        <div class="camera_wrap camera_azure_skin slide" id="camera_wrap_1">
		<?php if (get_option('colorway_slideimage1') != '') { ?> 
		<div data-src="<?php echo get_option('colorway_slideimage1'); ?>">
		<?php if (get_option('colorway_slideheading1') != '') { ?>
            <div class="slide-content entry fl fadeFromLeft">
		 <h2 class="title"><a href="<?php echo get_option('colorway_slidelink1'); ?>" target="_blank"><?php echo stripslashes(get_option('colorway_slideheading1')); ?></a></h2>
		 <p><?php echo stripslashes(get_option('colorway_slidedescription1')); ?></p>
		</div>
		<?php } else { ?>
		<div class="slide-content entry fl fadeFromLeft">
		<h2 class="title"><a href="#"><?php _e('Beauty at its best', 'colorway'); ?></a></h2>
		 <p><?php _e('What happens when beauty and simplicity connects. We tried to give you a slight hint.', 'colorway'); ?></p>
		 </div>
		<?php } ?>
		 </div>
		<?php } else { ?>
			<div data-src="<?php echo get_template_directory_uri(); ?>/images/colorway-img.jpg">
			<div class="slide-content entry fl fadeFromLeft">
                <h2 class="title"><a href="#"><?php _e('Beauty at its best', 'colorway'); ?></a></h2>
                 <p><?php _e('What happens when beauty and simplicity connects. We tried to give you a slight hint.', 'colorway'); ?></p>
				 </div>
            </div>
		<?php } if (get_option('colorway_slideimage2') != '') { ?>
            <div data-src="<?php echo get_option('colorway_slideimage2'); ?>">
			<?php if (get_option('colorway_slideheading2') != '') { ?>
                <div class="slide-content entry fl fadeFromLeft">
                 <h2 class="title"><a href="<?php echo get_option('colorway_slidelink2'); ?>" target="_blank"><?php echo stripslashes(get_option('colorway_slideheading2')); ?></a></h2>
                 <p><?php echo stripslashes(get_option('colorway_slidedescription2')); ?></p>
                </div>
				<?php } ?>
            </div>
		<?php } if (get_option('colorway_slideimage3') != '') { ?>
            <div  data-src="<?php echo get_option('colorway_slideimage3'); ?>">
			<?php if (get_option('colorway_slideheading3') != '') { ?>
                <div class="slide-content entry fl fadeFromLeft">
                 <h2 class="title"><a href="<?php echo get_option('colorway_slidelink3'); ?>" target="_blank"><?php echo stripslashes(get_option('colorway_slideheading3')); ?></a></h2>
                 <p><?php echo stripslashes(get_option('colorway_slidedescription3')); ?></p>
                </div>
				<?php } ?>
            </div>
		<?php } if (get_option('colorway_slideimage4') != '') { ?>
            <div data-src="<?php echo get_option('colorway_slideimage4'); ?>">
			<?php if (get_option('colorway_slideheading4') != '') { ?>
                <div class="slide-content entry fl fadeFromLeft">
                 <h2 class="title"><a href="<?php echo get_option('colorway_slidelink4'); ?>" target="_blank"><?php echo stripslashes(get_option('colorway_slideheading4')); ?></a></h2>
                 <p><?php echo stripslashes(get_option('colorway_slidedescription4')); ?></p>
                </div>
				<?php } ?>
            </div>
		<?php } if (get_option('colorway_slideimage5') != '') { ?>
            <div data-src="<?php echo get_option('colorway_slideimage5'); ?>">
			<?php if (get_option('colorway_slideheading5') != '') { ?>
                <div class="slide-content entry fl fadeFromLeft">
                 <h2 class="title"><a href="<?php echo get_option('colorway_slidelink5'); ?>" target="_blank"><?php echo stripslashes(get_option('colorway_slideheading5')); ?></a></h2>
                 <p><?php echo stripslashes(get_option('colorway_slidedescription5')); ?></p>
                </div>
				<?php } ?>
            </div>
		<?php } if (get_option('colorway_slideimage6') != '') { ?>
            <div data-src="<?php echo get_option('colorway_slideimage6'); ?>">
			<?php if (get_option('colorway_slideheading6') != '') { ?>
                <div class="slide-content entry fl fadeFromLeft">
                 <h2 class="title"><a href="<?php echo get_option('colorway_slidelink6'); ?>" target="_blank"><?php echo stripslashes(get_option('colorway_slideheading6')); ?></a></h2>
                 <p><?php echo stripslashes(get_option('colorway_slidedescription6')); ?></p>
                </div>
				<?php } ?>
            </div>
		<?php } ?>
        </div><!-- #camera_wrap_1 -->
</div><!-- .fluid_container -->
