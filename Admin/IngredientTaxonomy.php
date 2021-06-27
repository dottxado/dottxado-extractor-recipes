<?php //phpcs:disable WordPress.Files.FileName.InvalidClassFileName

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://tetracube.red
 * @since      1.0.0
 *
 * @package    Dottxado_Extractor_Recipes
 * @subpackage Dottxado_Extractor_Recipes/Admin
 */

namespace Dottxado\Dottxado_Extractor_Recipes\Admin;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Dottxado_Extractor_Recipes
 * @subpackage Dottxado_Extractor_Recipes/Admin
 * @author     Erika Gili <>
 */
class IngredientTaxonomy {

	const TAX_NAME = 'ingredient';

	/**
	 * Singleton instance
	 *
	 * @var IngredientTaxonomy $instance This instance.
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
	 * @return IngredientTaxonomy
	 */
	public static function get_instance(): IngredientTaxonomy {
		if ( is_null( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}

		return self::$instance;
	}

	/**
	 * Registers the `ingredient` taxonomy,
	 * for use with 'post'.
	 */
	public function init(): void {
		register_taxonomy( self::TAX_NAME, [ 'post' ], [
			'hierarchical'          => true,
			'public'                => true,
			'show_in_nav_menus'     => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'query_var'             => true,
			'rewrite'               => true,
			'capabilities'          => [
				'manage_terms' => 'edit_posts',
				'edit_terms'   => 'edit_posts',
				'delete_terms' => 'edit_posts',
				'assign_terms' => 'edit_posts',
			],
			'labels'                => [
				'name'                       => __( 'Ingredients', 'dottxado-extractor-recipes' ),
				'singular_name'              => _x( 'Ingredient', 'taxonomy general name', 'dottxado-extractor-recipes' ),
				'search_items'               => __( 'Search Ingredients', 'dottxado-extractor-recipes' ),
				'popular_items'              => __( 'Popular Ingredients', 'dottxado-extractor-recipes' ),
				'all_items'                  => __( 'All Ingredients', 'dottxado-extractor-recipes' ),
				'parent_item'                => __( 'Parent Ingredient', 'dottxado-extractor-recipes' ),
				'parent_item_colon'          => __( 'Parent Ingredient:', 'dottxado-extractor-recipes' ),
				'edit_item'                  => __( 'Edit Ingredient', 'dottxado-extractor-recipes' ),
				'update_item'                => __( 'Update Ingredient', 'dottxado-extractor-recipes' ),
				'view_item'                  => __( 'View Ingredient', 'dottxado-extractor-recipes' ),
				'add_new_item'               => __( 'Add New Ingredient', 'dottxado-extractor-recipes' ),
				'new_item_name'              => __( 'New Ingredient', 'dottxado-extractor-recipes' ),
				'separate_items_with_commas' => __( 'Separate ingredients with commas', 'dottxado-extractor-recipes' ),
				'add_or_remove_items'        => __( 'Add or remove ingredients', 'dottxado-extractor-recipes' ),
				'choose_from_most_used'      => __( 'Choose from the most used ingredients', 'dottxado-extractor-recipes' ),
				'not_found'                  => __( 'No ingredients found.', 'dottxado-extractor-recipes' ),
				'no_terms'                   => __( 'No ingredients', 'dottxado-extractor-recipes' ),
				'menu_name'                  => __( 'Ingredients', 'dottxado-extractor-recipes' ),
				'items_list_navigation'      => __( 'Ingredients list navigation', 'dottxado-extractor-recipes' ),
				'items_list'                 => __( 'Ingredients list', 'dottxado-extractor-recipes' ),
				'most_used'                  => _x( 'Most Used', 'ingredient', 'dottxado-extractor-recipes' ),
				'back_to_items'              => __( '&larr; Back to Ingredients', 'dottxado-extractor-recipes' ),
			],
			'show_in_rest'          => true,
			'rest_base'             => 'ingredient',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		] );

	}


	/**
	 * Sets the post updated messages for the `ingredient` taxonomy.
	 *
	 * @param array $messages Post updated messages.
	 *
	 * @return array Messages for the `ingredient` taxonomy.
	 */
	public function updatedMessages( array $messages ): array {

		$messages['ingredient'] = [
			0 => '', // Unused. Messages start at index 1.
			1 => __( 'Ingredient added.', 'dottxado-extractor-recipes' ),
			2 => __( 'Ingredient deleted.', 'dottxado-extractor-recipes' ),
			3 => __( 'Ingredient updated.', 'dottxado-extractor-recipes' ),
			4 => __( 'Ingredient not added.', 'dottxado-extractor-recipes' ),
			5 => __( 'Ingredient not updated.', 'dottxado-extractor-recipes' ),
			6 => __( 'Ingredients deleted.', 'dottxado-extractor-recipes' ),
		];

		return $messages;
	}


}
