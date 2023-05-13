<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Base;

use http\QueryString;
use Includes\Base\BaseController;

/**
 *
 */
class Enqueue extends BaseController {

    public function register() {
        // We only load admin style and scripts if we are on the esg-settings page
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );

        add_action( 'wp_enqueue_scripts', array( $this, 'front_enqueue' ) );
    }

    function admin_enqueue() {
        wp_enqueue_media();
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );

        wp_enqueue_style( 'esg-common-style', ESG_PLUGIN_URL . 'assets/css/common-style.css' );
        wp_enqueue_script( 'esg-common-script', ESG_PLUGIN_URL . 'assets/js/common-functions.js' );
        wp_enqueue_script( 'esg-js-tabs-script', ESG_PLUGIN_URL . 'assets/js/js-tabs.js' );

        wp_enqueue_style( 'esg-admin-style', ESG_PLUGIN_URL . 'assets/css/admin-style.css' );
        wp_enqueue_script( 'esg-admin-script', ESG_PLUGIN_URL . 'assets/js/admin-functions.js' );

        wp_enqueue_script( 'esg-ajax-script', ESG_PLUGIN_URL . 'assets/js/ajax-script.js' );
        wp_localize_script( 'esg-ajax-script', 'ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    }

    function front_enqueue() {
        if ( !wp_script_is( 'jquery', 'enqueued' ) ) {
            wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.slim.min.js' );
        }

        wp_register_script( 'esg-js-tabs-script', ESG_PLUGIN_URL . 'assets/js/js-tabs.js' );

        wp_register_style( 'float-label-style', ESG_PLUGIN_URL . 'assets/css/float-labels.min.css' );
        wp_register_script( 'float-label-script', ESG_PLUGIN_URL . 'assets/js/float-labels.min.js', array(), '1.0.0', false );

        wp_enqueue_script( 'esg-common-script', ESG_PLUGIN_URL . 'assets/js/common-functions.js' );
        wp_enqueue_style( 'esg-common-style', ESG_PLUGIN_URL . 'assets/css/common-style.css' );

        wp_enqueue_style( 'esg-front-style', ESG_PLUGIN_URL . 'assets/css/frontend-style.css' );
        //        wp_enqueue_script('esg-front-script', ESG_PLUGIN_URL . 'assets/js/front-functions.js', array(), '1.0.0', true);
    }
}
