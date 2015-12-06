<?php
/*
Template Name: empres
*/


get_header();  ?>


<!--Start Content Grid-->
<div class="grid_24 content">
    <div class="content-wrapper">
        <div class="content-info content-info2">
        </div>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <h2>
                    <?php the_title(); ?>
                </h2>
         
                <?php // the_post_thumbnail( 'empresssa', array( 'class' => 'sayed' ) ); ?>
      <?php  echo do_shortcode('[metaslider id=293]'); ?>
                
               <div class="justiy"> <?php the_content(); ?></div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<div class="clear"></div>
<!--End Content Grid-->
</div>
<!--End Container Div-->
<?php get_footer();
