<?php
/**
 * Plugin Name: WP Linguist - Advanced Word & Character Stats
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
	 * Contains all loaded modules.
	 *
	 * @access protected
	 *
	 * @var array
	 */
	protected $modules = array();

	/**
	 * Constructor.
	 *	
	 * Initializes and hooks the plugin functionality.
	 *
	 * @access public
	 */
	public function __construct() {
		
	}

	/**
	 * Retrieve the modules to be loaded.
	 *
	 * @access public
	 *
	 * @return array $modules The currently registered modules.
	 */
	public function get_modules() {
		return $this->modules;
	}

	/**
	 * Modify the modules to be loaded.
	 *
	 * @access public
	 *
	 * @param array $modules An array of module class name strings.
	 */
	public function set_modules($modules = array()) {
		$this->modules = $modules;
	}

}

// initialize WP Linguist
global $wp_linguist;
$wp_linguist = new WP_Linguist();