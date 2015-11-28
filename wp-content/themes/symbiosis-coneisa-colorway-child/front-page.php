<?php
/*
  /**
 * The main front page file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * @package WordPress
 */
get_header();
?>
<!--Start Slider-->
<?php
$slider_option = get_option('inkthemes_homepage_slider_feature_option');
$slider_option_option_off = "off";
if ($slider_option_option_off !== $slider_option) {
    get_template_part('slit_slider');
}
?>
<div class="clear"></div>
<!--End Slider-->
<!--Start Content Grid-->
<div class="grid_24 content">
    <div class="content-wrapper">
        <!--Start Feature-->
        <?php
        $featurebox_option = get_option('inkthemes_homepage_feature_box_option');
        $featurebox_option_option_off = "off";
        if ($featurebox_option_option_off !== $featurebox_option) {  ?>
        <div class="clear"></div>   
            <?php get_template_part('home_feature_area');
        } ?>
        <!--End Feature-->           
        <!--Start Blog Section-->
        <?php
        $blog_option = get_option('inkthemes_homepage_blog_feature_option');
        $blog_option_off = "off";
        if ($blog_option_off !== $blog_option) {
        get_template_part('home_blog');
        } ?>
        <!--End Blog Section-->
        <div class="clear"></div>   
        <!--Start Testimonial Section-->
        <?php $testimonial_option = get_option('inkthemes_homepage_testimonial_option');
        $testimonial_option_off = "off";
        if ($testimonial_option_off !== $testimonial_option) {
        get_template_part('home_testimonial');
        } ?>
        <!--End Testimonial Section-->
    </div>
</div>
<div class="clear"></div>
<!--End Content Grid-->

<!-- @added -->
<div class="mapArea" style="">
    <p class="regionTitle"><?php _e('Region', 'colorway-coneisa-child'); ?></p>
    <img src="http://redesign.conei-sa.com/wp-content/uploads/2015/11/Mapa2b.png">
</div>
<!-- end @added -->

</div>
<!--End Container Div-->
<?php get_footer(); ?>