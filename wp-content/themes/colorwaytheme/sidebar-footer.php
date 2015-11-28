<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 */
/* The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
?>
<div class="grid_6 alpha animated">
    <div class="common left">
        <?php
        if (is_active_sidebar('first-footer-widget-area')) :
            dynamic_sidebar('first-footer-widget-area');
			else : ?> 
			<h4>About Theme</h4>
			<p>We make simple and easy to WordPress themes that will make your website easily. You just need to install the theme on your website will be ready within a minute.</p>
		<?php endif; ?>
    </div>
</div>
<div class="grid_6 animated">
    <div class="common second">
        <?php
        if (is_active_sidebar('second-footer-widget-area')) :
            dynamic_sidebar('second-footer-widget-area');
			else : ?> 
			<h4>Colorway</h4>
			<ul>
			<li><a href="#">WordPress themes</a></li>
			<li><a href="#">Your Website</a></li>
			<li><a href="#">Colorway Theme</a></li>
			</ul>
			<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
			<div>
				<input type="text" onfocus="if (this.value == 'Search') {
                    this.value = '';
                }" onblur="if (this.value == '') {
                            this.value = 'Search';
                        }"  value="Search" name="s" id="s" />
				<input type="submit" id="searchsubmit" value="" />
				</div>
				</form>
		<?php endif; 
        ?>
    </div>
</div>
<div class="grid_6 animated">
    <div class="common third">
        <?php
        if (is_active_sidebar('third-footer-widget-area')) :
            dynamic_sidebar('third-footer-widget-area');
		 else : ?> 
			<h4>Our Gallery</h4>
			<ul class="footer_gallery">
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/g-1.png" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/g-2.png" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/g-3.png" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/g-4.png" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/g-5.png" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/g-6.png" /></li>
			</ul>			
            <?php endif; ?>
    </div>
</div>
<div class="grid_6 omega animated">
    <div class="common right">
        <?php
        if (is_active_sidebar('fourth-footer-widget-area')) :
            dynamic_sidebar('fourth-footer-widget-area');
		else : ?> 
			<h4>Contact Us</h4>
			<?php get_template_part('home-contact'); 
        endif;
        ?>
    </div>
</div>