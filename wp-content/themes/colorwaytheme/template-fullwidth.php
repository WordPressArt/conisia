<?php
/*
  Template Name: Fullwidth Template
 */
get_header();
?>
<!--Start Content Grid-->
<div class="grid_24 content">
    <div class="content-wrapper fullwidth">
        <div class="content-info">
            <?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?>
        </div>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <h2>
                    <?php the_title(); ?>
                </h2>
                <?php
                the_content();
            endwhile;
        endif;
        ?>
    </div>
</div>
<div class="clear"></div>
<!--End Content Grid-->
</div>
<!--End Container Div-->
<?php get_footer(); ?>