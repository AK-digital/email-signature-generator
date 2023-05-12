<?php

/*
Plugin Name: Email signature generator (ESG)
Plugin URI: https://studiokrack.fr
Description: Automate html email signature generation for users
Version: 1.5.1
Author: aurelien@studiokrack.fr
Author URI: https://studiokrack.fr/
License: GPLv2 or later
Text Domain: esg-plugin
Domain Path: /languages
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// If this file is called firectly, abort!!!

use Includes\Base\StoreData;

defined( 'ABSPATH' ) || die( 'Hey, what are you doing here? You silly human!' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

define( 'ESG_PLUGIN_FILE', __FILE__ );
define( 'ESG_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ESG_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'ESG_PLUGIN_TEMPLATES', plugin_dir_path( __FILE__ ) . '/templates/' );
define( 'ESG_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'ESG_PLUGIN_SETTINGS', 'esg_admin_settings' );

/**
 * The code that runs during plugin activation
 */
function activate_esg_plugin() {
     Includes\Base\Activate::activate();
}

register_activation_hook( __FILE__, 'activate_esg_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_esg_plugin() {
     Includes\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_esg_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Includes\\Init' ) ) {
    Includes\Init::register_services();
}

add_action( 'wp_ajax_esg_reset_default', 'esg_reset_default' );
function esg_reset_default() {
    $store_data = new StoreData();
    $store_data->set_default_options();
    exit;
}

