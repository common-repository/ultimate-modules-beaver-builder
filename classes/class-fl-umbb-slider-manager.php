<?php

class UMBB_Slider_Manager{

	public function __construct(){
		add_shortcode('umbb_image_slider', array($this, 'image_slider'));
	}

	public function image_slider($slider_settings){
        global $umbb,$umbb_slider_params;

        wp_enqueue_style('umbb-front-style');
        wp_enqueue_script('umbb-jssor-slides-script');
        wp_enqueue_script('umbb-front');

        $umbb_slider_params['slider_width'] = isset($slider_settings['slider_width']) ? (int) $slider_settings['slider_width'] : '600';
        $umbb_slider_params['slider_height'] = isset($slider_settings['slider_height']) ? (int) $slider_settings['slider_height'] : '300';
    
        $transition = isset($slider_settings['transition']) ? $slider_settings['transition'] : 'fade';
        $umbb_slider_params['transition_effect'] = umbb_transitions_list($transition);
        $umbb_slider_params['auto_play'] = ($slider_settings['auto_play'] == 'enabled') ? 'true' : 'false';

        $umbb_slider_params['show_arrows'] = isset($slider_settings['show_arrows']) ? $slider_settings['show_arrows'] : 'enabled';
        $umbb_slider_params['arrow_type']  = isset($slider_settings['arrow_type']) ? $slider_settings['arrow_type'] : 'a01';
        $umbb_slider_params['slider_type']  = isset($slider_settings['slider_type']) ? $slider_settings['slider_type'] : 'image_slider';

        $umbb_slider_params['number_of_slides']  = isset($slider_settings['number_of_slides']) ? $slider_settings['number_of_slides'] : '3';
        $umbb_slider_params['slide_width']  = isset($slider_settings['slide_width']) ? $slider_settings['slide_width'] : '200';
        $umbb_slider_params['autoplay_interval']  = isset($slider_settings['autoplay_interval']) ? $slider_settings['autoplay_interval'] : '1';
        $umbb_slider_params['autoplay_steps']  = isset($slider_settings['autoplay_steps']) ? $slider_settings['autoplay_steps'] : '4';
  
        $umbb_slider_params['thumbnail_visibility']  = isset($slider_settings['thumbnail_visibility']) ? $slider_settings['thumbnail_visibility'] : '2';
        $umbb_slider_params['thumbnail_gallery_design']  = isset($slider_settings['thumbnail_gallery_design']) ? $slider_settings['thumbnail_gallery_design'] : 'inside';
        $umbb_slider_params['thumbnail_back_color']  = isset($slider_settings['thumbnail_back_color']) ? $slider_settings['thumbnail_back_color'] : '';

        $umbb_slider_params['id_int'] = isset($slider_settings['id_int']) ? $slider_settings['id_int'] : '';

        $umbb_slider_params['slider_images'] = isset($slider_settings['slider_images']) ? explode(',',$slider_settings['slider_images']) : array();

        $upload_dir = wp_upload_dir();
        $umbb_slider_params['upload_dir_url'] = $upload_dir['baseurl']."/";
        $umbb_slider_params['upload_sub_dir_url'] = $upload_dir['baseurl'].$upload_dir['subdir']."/";

        // ADd template support for each slider type
        ob_start();

        $display = '';
        $umbb_slider_params['additional_options']  = $this->additional_options($umbb_slider_params);
        // print_r($slider_settings);
        switch ($umbb_slider_params['slider_type']) {
            case 'image_slider':
                $umbb->template_loader->get_template_part('image-slider','default');
                $umbb->template_loader->get_template_part('slider-init','default');
                $display = ob_get_clean();
                break;
            
            case 'image_gallery':
                $umbb->template_loader->get_template_part('image-gallery','default');
                $umbb->template_loader->get_template_part('slider-init','default');
                $display .= ob_get_clean();
                break;

            
                break;

            default:
                # code...
                break;
        }

        /* Logo/ Thumbnail Slider */
        $html = $display;
        return $html;
    }

    public function additional_options($umbb_slider_params){
        extract($umbb_slider_params);


        $additional_options = '';
        switch ($slider_type) {
            case 'image_slider':
                $additional_options = '';
                break;            
            case 'image_gallery':
                $additional_options = '$ThumbnailNavigatorOptions: {
                                            $Class: $JssorThumbnailNavigator$,
                                            $Cols: 10,
                                            $SpacingX: 8,
                                            $SpacingY: 8,
                                            $Align: 360,
                                            $ChanceToShow:'.$thumbnail_visibility.',
                                            //$Rows : 2
                                          }';
                break;

            default:
                # code...
                break;
        }

        $additional_options  = apply_filters('umbb_slider_additional_options',$additional_options, array('slider_type' => $slider_type));

        return $additional_options;
    }
}