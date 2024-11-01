<?php

class FLUltimateImageViewerModule extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Ultimate Image Viewer', 'umbb'),
            'description'   => __('Image Viewer.', 'umbb'),
            'category'		=> __('Ultimate Beaver Modules', 'umbb'),
            'dir'           => FL_UMBB_DIR . 'modules/ultimate-image-viewer/',
            'url'           => FL_UMBB_URL . 'modules/ultimate-image-viewer/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));

        $this->add_js( 'jquery');
        $this->add_css( 'umbb-viewer-front', FL_UMBB_URL . 'css/umbb-viewer-front.css' );
        $this->add_css( 'umbb-image-viewer-style', $this->url . 'js/viewer-master/viewer.css' );
        $this->add_js( 'umbb-image-viewer-script', $this->url . 'js/viewer-master/viewer.js', array() );
    }
}

FLBuilder::register_module('FLUltimateImageViewerModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'umbb'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Image Viewer Settings', 'umbb'), // Section Title
                'fields'        => array( 
                    'umbb_viewer_images'   => array(
                        'type'          => 'multiple-photos',
                        'label'         => __('Slider Images', 'umbb')
                    ),
                    'umbb_viewer_mode'   => array(
                        'type'          => 'select',
                        'label'         => __('Mode', 'umbb'),
                        'default'       => 'modal',
                        'options'       => array('modal' => __('Modal','umbb'),'inline' => __('Inline','umbb'))
                    ),
                    
                    'umbb_viewer_title'   => array(
                        'type'          => 'select',
                        'label'         => __('Title', 'umbb'),
                        'default'       => 'enabled',
                        'options'       => array('enabled' => __('Enabled','umbb'),'disabled' => __('Disabled','umbb'))
                    ),
                    'umbb_image_viewer_navigation'   => array(
                        'type'          => 'select',
                        'label'         => __('Autoplay Transition', 'umbb'),
                        'default'       => 'enabled',
                        'options'       => array('enabled' => __('Enabled','umbb'),'disabled' => __('Disabled','umbb')),
                    ),
                    'umbb_image_viewer_toolbar'   => array(
                        'type'          => 'select',
                        'label'         => __('Toolbar', 'umbb'),
                        'default'       => 'enabled',
                        'options'       => array('enabled' => __('Enabled','umbb'),'disabled' => __('Disabled','umbb'))
                    ),
                    'umbb_image_viewer_tooltip'   => array(
                        'type'          => 'select',
                        'label'         => __('Tooltip', 'umbb'),
                        'default'       => 'enabled',
                        'options'       => array('enabled' => __('Enabled','umbb'),'disabled' => __('Disabled','umbb'))
                    ),
                    'umbb_image_viewer_moving'   => array(
                        'type'          => 'select',
                        'label'         => __('Moving', 'umbb'),
                        'default'       => 'enabled',
                        'options'       => array('enabled' => __('Enabled','umbb'),'disabled' => __('Disabled','umbb'))
                    ),
                    'umbb_image_viewer_zooming'   => array(
                        'type'          => 'select',
                        'label'         => __('Zooming', 'umbb'),
                        'default'       => 'enabled',
                        'options'       => array('enabled' => __('Enabled','umbb'),'disabled' => __('Disabled','umbb'))
                    ),
                    'umbb_image_viewer_rotating'   => array(
                        'type'          => 'select',
                        'label'         => __('Rotating', 'umbb'),
                        'default'       => 'enabled',
                        'options'       => array('enabled' => __('Enabled','umbb'),'disabled' => __('Disabled','umbb'))
                    ),
                    'umbb_image_viewer_scaling'   => array(
                        'type'          => 'select',
                        'label'         => __('Scaling', 'umbb'),
                        'default'       => 'enabled',
                        'options'       => array('enabled' => __('Enabled','umbb'),'disabled' => __('Disabled','umbb'))
                    ),
                    'umbb_image_viewer_transition'   => array(
                        'type'          => 'select',
                        'label'         => __('Transition', 'umbb'),
                        'default'       => 'enabled',
                        'options'       => array('enabled' => __('Enabled','umbb'),'disabled' => __('Disabled','umbb'))
                    ),
                    'umbb_image_viewer_fullscreen'   => array(
                        'type'          => 'select',
                        'label'         => __('Fullscreen', 'umbb'),
                        'default'       => 'enabled',
                        'options'       => array('enabled' => __('Enabled','umbb'),'disabled' => __('Disabled','umbb'))
                    ),
                    
                )
            )
        )
    )
));