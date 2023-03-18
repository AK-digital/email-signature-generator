<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Api\Callbacks;

use Includes\Base\BaseController;
use Includes\Base\StoreData;

class AdminCallbacks extends BaseController {

    public function adminDashboard() {
         $storeData = new StoreData();

        return require_once ESG_PLUGIN_TEMPLATES . 'admin.php';
    }
}
