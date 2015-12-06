$(document).ready(function(){
 var $j = jQuery.noConflict();

var realSlider= $j(".bxslider").bxSlider({
     // auto: true,
      pager:false,
     // nextText:'',
     // prevText:'',
      infiniteLoop:true,
      hideControlOnEnd:true,
      onSlideBefore:function($slideElement, oldIndex, newIndex){
        changeRealThumb(realThumbSlider,newIndex);
        
      }
      
    });
    
    var realThumbSlider=$j("#bx-pager").bxSlider({
      minSlides: 4,
      maxSlides: 4,
      slideWidth: 62, 
      moveSlides: 1,
      pager:false,
      infiniteLoop:true,
      hideControlOnEnd:true,
      nextText:'<span></span>',
      prevText:'<span></span>',
      onSlideBefore:function($slideElement, oldIndex, newIndex){
        /*$j("#sliderThumbReal ul .active").removeClass("active");
        $slideElement.addClass("active"); */

      }
    });
    
    linkRealSliders(realSlider,realThumbSlider);
    
    if($j("#bx-pager").length<5){
      $j("#bx-pager .bx-next").hide();
    }

// sincronizza sliders realizzazioni
function linkRealSliders(bigS,thumbS){
  
  $j("#bx-pager").on("click","a",function(event){
    event.preventDefault();
    var newIndex=$j(this).parent().attr("data-slideIndex");
        bigS.goToSlide(newIndex);
  });
}

//slider!=$thumbSlider. slider is the realslider
function changeRealThumb(slider,newIndex){
  
  var $thumbS=$j("#bx-pager");
  $thumbS.find('.active').removeClass("active");
  $thumbS.find('li[data-slideIndex="'+newIndex+'"]').addClass("active");
  
  if(slider.getSlideCount()-newIndex>=4)slider.goToSlide(newIndex);
  else slider.goToSlide(slider.getSlideCount()-4);

}

});

