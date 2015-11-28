<?php 
/* Template Name: Productosss */

get_header(); ?> 
<!--Start Content Grid-->
<div class="grid_24 content">
<div class="grid_16 alpha">
<div class="content-wrap">
<div class="content-info content-info2">

</div>
<div class="sl">
<?php if (have_posts()) while (have_posts()) : the_post(); ?>





<div class="col-md-12">
<h4 class="rs"><?php $title_var   = get_field('product_title'); if(!empty($title_var)); echo $title_var; ?></h4>
<h4 class="headtitle">  
<?php dynamic_sidebar('nav_product_var'); ?>
</h4>





<div class="thumbnail">
<?php the_post_thumbnail('product_custom'); ?>
<div class="caption">
<?php $why = get_field('why_'); if(!empty($why)) {  ?>
<h4 class="topvel"><?php echo $why; ?></h4>
<?php }  ?>
<?php $desc = get_field('description'); if(!empty($desc)){  ?>
<p><?php echo $desc; ?></p>
<?php }  ?>
</div>
</div> 

<div id="whom">                   
<div class="thumbnail">

<div class="caption">
<?php $whom = get_field('for_whom__'); if(!empty($whom)) { ?>
<h4  class="topvel"><?php echo $whom;?></h4>
<?php } ?>
<?php $descpp = get_field('whom_desctiption'); if(!empty($descpp)) { ?>
<p><?php echo $descpp; ?></p>
<?php  } ?>
</div>
</div> 
</div>


<div class="row">  
<div id="how">   
<?php $how = get_field('how_title_'); if(!empty($how)){  ?>
<h4 class="red"><?php echo $how; ?></h4>
<?php } ?>


<?php if( have_rows('images_repeator') ): ?>



<?php while( have_rows('images_repeator') ): the_row();  ?>
<div class="col-xs-6 col-md-3">
<?php     // vars
$image = get_sub_field('images_one');

$link = get_sub_field('image_link ');

?>




<a href="<?php echo $link; ?>" class="thumbnail">


<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />  

</a>


</div>


<?php endwhile; ?>




<?php endif; ?>






</div>
</div>



<div id="advantage">  
<div class="thumbnail">

<div class="caption">
<?php $advantage = get_field('title_advantages'); if(!empty($advantage)); ?>
<h4 class="topvel"><?php echo $advantage; ?></h4>

<?php $contents = get_field('advantage_description'); if(!empty($contents)); echo $contents; ?>
</div>
<div id="link">
<div class="caption">
<h4 class="topvel">Links</h4>
<ul>
<?php

// check if the repeater field has rows of data
if( have_rows('link_descriptionssss') ):

// loop through the rows of data
while ( have_rows('link_descriptionssss') ) : the_row(); ?>

<li><a href="<?php the_sub_field('link_here'); ?>"><?php the_sub_field('link_title'); ?></a></li>


<?php    endwhile;

else :

// no rows found

endif;

?>

</ul>
</div>
</div>
</div> 
</div>
</div>



<div class="clear"></div>
<?php wp_link_pages(array('before' => '<div class="page-link"><span>' . 'Pages:' . '</span>', 'after' => '</div>')); ?>
<?php edit_post_link('Edit', '', ''); ?>
<div class="clear"></div>
<!--Start Comment Section-->
<div class="comment_section">
<!--Start Comment list-->
<?php comments_template('', true); ?>
<!--End Comment Form-->
</div>
<!--End comment Section-->
<?php endwhile; ?>
</div>
<div class="folio-page-info">
<?php inkthemes_pagination(); ?>
</div>
</div>
</div>
<div class="grid_8 omega">
<div class="sidebar">
<h2 class="ssss"><?php _e('Applications', 'colorway-coneisa-child'); ?></h2>
<?php $jkki = array('post_type' =>'application', 'posts_per_page' => 4, );
$wwwwww = new WP_Query($jkki);
if($wwwwww->have_posts()) :  while($wwwwww->have_posts() ) : $wwwwww->the_post(); ?>

<div class="well">
<div class="thumbnail">
<?php the_post_thumbnail('mycustomsize'); ?>
<div class="caption">
<a class="left-align" href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
</div>
</div> 
</div>
<?php endwhile;  endif; wp_reset_query(); ?>


</div>
</div>

</div>
<div class="clear"></div>
<!--End Content Grid-->
</div>
<?php get_footer(); 