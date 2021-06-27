<?php //phpcs:disable WordPress.Files.FileName.InvalidClassFileName

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://tetracube.red
 * @since      1.0.0
 *
 * @package    Dottxado_Extractor_Recipes
 * @subpackage Dottxado_Extractor_Recipes/Front
 */

namespace Dottxado\Dottxado_Extractor_Recipes\Front;

use const Dottxado\Dottxado_Extractor_Recipes\PLUGIN_NAME;

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Dottxado_Extractor_Recipes
 * @subpackage Dottxado_Extractor_Recipes/Front
 * @author     Erika Gili <>
 */
class Front {

	/**
	 * Singleton instance
	 *
	 * @var Front $instance This instance.
	 */
	private static $instance = null;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	private function __construct() {

	}

	/**
	 * Get class instance
	 *
	 * @return Front
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}

		return self::$instance;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style(
			PLUGIN_NAME,
			plugin_dir_url( __FILE__ ) . 'css/front.css',
			array(),
			filemtime( plugin_dir_path( __FILE__ ) . 'css/front.css' ),
			'all'
		);

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script(
			PLUGIN_NAME,
			plugin_dir_url( __FILE__ ) . 'js/front.js',
			array( 'jquery' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'js/front.js' ),
			true
		);

	}

	/**
	 * Allow only logged in users
	 */
	public function onlyMembersAllowed() {
		global $pagenow;
		if ( ! is_user_logged_in() && $pagenow != 'wp-login.php' ) {
			auth_redirect();
		}
	}

}
