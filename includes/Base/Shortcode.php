<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Base;

use Includes\Base\BaseController;

class Shortcode extends BaseController {


    public $company_data = array();

    function register() {
         add_shortcode( 'esg_form', array( $this, 'form_shortcode_content' ) );
        add_shortcode( 'esg_user_data', array( $this, 'user_data_shortcode_content' ) );
    }

    public function form_shortcode_content() {
         // If user form is empty, return the form
        if ( isset( $_POST['submit'] ) && isset( $_POST['nonce-esg-form'] ) ) {

            if ( wp_verify_nonce( $_POST['nonce-esg-form'], 'esg-form' ) ) {
                $user_data = array(
                    // Get the user data from the form
                    'firstname'     => esc_html( $_REQUEST['firstname'] ),
                    'surname'       => esc_html( $_REQUEST['surname'] ),
                    'title'         => esc_html( $_REQUEST['title'] ),
                    'mobile'        => esc_html( $_REQUEST['mobile'] ),
                    'email'         => esc_html( $_REQUEST['email'] ),
                    'user_linkedin' => esc_html( $_REQUEST['linkedin'] ),
                );

                $signature = $this->generate_signature( $user_data );

                require_once ESG_PLUGIN_TEMPLATES . 'landing.php';
            }
        }

        //Display the landing signature page
        else {
            require_once ESG_PLUGIN_TEMPLATES . 'form.php';
        }
    }

    public function user_data_shortcode_content() {
         global $current_user;
        wp_get_current_user();

        if ( is_user_logged_in() ) {
            $user_data = array(
                'firstname'     => $current_user->display_name,
                'email'         => $current_user->user_email,
                'mobile'        => get_user_meta( $current_user->ID, 'esg_phone', true ),
                'title'         => get_user_meta( $current_user->ID, 'esg_title', true ),

                // Personal social network links
                'user_linkedin' => get_user_meta( $current_user->ID, 'esg_linkedin', true ),
            );

            $signature = $this->generate_signature( $user_data );

            require_once ESG_PLUGIN_TEMPLATES . 'landing.php';
        }
    }
}
