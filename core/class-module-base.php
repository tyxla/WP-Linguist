<?php
/**
 * Abstract base class for a Linguist module.
 */
abstract class WP_Linguist_Module_Base {

	/**
	 * Module name.
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Module title.
	 *
	 * @access protected
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * Constructor.
	 *	
	 * Initializes the module.
	 *
	 * @access public
	 *
	 * @param string $name The module name.
	 * @param string $title The module title.
	 */
	public function __construct($name, $title) {

		// set module title and name
		$this->set_name($name);
		$this->set_title($title);

		// enqueue scripts
		add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

		// enqueue styles
		add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));

	}

	/**
	 * Retrieve the module name.
	 *
	 * @access public
	 *
	 * @return string $name The module name.
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * Modify the module name.
	 *
	 * @access public
	 *
	 * @param string $name The new module name.
	 */
	public function set_name($name) {
		$this->name = $name;
	}

	/**
	 * Retrieve the module title.
	 *
	 * @access public
	 *
	 * @return string $title The module title.
	 */
	public function get_title() {
		return $this->title;
	}

	/**
	 * Modify the module title.
	 *
	 * @access public
	 *
	 * @param string $title The new module title.
	 */
	public function set_title($title) {
		$this->title = $title;
	}

	/**
	 * Render the module.
	 *
	 * @access public
	 */
	public function render() {
		global $wp_linguist, $wp_linguist_module;

		// allow access to this module from the template
		$wp_linguist_module = $this;

		// determine the main template
		$template = $wp_linguist->get_plugin_path() . '/templates/module-' . $this->get_name() . '.php';
		$template = apply_filters('wp_linguist_template_' . $this->get_name(), $template);

		// render the main template
		include_once($template);
	}

	/**
	 * Enqueue module scripts. 
	 * Currently enqueues nothing, should be implemented in inheriting classes.
	 *
	 * @access public
	 */
	public function enqueue_scripts() {

	}

	/**
	 * Enqueue module styles. 
	 * Currently enqueues nothing, should be implemented in inheriting classes.
	 *
	 * @access public
	 */
	public function enqueue_styles() {
		
	}

	/**
	 * Setup & configure the module.
	 *
	 * @abstract
	 * @access public
	 */
	abstract public function setup();

}