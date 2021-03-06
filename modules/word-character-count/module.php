<?php
/**
 * Class for a Word & Character Count module.
 */
class WP_Linguist_Module_Word_Character_Count extends WP_Linguist_Module_Base {

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

	/**
	 * Enqueue module scripts.
	 *
	 * @access public
	 */
	public function enqueue_scripts() {
		wp_enqueue_script('wp-linguist-module-word-character-count', $this->assets_url() . 'js/module.js');
		wp_enqueue_script('wp-linguist-view-word-character-count', $this->assets_url() . 'js/view.js');
		wp_enqueue_script('wp-linguist-main-word-character-count', $this->assets_url() . 'js/main.js');
	}

	/**
	 * Enqueue module styles.
	 *
	 * @access public
	 */
	public function enqueue_styles() {
		wp_enqueue_style('wp-linguist-module-word-character-count', $this->assets_url() . 'css/module.css');
	}

}