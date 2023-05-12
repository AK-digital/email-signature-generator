<?php
/**
 * @package emailSignatureGenerator
 */

namespace Includes\Pages;

use Includes\Base\BaseController;


/**
 *
 */
class UserProfile extends BaseController {

    /**
     *  Register function is loaded automatically inside the init.php
     */
    public function register() {
        add_filter( 'user_contactmethods', array( $this, 'user_title' ) );
        add_filter( 'user_contactmethods', array( $this, 'user_linkedin' ) );
        add_filter( 'user_contactmethods', array( $this, 'user_phone' ) );
    }

    public function user_phone( $user_contact ) {
        $user_contact['esg_phone'] = __( 'Phone number' );

        return $user_contact;
    }

    public function user_title( $user_contact ) {
        $user_contact['esg_title'] = __( 'Your title' );

        return $user_contact;
    }

    public function user_linkedin( $user_contact ) {
        $user_contact['esg_linkedin'] = __( 'Linkedin' );

        return $user_contact;
    }
}
