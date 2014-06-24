<?php
/**
 * WP Client Documents
 *
 * A Wordpress plugin to easily manage files between users into Wordpress Administration.
 *
 * @package   WP_Client_Documents
 * @author    João Netto <hi@joaonetto.me>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 spreesso.ml
 *
 * @wordpress-plugin
 * Plugin Name:       WP Client Documents
 * Plugin URI:        @TODO
 * Description:       A Wordpress plugin to easily manage files between users into Wordpress Administration.
 * Version:           1.0.0
 * Author:            João Netto
 * Author URI:        http://joaonetto.me
 * Text Domain:       wp-client-documents-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/jnettome/wp-client-documents
 * WordPress-Plugin-Boilerplate: v2.6.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/
require_once( plugin_dir_path( __FILE__ ) . 'public/class-wp-client-documents.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook( __FILE__, array( 'WP_Client_Documents', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'WP_Client_Documents', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'WP_Client_Documents', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-wp-client-documents-admin.php' );
	add_action( 'plugins_loaded', array( 'WP_Client_Documents_Admin', 'get_instance' ) );

}
