<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin so that it
 * is ready for translation.
 *
 * @since      0.1.0
 * @package    HQ Integrations
 * @subpackage HQ Integrations/includes
 * @author     Richard Leo <leo.richard2@gmail.com>
 */
class HQ_Integrations_I18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since 0.1.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'hq-integrations',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages'
		);
	}
}
