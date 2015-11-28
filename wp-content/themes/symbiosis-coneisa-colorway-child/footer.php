
        <!--End footer container-->
        <!--Start footer navigation-->
        <div class="container_24 footer-navi">
            <div class="footerContent">
                <div class="footerNavigation">
                    <ul class="footerMenu">
                        <li><a href="<?php _e('/sitemap', 'colorway-coneisa-child'); ?>"><?php _e('Site map', 'colorway-coneisa-child'); ?></a></li>
                        <li><a href="<?php _e('/legal', 'colorway-coneisa-child'); ?>"><?php _e('Legal', 'colorway-coneisa-child'); ?></a></li>
                        <li><a href="<?php _e('/contact-us', 'colorway-coneisa-child'); ?>"><?php _e('Contact us', 'colorway-coneisa-child'); ?></a></li>                        
                    </ul>
                </div>
                <div class="footerBottom">
                    <div class="footerSearch">
                        <?php  get_search_form();?>
                    </div>
                    <div class="footerCopyright">
                        <a class="white" href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?> - <?php bloginfo('description'); ?></a>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div> <!--End Footer navigation-->
        <div class="footer_space"></div>
        <?php wp_footer(); ?>
    </body>
</html>