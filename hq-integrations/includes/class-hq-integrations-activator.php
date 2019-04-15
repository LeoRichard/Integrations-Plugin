<?php
/**
 * Fired during plugin activation.
 *
 * @since      0.1.0
 * @package    HQ Integrations
 * @subpackage HQ Integrations/includes
 * @author     Richard Leo <leo.richard2@gmail.com>
 */
class HQ_Integrations_Activator {

	/**
	 * Flush rewrite rules when plugin is activated.
	 *
	 * @since 0.1.0
	 */
	public static function activate() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-hq-integrations-cpt.php';
		$cpt = new HQ_Integrations_CPT();
		$cpt->post_type();
		flush_rewrite_rules();
	}
}
