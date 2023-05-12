<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Pages;

use Includes\Api\SettingsApi;
use Includes\Base\BaseController;
use Includes\Api\Callbacks\AdminCallbacks;
use Includes\Api\Callbacks\ManagerCallbacks;

/**
 * Class Front
 *
 * @package Includes\Pages
 */
class Front extends BaseController {


    public function register() {

    }

    public function text_display() {
         $this->text_style_classes = array(
             'line-height:' + $line_height + 'px',
             'font-size:' + $font_size + 'px',
             'font-weight:' + $font_weight,
             'font-family:' + $font_family,
         );
    }
}
