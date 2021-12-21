<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Api\Callbacks;

use Includes\Base\BaseController;
use Includes\Base\StoreData;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        $storeData = new StoreData();

        return require_once( "$this->plugin_path/templates/admin.php" );
    }
}
