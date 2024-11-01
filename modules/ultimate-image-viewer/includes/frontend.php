<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example: 
 */
if ( ! $settings->umbb_viewer_images ) {
    return;
}

$id_int = $id;
$render_attribute_string =  ' id_int="'.$id_int.'" ';
$ids = (array) $settings->umbb_viewer_images;


$mode = ($settings->umbb_image_viewer_mode ==  'modal' ) ? 'false' : 'true';
$navbar = ($settings->umbb_image_viewer_navigation  == 'enabled' ) ? 'true' : 'false';
$title = ($settings->umbb_image_viewer_title ==  'enabled' ) ? 'true' : 'false';
$toolbar = ($settings->umbb_image_viewer_toolbar ==  'enabled' ) ? 'true' : 'false';
$tooltip = ($settings->umbb_image_viewer_tooltip ==  'enabled' ) ? 'true' : 'false';
$movable = ($settings->umbb_image_viewer_moving ==  'enabled' ) ? 'true' : 'false';
$zooming = ($settings->umbb_image_viewer_zooming ==  'enabled' ) ? 'true' : 'false';
$rotating = ($settings->umbb_image_viewer_rotating ==  'enabled' ) ? 'true' : 'false';
$scaling = ($settings->umbb_image_viewer_scaling ==  'enabled' ) ? 'true' : 'false';
$transition = ($settings->umbb_image_viewer_transition ==  'enabled' ) ? 'true' : 'false';
$fullscreen = ($settings->umbb_image_viewer_fullscreen ==  'enabled' ) ? 'true' : 'false';


$display = "<div id='umbb-front-viewer-".$id_int."' class='umbb-front-viewer' >";

$upload_dir = wp_upload_dir();
$upload_dir_url = $upload_dir['baseurl']."/";
$upload_sub_dir_url = $upload_dir['baseurl'].$upload_dir['subdir']."/";

foreach($ids as $attach_id){
    if($attach_id != ''){
        
        $image_icons = "<img class='umbb-viewer-edit' src='" . FL_UMBB_URL ."images/viewer-edit.png' />
                            <img class='umbb-viewer-delete' src='" . FL_UMBB_URL . "images/viewer-delete.png' />";

        $attachment = wp_get_attachment_metadata( $attach_id );

        $thumbnail = wp_get_attachment_thumb_url( $attach_id );
         $display .= "<div class='umbb-front-viewer-single'><img data-original='". $upload_dir_url.$attachment['file'] ."' src='" . $thumbnail . "' ></div>";
    }
}

$display .= "<div class='umbb-clear'></div></div>";

$display .= "<script type='text/javascript'>
                jQuery(document).ready( function( $ ) {
                    var options_".$id_int." = {
                        url: 'data-original',
                        inline : ".$mode.",
                        navbar : ".$navbar.",
                        title : ".$title.",
                        toolbar : ".$toolbar.",
                        tooltip : ".$tooltip.",
                        movable : ".$movable.",
                        zoomable : ".$zooming.",
                        rotatable : ".$rotating.",
                        scalable : ".$scaling.",
                        transition:".$transition.",
                        fullscreen:".$fullscreen.",
                        
                      };

                    $('#umbb-front-viewer-".$id_int."').viewer(options_".$id_int.");
                });
            </script>";
echo $display;

?>


