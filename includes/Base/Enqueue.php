<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Base;

use Includes\Base\BaseController;

/**
 *
 */
class Enqueue extends BaseController
{
	public function register()
	{

		add_action('admin_enqueue_scripts', array($this, 'admin_enqueue'));
		add_action('wp_enqueue_scripts', array($this, 'front_enqueue'));
	}

	function admin_enqueue()
	{
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker');

        wp_enqueue_style('esg-common-style', $this->plugin_url . 'assets/css/common-style.css');
        wp_enqueue_script('esg-common-script', $this->plugin_url . 'assets/js/common-scripts.js');

        wp_enqueue_style('esg-admin-style', $this->plugin_url . 'assets/css/admin-style.css');
		wp_enqueue_script('esg-admin-script', $this->plugin_url . 'assets/js/admin-functions.js');

	}

	function front_enqueue()
	{
        wp_enqueue_style('float-label-style', $this->plugin_url . 'assets/css/float-labels.min.css');
        wp_enqueue_script('float-label-script', $this->plugin_url . 'assets/js/float-labels.min.js', array(), '1.0.0', false);

        wp_enqueue_script('esg-common-script', $this->plugin_url . 'assets/js/common-scripts.js');
	    wp_enqueue_style('esg-common-style', $this->plugin_url . 'assets/css/common-style.css');

	    wp_enqueue_style('esg-front-style', $this->plugin_url . 'assets/css/frontend-style.css');
		wp_enqueue_script('esg-front-script', $this->plugin_url . 'assets/js/front-functions.js', array(), '1.0.0', true);
	}
}
