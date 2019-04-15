<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link        https://dmtrmrv.com
 * @since       0.1.0
 * @package     HQ Integrations
 *
 * Plugin Name: HQ Integrations
 * Description: Adds and displays integrations for HQ.
 * Version:     0.1.1
 * Author:      Richard Leo
 * Author URI:  
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: hq-integrations
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-hq-integrations-activator.php
 */
function activate_hq_integrations() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hq-integrations-activator.php';
	HQ_Integrations_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-hq-integrations-deactivator.php
 */
function deactivate_hq_integrations() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hq-integrations-deactivator.php';
	HQ_Integrations_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_hq_integrations' );
register_deactivation_hook( __FILE__, 'deactivate_hq_integrations' );


/**
 * Add integration single template
 */
if( !function_exists('get_integrations_template') ):
 function get_integrations_template($single_template) {
    global $wp_query, $post;
    if ($post->post_type == 'integrations'){
        $single_template = plugin_dir_path(__FILE__) . '/templates/single-integrations.php';
    }//end if integrations
    return $single_template;
}//end get_integrations_template function
endif;
 
add_filter( 'single_template', 'get_integrations_template' ) ;

/**
 * Add integration archive template
 */
if( !function_exists('get_integrations_archive_template') ):
 function get_integrations_archive_template($archive_template) {
    global $wp_query, $post;
    if ($post->post_type == 'integrations'){
        $archive_template = plugin_dir_path(__FILE__) . '/templates/archive-integrations.php';
    }//end if integrations
    return $archive_template;
}//end get_integrations_template function
endif;
 
add_filter( 'archive_template', 'get_integrations_archive_template' ) ;

/**
 * Add integrations thumbnail size
 */
add_action( 'after_setup_theme', 'your_theme_setup' );
function your_theme_setup() {
    add_image_size( 'integration-thumb', 160, 160); // 160 pixels wide 
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-hq-integrations.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 0.1.0
 */
function run_hq_integrations() {

	$plugin = new HQ_Integrations();
	$plugin->run();

}
run_hq_integrations();
