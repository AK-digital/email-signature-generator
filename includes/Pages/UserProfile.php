<?php
/**
 * @package emailSignatureGenerator
 */

namespace Includes\Pages;

use Includes\Base\BaseController;


/**
 *
 */
class UserProfile extends BaseController
{
    /**
     *  Register function is loaded automatically inside the init.php
     */
    public function register()
    {
        add_filter('user_contactmethods', array($this, 'user_position'));
        add_filter('user_contactmethods', array($this, 'user_linkedin'));

       if($this->wc_check == false){
           add_filter('user_contactmethods', array($this, 'user_phone'));
       }
    }

    public function user_phone($user_contact)
    {
        $user_contact['esg_phone'] = __('Phone number');

        return $user_contact;
    }

    public function user_position($user_contact)
    {
        $user_contact['esg_position'] = __('Your position');

        return $user_contact;
    }

    public function user_linkedin($user_contact)
    {
        $user_contact['esg_linkedin'] = __('Linkedin');

        return $user_contact;
    }
}
