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
if ( ! $settings->umbb_slider_images ) {
    return;
}

$id_int = $id;
$render_attribute_string =  ' id_int="'.$id_int.'" ';
// echo "<pre>";print_r($settings->umbb_slider_images);exit;
$ids = (array) $settings->umbb_slider_images;

if ( isset($settings->umbb_slider_images ) ) {
    $render_attribute_string .=  ' slider_images="'.implode( ',', $ids ).'" ';
}
if ( isset($settings->umbb_slider_width ) ) {
    $render_attribute_string .=  ' slider_width="'.$settings->umbb_slider_width.'" ';
}
if ( isset($settings->umbb_slider_height ) ) {
    $render_attribute_string .=  ' slider_height="'.$settings->umbb_slider_height.'" ';
}
if ( isset($settings->umbb_slider_transition ) ) {
    $render_attribute_string .=  ' transition="'.$settings->umbb_slider_transition.'" ';
}
if ( isset($settings->umbb_slider_type ) ) {
    $render_attribute_string .=  ' slider_type="'.$settings->umbb_slider_type.'" ';
}
if ( isset($settings->umbb_slider_navigation_arrows ) ) {
    $render_attribute_string .=  ' show_arrows="'.$settings->umbb_slider_navigation_arrows.'" ';
}
if ( isset($settings->umbb_slider_navigation_arrow_type ) ) {
    $render_attribute_string .=  ' arrow_type="'.$settings->umbb_slider_navigation_arrow_type.'" ';
}
if ( isset($settings->umbb_slider_autoplay ) ) {
    $render_attribute_string .=  ' auto_play="'.$settings->umbb_slider_autoplay.'" ';
}
if ( isset($settings->umbb_autoplay_interval ) ) {
    $render_attribute_string .=  ' autoplay_interval="'.$settings->umbb_autoplay_interval.'" ';
}
if ( isset($settings->umbb_autoplay_steps ) ) {
    $render_attribute_string .=  ' autoplay_steps="'.$settings->umbb_autoplay_steps.'" ';
}
if ( isset($settings->umbb_thumbnail_visibility ) ) {
    $render_attribute_string .=  ' thumbnail_visibility="'.$settings->umbb_thumbnail_visibility.'" ';
}
if ( isset($settings->umbb_thumbnail_gallery_design ) ) {
    $render_attribute_string .=  ' thumbnail_gallery_design="'.$settings->umbb_thumbnail_gallery_design.'" ';
}
if ( isset($settings->umbb_thumbnail_back_color ) ) {
    $render_attribute_string .=  ' thumbnail_back_color="'.$settings->umbb_thumbnail_back_color.'" ';
}


?>

<div class="umbb-image-slider">
    <?php
    echo do_shortcode( '[umbb_image_slider ' . $render_attribute_string . ']' );
    ?>
</div>
