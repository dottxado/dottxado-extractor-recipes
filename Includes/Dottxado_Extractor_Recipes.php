<?php //phpcs:disable WordPress.Files.FileName.InvalidClassFileName

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://tetracube.red
 * @since      1.0.0
 *
 * @package    Dottxado_Extractor_Recipes
 * @subpackage Dottxado_Extractor_Recipes/Includes
 */

namespace Dottxado\Dottxado_Extractor_Recipes\Includes;

use Dottxado\Dottxado_Extractor_Recipes\Admin\FilterTaxonomy;
use Dottxado\Dottxado_Extractor_Recipes\Admin\IngredientTaxonomy;
use Dottxado\Dottxado_Extractor_Recipes\Front\Front;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Dottxado_Extractor_Recipes
 * @subpackage Dottxado_Extractor_Recipes/Includes
 * @author     Erika Gili <>
 */
class Dottxado_Extractor_Recipes {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_front_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		$this->loader = new Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new I18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_ingredient = IngredientTaxonomy::get_instance();
		$plugin_filter = FilterTaxonomy::get_instance();

		$this->loader->add_action( 'init', $plugin_ingredient, 'init' );
		$this->loader->add_filter( 'term_updated_messages', $plugin_ingredient, 'updatedMessages' );

		$this->loader->add_action( 'init', $plugin_filter, 'init' );
		$this->loader->add_filter( 'term_updated_messages', $plugin_filter, 'updatedMessages' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_front_hooks() {

		$plugin_front = Front::get_instance();

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_front, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_front, 'enqueue_scripts' );
		$this->loader->add_action( 'wp', $plugin_front, 'onlyMembersAllowed' );


	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @return    Loader    Orchestrates the hooks of the plugin.
	 * @since     1.0.0
	 */
	public function get_loader() {
		return $this->loader;
	}

}
