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
	 * @access protected
	 *
	 * @var WP_Linguist_Module_Manager
	 */
	protected $module_manager;

	/**
	 * Path to the plugin.
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $plugin_path;

	/**
	 * Constructor.
	 *	
	 * Initializes and hooks the plugin functionality.
	 *
	 * @access public
	 */
	public function __construct() {

		// set the path to the plugin main directory
		$this->set_plugin_path(dirname(__FILE__));

		// include all plugin files
		$this->include_files();

		// initialize module manager
		$this->set_module_manager(new WP_Linguist_Module_Manager());

		// hook the rendering of all modules
		add_action('wp_linguist_render', array($this->module_manager, 'render_modules'));

		// enqueue scripts
		add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

		// enqueue styles
		add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));

	}

	/**
	 * Load the plugin classes and libraries.
	 *
	 * @access protected
	 */
	protected function include_files() {
		require_once($this->get_plugin_path() . '/core/class-module-manager.php');
		require_once($this->get_plugin_path() . '/core/class-module-base.php');

		require_once($this->get_plugin_path() . '/modules/word-character-count/module.php');
		require_once($this->get_plugin_path() . '/modules/keywords/module.php');
	}

	/**
	 * Retrieve the module manager.
	 *
	 * @access public
	 *
	 * @return WP_Linguist_Module_Manager $module_manager The module manager.
	 */
	public function get_module_manager() {
		return $this->module_manager;
	}

	/**
	 * Modify the module manager.
	 *
	 * @access public
	 *
	 * @param WP_Linguist_Module_Manager $module_manager The new module manager.
	 */
	public function set_module_manager($module_manager) {
		$this->module_manager = $module_manager;
	}

	/**
	 * Retrieve the path to the main plugin directory.
	 *
	 * @access public
	 *
	 * @return string $plugin_path The path to the main plugin directory.
	 */
	public function get_plugin_path() {
		return $this->plugin_path;
	}

	/**
	 * Modify the path to the main plugin directory.
	 *
	 * @access protected
	 *
	 * @param string $plugin_path The new path to the main plugin directory.
	 */
	protected function set_plugin_path($plugin_path) {
		$this->plugin_path = $plugin_path;
	}

	/**
	 * URL to the plugin assets.
	 *
	 * @access public
	 */
	public function assets_url() {
		return plugins_url('/', __FILE__);
	}

	/**
	 * Enqueue main plugin scripts.
	 *
	 * @access public
	 */
	public function enqueue_scripts() {
		wp_enqueue_script('wp-linguist-model', $this->assets_url() . 'js/WP_Linguist.js', array('jquery', 'backbone'));
		wp_enqueue_script('wp-linguist-module', $this->assets_url() . 'js/WP_Linguist_Module.js', array('jquery', 'backbone'));
		wp_enqueue_script('wp-linguist-module-manager', $this->assets_url() . 'js/WP_Linguist_Module_Manager.js', array('jquery', 'backbone'));
		wp_enqueue_script('wp-linguist-module-view', $this->assets_url() . 'js/WP_Linguist_Module_View.js', array('jquery', 'backbone'));
		wp_enqueue_script('wp-linguist-editor', $this->assets_url() . 'js/WP_Linguist_Editor.js', array('jquery', 'backbone'));
		wp_enqueue_script('wp-linguist', $this->assets_url() . 'js/main.js', array('jquery', 'backbone'));
	}

	/**
	 * Enqueue main plugin styles.
	 *
	 * @access public
	 */
	public function enqueue_styles() {
		wp_enqueue_style('wp-linguist-main', $this->assets_url() . 'css/main.css');
	}

}

// initialize WP Linguist
global $wp_linguist;
$wp_linguist = new WP_Linguist();