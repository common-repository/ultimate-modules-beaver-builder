<?php
/**
 * Plugin Name: Ultimate Modules - Beaver Builder
 * Plugin URI: http://wpexpertdeveloper.com/ultimate-modules-beaver-builder
 * Description: Wide range of UI and feature elements for Beaver page builder.
 * Version: 1.0
 * Author: Rakhitha Nimesh
 * Author URI: http://wpexpertdeveloper.com
 */
define( 'FL_UMBB_DIR', plugin_dir_path( __FILE__ ) );
define( 'FL_UMBB_URL', plugins_url( '/', __FILE__ ) );

require_once FL_UMBB_DIR . 'functions.php';
require_once FL_UMBB_DIR . 'classes/class-fl-umbb-modules-loader.php';