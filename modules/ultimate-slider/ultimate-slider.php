<?php

class FLUltimateSliderModule extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Ultimate Slider', 'umbb'),
            'description'   => __('Image Sliders and Galleries.', 'umbb'),
            'category'		=> __('Ultimate Beaver Modules', 'umbb'),
            'dir'           => FL_UMBB_DIR . 'modules/ultimate-slider/',
            'url'           => FL_UMBB_URL . 'modules/ultimate-slider/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
// wp_register_style('umbb-front-style', FL_UMBB_URL . 'css/umbb-front.css');
        // wp_register_script('umbb-front', FL_UMBB_URL.'js/umbb-front.js', array('jquery'));
       
        // wp_register_script('umbb-jssor-slides-script', FL_UMBB_URL.'lib/jssor/jssor.slider.mini.js', array('jquery'));
        $this->add_js( 'jquery');
        $this->add_css( 'umbb-front-style', FL_UMBB_URL . 'css/umbb-front.css' );
        $this->add_js( 'umbb-front', $this->url . 'js/umbb-front.js', array(), '', true );
        $this->add_js( 'umbb-jssor-slides-script', $this->url . 'js/jssor/jssor.slider.mini.js', array() );
    }
}

FLBuilder::register_module('FLUltimateSliderModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'umbb'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Slider Settings', 'umbb'), // Section Title
                'fields'        => array( 
                    'umbb_slider_images'   => array(
                        'type'          => 'multiple-photos',
                        'label'         => __('Slider Images', 'umbb')
                    ),
                    'umbb_slider_type'   => array(
                        'type'          => 'select',
                        'label'         => __('Slider Type', 'umbb'),
                        'default'       => 'image_slider',
                        'options'       => array('image_slider' => __('Image Slider','umbb'),
                                        'image_gallery' => __('Image Gallery','umbb'))
                    ),
                    'umbb_slider_width'     => array(
                        'type'          => 'text',
                        'label'         => __('Slider Width', 'umbb'),
                        'default'       => '',
                        'description'   => 'px',
                    ),
                    'umbb_slider_height'     => array(
                        'type'          => 'text',
                        'label'         => __('Slider Height', 'umbb'),
                        'default'       => '',
                        'description'   => 'px',
                    ),
                    'umbb_slider_autoplay'   => array(
                        'type'          => 'select',
                        'label'         => __('Autoplay', 'umbb'),
                        'default'       => 'enabled',
                        'options'       => array('enabled' => __('Enabled','umbb'),'disabled' => __('Disabled','umbb'))
                    ),
                    'umbb_slider_transition'   => array(
                        'type'          => 'select',
                        'label'         => __('Autoplay Transition', 'umbb'),
                        'default'       => 'fade',
                        'options'       => umbb_transitions(),
                    ),
                    'umbb_slider_navigation_arrows'   => array(
                        'type'          => 'select',
                        'label'         => __('Navigation Arrows', 'umbb'),
                        'default'       => 'enabled',
                        'options'       => array('enabled' => __('Enabled','umbb'),'disabled' => __('Disabled','umbb'))
                    ),
                    'umbb_slider_navigation_arrow_type'   => array(
                        'type'          => 'select',
                        'label'         => __('Arrow Type', 'umbb'),
                        'default'       => 'a01',
                        'options'       => array('a01' => __('Design 1','umbb'),
                                            'a02' => __('Design 2','umbb'))
                    ),
                    
                )
            )
        )
    )
));