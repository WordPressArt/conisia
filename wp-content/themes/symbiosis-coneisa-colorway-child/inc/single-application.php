<div class="grid_24 content">
    <div class="content-wrapper">
        <div class="content-info content-info2">
        </div>
        <?php the_post(); ?>
      
       
   			   <div class="row">
              


  

<h2 class="milke"><?php the_title();  ?></h2>

<ul class="bxslider">

<?php if( have_rows('gallery_swaop') ): ?>



  <?php while( have_rows('gallery_swaop') ): the_row(); 

    // vars
    $image = get_sub_field('image_gallery');
    $content = get_sub_field('desctription_repeaterbiglol');
$subtitles = get_sub_field('subtitle_productos');

    ?>

<li> <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" width="539" height="267" class="portate" />
  <h2 class="topup hidden-xs"><?php echo $subtitles;  ?></h2>
<div class="parag hidden-xs"><?php  echo substr($content, 0, 300); ?></div>
</li>


  <?php endwhile; ?>



<?php endif; ?>
  </ul>
<div class="bx-wrapper one">
<div id="bx-pager" >

<?php if( have_rows('gallery_swaop') ): ?>
  <?php while( have_rows('gallery_swaop') ): the_row(); 
?>
 <?php   $imagees = get_sub_field('image_gallery');
 $numee = get_sub_field('dd_number'); ?>
  <li data-slideIndex="<?php echo $numee; ?>"><a href=""><img src="<?php echo $imagees['url']; ?>" alt="<?php echo $imagees['alt'] ?>" width="61" height="61" /></a></li>
   <?php endwhile; ?>



<?php endif; ?>
</div>
</div>
                  
                  
                </div>
          
     </br>
  </br>
            
    </div>
</div>
<div class="clear"></div>
</div>
