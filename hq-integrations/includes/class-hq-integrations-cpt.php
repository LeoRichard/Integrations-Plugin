<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       
 * @since      0.1.0
 *
 * @package    HQ Integrations
 * @subpackage HQ Integrations/includes
 */

/**
 * Registers 'integrations' post type.
 *
 * @package    Integrations Toolkit
 * @subpackage Integrations Toolkit/includes
 * @author     Richard Leo <leo.richard2@gmail.com>
 */
class HQ_Integrations_CPT {

	/**
	 * Register Integrations post type.
	 *
	 * @since 0.1.0
	 */
	public function post_type() {
		$labels = array(
			'name'               => _x( 'Integrations',  'post type general name',  'hq-integrations' ),
			'singular_name'      => _x( 'Integration',   'post type singular name', 'hq-integrations' ),
			'menu_name'          => _x( 'Integrations', 'admin menu',              'hq-integrations' ),
			'name_admin_bar'     => _x( 'Integration',   'add new on admin bar',    'hq-integrations' ),
			'add_new'            => _x( 'Add New',   'book',                    'hq-integrations' ),
			'add_new_item'       => __( 'Add New Integration',                      'hq-integrations' ),
			'new_item'           => __( 'New Integration',                          'hq-integrations' ),
			'edit_item'          => __( 'Edit Integration',                         'hq-integrations' ),
			'view_item'          => __( 'View Integration',                         'hq-integrations' ),
			'all_items'          => __( 'All Integrations',                         'hq-integrations' ),
			'search_items'       => __( 'Search Integrations',                      'hq-integrations' ),
			'parent_item_colon'  => __( 'Parent Integrations:',                     'hq-integrations' ),
			'not_found'          => __( 'No integrations found.',                   'hq-integrations' ),
			'not_found_in_trash' => __( 'No integrations found in Trash.',          'hq-integrations' ),
		);

		$supports = array(
			'title',
			'editor',
			'author',
			'excerpt',
			'comments',
			'revisions',
			'thumbnail',
			'publicize',
			'custom-fields',
			'wpcom-markdown',
		);

		register_post_type( 'integrations', array(
			'labels'               => $labels,
			'description'          => __( 'Integrations Items', 'hq-integrations' ),
			'public'               => true,
			'hierarchical'         => false,
			'menu_icon'            => 'dashicons-portfolio',
			'capability_type'      => 'page',
			'map_meta_cap'         => true,
			'supports'             => $supports,
			'register_meta_box_cb' => null,
			'taxonomies'           => array( 'integrations-category', 'integrations-tag' ),
			'has_archive'          => true,
			'rewrite'              => array( 'slug' => 'integrations' ),
			'query_var'            => 'integrations',
			'can_export'           => true,
			'delete_with_user'     => null,
		) );
	}

	/**
	 * Register Integrations taxonomies.
	 *
	 * @since 0.1.0
	 */
	public function post_taxonomies() {

		// Labels for integrations category taxonomy.
		$labels = array(
			'name'              => _x( 'Integrations Categories', 'taxonomy general name',  'hq-integrations' ),
			'singular_name'     => _x( 'Integrations Category',   'taxonomy singular name', 'hq-integrations' ),
			'search_items'      => __( 'Search Integrations Categories',                    'hq-integrations' ),
			'all_items'         => __( 'All Integrations Categories',                       'hq-integrations' ),
			'parent_item'       => __( 'Parent Integrations Category',                      'hq-integrations' ),
			'parent_item_colon' => __( 'Parent Integrations Category:',                     'hq-integrations' ),
			'edit_item'         => __( 'Edit Integrations Category',                        'hq-integrations' ),
			'update_item'       => __( 'Update Integrations Category',                      'hq-integrations' ),
			'add_new_item'      => __( 'Add New Integrations Category',                     'hq-integrations' ),
			'new_item_name'     => __( 'New Integrations Category Name',                    'hq-integrations' ),
			'menu_name'         => __( 'Integrations Categories',                           'hq-integrations' ),
		);

		// Register integrations category taxonomy.
		register_taxonomy( 'integrations-category', array( 'integrations' ), array(
			'labels'            => $labels,
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'integration-category' ),
			'query_var'         => true,
		) );

		// Labels for integrations tag taxonomy.
		$labels = array(
			'name'              => _x( 'Integrations Tags', 'taxonomy general name',  'hq-integrations' ),
			'singular_name'     => _x( 'Integrations Tag',  'taxonomy singular name', 'hq-integrations' ),
			'search_items'      => __( 'Search Integrations Tags',                    'hq-integrations' ),
			'all_items'         => __( 'All Integrations Tags',                       'hq-integrations' ),
			'parent_item'       => __( 'Parent Integrations Tag',                     'hq-integrations' ),
			'parent_item_colon' => __( 'Parent Integrations Tag:',                    'hq-integrations' ),
			'edit_item'         => __( 'Edit Integrations Tag',                       'hq-integrations' ),
			'update_item'       => __( 'Update Integrations Tag',                     'hq-integrations' ),
			'add_new_item'      => __( 'Add New Integrations Tag',                    'hq-integrations' ),
			'new_item_name'     => __( 'New Integrations Tag Name',                   'hq-integrations' ),
			'menu_name'         => __( 'Integrations Tags',                           'hq-integrations' ),
		);

		// Register integrations tag taxonomy.
		register_taxonomy( 'integrations-tag', array( 'integrations' ), array(
			'labels'            => $labels,
			'public'            => true,
			'hierarchical'      => false,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'integration-tag' ),
			'query_var'         => true,
		) );

	}
}
