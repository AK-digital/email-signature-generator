<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Base;

class BaseController
{
	public $plugin_path;

	public $plugin_url;

	public $plugin;

	public $templates_path;

	public $wc_check = false;

    public $options;

	public function __construct()
	{
		$this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
		$this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
		$this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/email-signature-generator.php';

		$this->templates_path = plugin_dir_path(dirname(__FILE__, 2)) . '/templates/';

		// Check if Woocommerce plugin is active
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            $this->wc_check = true;
        }

        $this->options = get_option('esg_admin_settings');

        add_image_size('esg_logo', 80, 80, true); //test
	}
}
