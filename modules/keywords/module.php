<?php
/**
 * Class for a Keywords module.
 */
class WP_Linguist_Module_Keywords extends WP_Linguist_Module_Base {

	/**
	 * Setup & configure the module.
	 *
	 * @access public
	 */
	public function setup() {

	}

	/**
	 * URL to the module assets.
	 *
	 * @access public
	 */
	public function assets_url() {
		return plugins_url('/', __FILE__);
	}

}