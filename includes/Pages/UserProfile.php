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

        $options = get_option( 'esg_settings' );

        if ( isset( $options['show_on_view_profile'] ) ) {
            add_action( 'show_user_profile', array( $this, 'user_signature' ), 1, 1 );
        }

        if ( isset( $options['show_on_edit_profile'] ) ) {
            add_action( 'edit_user_profile', array( $this, 'user_signature' ), 1, 1 );
        }
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

    public function user_signature( $user_contact ) {

        $user_data = array(
            'firstname'     => $user_contact->user_firstname,
            'surname'       => $user_contact->user_lastname,
            'email'         => $user_contact->user_email,
            'mobile'        => $user_contact->user_phone,
            'title'         => $user_contact->esg_title,
            'user_linkedin' => $user_contact->esg_linkedin,
        );
        
        echo '<h3>' . __( 'Votre signature e-mail', 'esg-plugin' ) . '</h3>'
        . '<div class="email-signature">'
        . $this->generate_signature( $user_data )
        . '</div>';
    }
}
