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
	 * Constructor.
	 *	
	 * Initializes and hooks the plugin functionality.
	 *
	 * @access public
	 */
	public function __construct() {

	}

}

// initialize WP Linguist
global $wp_linguist;
$wp_linguist = new WP_Linguist();