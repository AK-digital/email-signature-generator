<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Api\Callbacks;

use Includes\Base\BaseController;

class AdminCallbacks extends BaseController {

    public function adminTemplate() {
        return require_once ESG_PLUGIN_TEMPLATES . 'template.php';
    }

    public function adminSettings() {
        return require_once ESG_PLUGIN_TEMPLATES . 'settings.php';
    }

    public function adminUpdater() {
        return require_once ESG_PLUGIN_TEMPLATES . 'updater.php';
    }
}
