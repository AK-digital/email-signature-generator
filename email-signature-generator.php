<?php
/**
 * @package  emailSignatureGenerator
 */

/*
Plugin Name: Email signature generator (ESG)
Plugin URI: https://studiokrack.fr
Description: Automate html email signature generation for users
Version: 1.1
Author: aurelien@studiokrack.fr
Author URI: https://studiokrack.fr/
License: GPLv2 or later
Text Domain: emailSignatureGenerator
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
defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_esg_plugin()
{
    Includes\Base\Activate::activate();
}

register_activation_hook(__FILE__, 'activate_esg_plugin');

/**
 * The code that runs during plugin deactivation
 */
function deactivate_esg_plugin()
{
    Includes\Base\Deactivate::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_esg_plugin');

/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('Includes\\Init')) {
    Includes\Init::register_services();
}

include_once('updater/updater.php');
if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
    $config = array(
        'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
        'proper_folder_name' => 'email-signature-generator', // this is the name of the folder your plugin lives in
        'api_url' => 'https://api.github.com/repos/AK-digital/email-signature-generator', // the GitHub API url of your GitHub repo
        'raw_url' => 'https://raw.github.com/AK-digital/email-signature-generator/master', // the GitHub raw url of your GitHub repo
        'github_url' => 'https://github.com/AK-digital/email-signature-generator', // the GitHub url of your GitHub repo
        'zip_url' => 'https://github.com/AK-digital/email-signature-generator/zipball/master', // the zip url of the GitHub repo
        'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
        'requires' => '1.1', // which version of WordPress does your plugin require?
        'tested' => '1.1', // which version of WordPress is your plugin tested up to?
        'readme' => 'README.md', // which file to use as the readme for the version number
        'access_token' => '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', // Access private repositories by authorizing under Plugins > GitHub Updates when this example plugin is installed
    );
    new WP_GitHub_Updater($config);
}
