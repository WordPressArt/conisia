
        <!--End footer container-->
        <!--Start footer navigation-->
        <div class="container_24 footer-navi">
            <div class="grid_24">
                <div class="grid_10 alpha wsa">
                    <div class="navigation">
                        <?php  get_search_form();?>
                    </div>
                </div>
                <div class="grid_14 omega">
                    <div class="right-navi">
                            <div class="footer_des footer-menu">
                                <ul>
                                    <li><a href="<?php _e('/sitemap', 'colorway-coneisa-child'); ?>"><?php _e('Site map', 'colorway-coneisa-child'); ?></a></li>
                                    <li><a href="<?php _e('/legal', 'colorway-coneisa-child'); ?>"><?php _e('Legal', 'colorway-coneisa-child'); ?></a></li>
                                    <li><a href="<?php _e('/contact-us', 'colorway-coneisa-child'); ?>"><?php _e('Contact us', 'colorway-coneisa-child'); ?></a></li>                        
                                </ul>
                            </div>
                            <ul class="footer_des">
                                <li>
                                    <a class="white" href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?> - <?php bloginfo('description'); ?></a>
                                </li>
                            </ul> 
                    </div> 
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!--End Footer navigation-->
        <div class="footer_space"></div>
        <?php wp_footer(); ?>
    </body>
</html>