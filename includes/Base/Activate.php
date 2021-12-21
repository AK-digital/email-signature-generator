<?php
/**
 * @package  emailSignatureGenerator
 */


namespace Includes\Base;

use Includes\Base\BaseController;

/**
 * Class Activate
 * @package Includes\Base
 */
class Activate extends BaseController
{

    /**
     * Automatically triggered on plugin activation
     */
    public static function activate()
    {
        flush_rewrite_rules();

        $storeData = new StoreData();
        $storeData->store(false);
    }
}
