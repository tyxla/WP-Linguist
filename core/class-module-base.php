<?php
/**
 * Abstract base class for a Linguist module.
 */
abstract class WP_Linguist_Module_Base {

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
	 * @param string $title The module title.
	 */
	public function __construct($title) {

		// set module title
		$this->set_title($title);

		// enqueue scripts
		add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

		// enqueue styles
		add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));

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
	 * Setup & configure the module.
	 *
	 * @abstract
	 * @access public
	 */
	abstract public function setup();

	/**
	 * Render the module.
	 *
	 * @abstract
	 * @access public
	 */
	abstract public function render();

	/**
	 * Enqueue module scripts.
	 *
	 * @abstract
	 * @access public
	 */
	abstract public function enqueue_scripts();

	/**
	 * Enqueue module styles.
	 *
	 * @abstract
	 * @access public
	 */
	abstract public function enqueue_styles();

}