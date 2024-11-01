<?php
	
class FL_UMBB_Modules_Loader {

	static public function init() {
		add_action( 'plugins_loaded', __CLASS__ . '::setup_hooks' );
	}
	
	static public function setup_hooks() {
		if ( ! class_exists( 'FLBuilder' ) ) {
			return;	
		}
		
		// Load custom modules.
		add_action( 'init', __CLASS__ . '::load_modules' );	
		
	}
	
	static public function load_modules() {
		global $umbb;

		require_once FL_UMBB_DIR . 'classes/class-fl-umbb-template-loader.php';
		require_once FL_UMBB_DIR . 'classes/class-fl-umbb-slider-manager.php';
		
		$umbb = new stdClass;
        $umbb->template_loader = new UMBB_Template_Loader();
        $umbb->slider_manager = new UMBB_Slider_Manager();

		require_once FL_UMBB_DIR . 'modules/ultimate-slider/ultimate-slider.php';
		require_once FL_UMBB_DIR . 'modules/ultimate-image-viewer/ultimate-image-viewer.php';
	}
}

FL_UMBB_Modules_Loader::init();