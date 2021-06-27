<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://tetracube.red
 * @since             1.0.0
 * @package           Dottxado_Extractor_Recipes
 *
 * @wordpress-plugin
 * Plugin Name:       Juice extractor recipes add-on
 * Plugin URI:        https://tetracube.red
 * Description:       Add-on to manage more data for juice extractor recipes
 * Version:           1.0.0
 * Author:            Erika Gili
 * Author URI:        https://tetracube.red/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dottxado-extractor-recipes
 * Domain Path:       /Languages
 */

namespace Dottxado\Dottxado_Extractor_Recipes;

use Dottxado\Dottxado_Extractor_Recipes\Includes\Dottxado_Extractor_Recipes;
use Dottxado\Dottxado_Extractor_Recipes\Includes\Activator;
use Dottxado\Dottxado_Extractor_Recipes\Includes\Deactivator;
use Dottxado\Dottxado_Extractor_Recipes\Includes\Uninstaller;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

const PLUGIN_NAME    = 'dottxado_extractor_recipes';
const PLUGIN_VERSION = '1.0.0';

/**
 * Include classes with Composer.
 */
require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in Includes/Activator.php
 */
function activate_dottxado_extractor_recipes() {
	Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in Includes/Deactivator.php
 */
function deactivate_dottxado_extractor_recipes() {
	Deactivator::deactivate();
}

/**
 * The code that runs during plugin uninstallation.
 * This action is documented in Includes/Uninstaller.php
 */
function uninstall_dottxado_extractor_recipes() {
	Uninstaller::uninstall();
}


register_activation_hook( __FILE__, 'Dottxado\Dottxado_Extractor_Recipes\activate_dottxado_extractor_recipes' );
register_deactivation_hook( __FILE__, 'Dottxado\Dottxado_Extractor_Recipes\deactivate_dottxado_extractor_recipes' );
register_uninstall_hook( __FILE__, 'Dottxado\Dottxado_Extractor_Recipes\uninstall_dottxado_extractor_recipes' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dottxado_extractor_recipes() {

	$plugin = new Dottxado_Extractor_Recipes();
	$plugin->run();

}
run_dottxado_extractor_recipes();
