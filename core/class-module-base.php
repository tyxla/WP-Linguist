<?php
/**
 * Abstract base class for a Linguist module.
 */
abstract class WP_Linguist_Module_Base {

	/**
	 * Constructor.
	 *	
	 * Initializes the module.
	 *
	 * @access public
	 */
	public function __construct() {

		// enqueue scripts
		add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

		// enqueue styles
		add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));

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