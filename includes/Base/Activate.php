<?php
/**
 * @package  emailSignatureGenerator
 */


namespace Includes\Base;

use Includes\Base\BaseController;

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

        $plugin_settings = get_option( ESG_PLUGIN_SETTINGS );

        if ( !isset( $plugin_settings ) || empty( $plugin_settings ) ) {
            $storeData = new StoreData();
            $storeData->set_default_options();
        }

        flush_rewrite_rules();
    }
}
