<?php
/**
 * @package  emailSignatureGenerator
 */


namespace Includes\Base;

use Includes\Base\BaseController;
use Includes\Pages\Template;
use Includes\Pages\Updater;
use Includes\Pages\Settings;

/**
 * Class Activate
 *
 * @package Includes\Base
 */
class Activate extends BaseController {


    /**
     * Automatically triggered on plugin activation
     */
    public static function activate() {

        $template         = new Template();
        $template_options = get_option( $template->option_name );
        if ( !isset( $template_options ) || empty( $template_options ) ) {
            $template->set_default_val();
        }

        $updater         = new Updater();
        $updater_options = get_option( $updater->option_name );
        if ( !isset( $updater_options ) || empty( $updater_options ) ) {
            $updater->set_default_val();
        }

        $settings         = new Settings();
        $settings_options = get_option( $settings->option_name );
        if ( !isset( $settings_options ) || empty( $settings_options ) ) {
            $settings->set_default_val();
        }

        flush_rewrite_rules();
    }
}
