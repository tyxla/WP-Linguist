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
		$module_names = apply_filters('wp_linguist_modules', array(
			'WP_Linguist_Module_Word_Character_Count' => 'Word & Character Stats'
		));

		// initialize the modules
		$modules = array();
		foreach ($module_names as $module_name => $module_title) {
			$modules[$module_name] = new $module_name($module_title);
		}

		// register the modules
		$this->set_modules($modules);
	}

	/**
	 * Setup all the registered Linguist modules.
	 *
	 * @access public
	 */
	public function setup() {
		$modules = $this->get_modules();
		foreach ($modules as $module) {
			$module->setup();
		}
	}

	/**
	 * Render the main module container.
	 *
	 * @access public
	 *
	 * @param WP_Post $post The post object
	 */
	public function render($post = null) {
		// skip for attachments
		if ($post && get_post_type($post) == 'attachment') {
			return;
		}

		global $wp_linguist;		

		// determine the main template
		$template = $wp_linguist->get_plugin_path() . '/templates/main.php';
		$template = apply_filters('wp_linguist_main_template', $template);

		// render the main template
		include_once($template);
	}

	/**
	 * Render all modules.
	 *
	 * @access public
	 */
	public function render_modules() {
		$modules = $this->get_modules();

		// allow external code to modify the order of appearance of the modules
		$modules = apply_filters('wp_linguist_modules_render_order', $modules);

		foreach ($modules as $module) {
			$module->render();
		}
	}

	/**
	 * Retrieve all the registered modules.
	 *
	 * @access public
	 *
	 * @return array $modules The currently registered modules.
	 */
	public function get_modules() {
		return $this->modules;
	}

	/**
	 * Modify the registered modules.
	 *
	 * @access public
	 *
	 * @param array $modules An array of module objects.
	 */
	public function set_modules($modules = array()) {
		$this->modules = $modules;
	}

}