<?php
	global $umbb,$umbb_slider_params;
	extract($umbb_slider_params);
?>

<script type='text/javascript'>
    jQuery(document).ready(function   ($) {

        var jssor_SlideshowTransitions_<?php echo $id_int; ?> = [<?php echo $transition_effect; ?>];

   
        var jssor_options_<?php echo $id_int; ?> = {
          $AutoPlay: <?php echo $auto_play; ?>,
          
          $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: jssor_SlideshowTransitions_<?php echo $id_int; ?>,
            $TransitionsOrder: 1
          },
          $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
            $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
            $AutoCenter: 0,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
            $Steps: 1 
          },
          
          <?php echo $additional_options; ?>
        };

        if($('.umbb-slider-active').length >= 1){
            var jssor_slider_<?php echo $id_int; ?> = new $JssorSlider$('<?php echo "umbb-slider-container-".$id_int; ?>', jssor_options_<?php echo $id_int; ?>);
            umbb_responsive_ScaleSlider_<?php echo $id_int; ?>();

            //Scale slider while window load/resize/orientationchange.
            $(window).bind("load", umbb_responsive_ScaleSlider_<?php echo $id_int; ?>);
            $(window).bind("resize", umbb_responsive_ScaleSlider_<?php echo $id_int; ?>);
            $(window).bind("orientationchange", umbb_responsive_ScaleSlider_<?php echo $id_int; ?>);
            
        }
        
        function umbb_responsive_ScaleSlider_<?php echo $id_int; ?>() {
            
            var parentWidth = $('#<?php echo "umbb-slider-container-".$id_int; ?>').parent().width();
            if (parentWidth) {
                jssor_slider_<?php echo $id_int; ?>.$ScaleWidth(parentWidth);
            }
            else
                window.setTimeout(umbb_responsive_ScaleSlider_<?php echo $id_int; ?>, 30);
        }
        //Scale slider after document ready
                                        
        
    });
</script>
