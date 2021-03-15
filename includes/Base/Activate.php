<?php
/**
 * @package  emailSignatureGenerator
 */


namespace Includes\Base;

/**
 * Class Activate
 * @package Includes\Base
 */
class Activate
{

	/**
	 * Automatically triggered on plugin activation
	 */
	public static function activate()
    {
        flush_rewrite_rules();

        $default = array();

        if ( ! get_option( 'esg_admin_settings' ) ) {
            update_option( 'esg_admin_settings', $default );
        }
    }
}
