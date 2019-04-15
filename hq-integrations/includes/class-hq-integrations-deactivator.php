<?php
/**
 * Fired during plugin deactivation.
 *
 * @since      0.1.0
 * @package    HQ Integrations
 * @subpackage HQ Integrations/includes
 * @author     Richard Leo <leo.richard2@gmail.com>
 */
class HQ_Integrations_Deactivator {

	/**
	 * Flush rewrite rules when plugin is deactivated.
	 *
	 * @since    0.1.0
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}
}
