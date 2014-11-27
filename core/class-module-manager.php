<?php
/**
 * Class for managing modules.
 */
class WP_Linguist_Module_Manager {
	/**
	 * Contains all registered modules.
	 *
	 * @access protected
	 *
	 * @var array
	 */
	protected $modules = array();

	/**
	 * Constructor.
	 *	
	 * Initializes and hooks the modules and their functionality.
	 *
	 * @access public
	 */
	public function __construct() {

		// load the modules
		add_action('init', array($this, 'load'));

		// setup the modules
		add_action('admin_init', array($this, 'setup'));

		// render the modules below the main WYSIWYG editor
		add_action('edit_form_after_editor', array($this, 'render'));

	}

	/**
	 * Load all the Linguist modules.
	 *
	 * @access public
	 */
	public function load() {
		// allow for new modules to be registered
		$modules = apply_filters('wp_linguist_modules', array());

		// register the modules
		$this->set_modules($modules);
	}

	/**
	 * Setup all the loaded Linguist modules.
	 *
	 * @access public
	 */
	public function setup() {

	}

	/**
	 * Render the loaded Linguist modules.
	 *
	 * @access public
	 *
	 * @param WP_Post $post The post object
	 */
	public function render($post = null) {
		
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