<?php //phpcs:disable WordPress.Files.FileName.InvalidClassFileName
/**
 * Fired during plugin uninstallation
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

/**
 * Fired during plugin uninstallation.
 *
 * This class defines all code necessary to run during the plugin's uninstallation.
 *
 * @since      1.0.0
 * @package    Dottxado_Extractor_Recipes
 * @subpackage Dottxado_Extractor_Recipes/Includes
 * @author     Erika Gili <>
 */
class Uninstaller {

	/**
	 * Clean up the plugin data.
	 *
	 * @since    1.0.0
	 */
	public static function uninstall() {
		self::removeIngredients();
		self::removeFilters();
	}

	private static function removeIngredients() {
		$taxonomy_name = IngredientTaxonomy::TAX_NAME;
		$terms = get_terms( array(
			'taxonomy' => $taxonomy_name,
			'hide_empty' => false
		) );
		foreach ( $terms as $term ) {
			wp_delete_term($term->term_id, $taxonomy_name);
		}
	}

	private static function removeFilters() {
		$taxonomy_name = FilterTaxonomy::TAX_NAME;
		$terms = get_terms( array(
			'taxonomy' => $taxonomy_name,
			'hide_empty' => false
		) );
		foreach ( $terms as $term ) {
			wp_delete_term($term->term_id, $taxonomy_name);
		}
	}

}
