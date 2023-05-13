<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Api;

class DynamicRouting {


    public function register() {
        add_action( 'rest_api_init', array( $this, 'prefix_register_v1_routes' ) );
    }

    public function prefix_get_endpoint() {
         // rest_ensure_response() wraps the data we want to return into a WP_REST_Response, and ensures it will be properly returned.
        $options    = get_option( 'esg_admin_settings' );
        $bannerlink = $options['banner_link'];
        wp_redirect( $bannerlink );
        exit();
    }

    /**
     * This function is where we register our routes for our example endpoint.
     */
    public function prefix_register_v1_routes() {
         // register_rest_route() handles more arguments but we are going to stick to the basics for now.
        register_rest_route(
            'email-signature-generator/v1',
            '/bannerlink',
            array(
                // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
                'methods'  => \WP_REST_Server::READABLE,
                // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
                'callback' => array( $this, 'prefix_get_endpoint' ),
            )
        );
    }
}
