<?php
/**
 * Plugin Name: WP Linguist - Advanced Content Stats
 * Description: Provides advanced word & character statistics, as well as keyword analysis for your WordPress content.
 * Version: 1.0
 * Author: tyxla
 * Author URI: https://github.com/tyxla
 * License: GPL2
 */

/**
 * Main plugin class.
 */
class WP_Linguist {
	/**
	 * The module manager.
	 *
	 * @access public
	 *
	 * @var WP_Linguist_Module_Manager
	 */
	public $module_manager;

	/**
	 * Constructor.
	 *	
	 * Initializes and hooks the plugin functionality.
	 *
	 * @access public
	 */
	public function __construct() {

		// include all plugin files
		$this->include_files();

		// initialize module manager
		$this->module_manager = new WP_Linguist_Module_Manager();

	}

	/**
	 * Load the plugin classes and libraries.
	 *
	 * @access protected
	 */
	protected function include_files() {
		$path = dirname(__FILE__);

		require_once($path . '/core/class-module-manager.php');
	}

}

// initialize WP Linguist
global $wp_linguist;
$wp_linguist = new WP_Linguist();