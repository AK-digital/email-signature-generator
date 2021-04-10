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

    public $section_managers = array();
    public $field_managers = array();

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


        // Manage settings sections - add / remove sections here
        $this->section_managers = array(
            'esg-settings-template' => 'Templates de signatures',
            'esg-settings-general' => 'Informations générales',
            'esg-settings-social' => 'Réseaux sociaux',
            'esg-settings-branding' => 'Branding',
            'esg-settings-additional' => 'Contenu additionnel',
        );

        // Manage settings fields - add / remove fields here
        $this->field_managers = array(
            'font-family' => 'Font family',
            'company-name' => 'Nom de l\'entreprise',
            'baseline' => 'Slogan',
            'address' => 'Adresse',
            'phone' => 'Numéro de téléphone',
            'website' => 'Lien site internet (avec https://)',
        );
	}
}
