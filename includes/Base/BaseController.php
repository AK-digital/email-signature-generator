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

    public $managers = array();
    public $field_managers = array();

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/email-signature-generator.php';

        $this->templates_path = plugin_dir_path(dirname(__FILE__, 2)) . '/templates/';

        // Check if Woocommerce plugin is active
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            $this->wc_check = true;
        }

        $this->options = get_option('esg_admin_settings');

        // Manage settings sections - add / remove sections here
        $this->managers = [
            [
                'id' => 'esg-settings-template',
                'title' => 'Templates de signatures',
                'fields' => [
                    'template' => [
                        'title' => 'Studio Krack',
                        'input_type' => 'template',
                    ],
                ],
            ],
            [
                'id' => 'esg-settings-general',
                'title' => 'Informations générales',
                'fields' => [
                    'font-family' => [
                        'title' => 'Font family',
                        'input_type' => 'font_family',
                    ],
                    'company-name' => [
                        'title' => 'Nom de l\'entreprise',
                        'input_type' => 'text',
                    ],
                    'baseline' => [
                        'title' => 'Slogan',
                        'input_type' => 'text',
                    ],
                    'address' => [
                        'title' => 'Adresse',
                        'input_type' => 'text',
                    ],
                    'phone' => [
                        'title' => 'Numéro de téléphone',
                        'input_type' => 'text',
                    ],
                    'website' => [
                        'title' => 'Lien site internet (avec https://)',
                        'input_type' => 'text',
                    ],
                ],
            ],

            [
                'id' => 'esg-settings-social',
                'title' => 'Réseaux sociaux',
                'fields' => [
                    'facebook' => [
                        'title' => 'Url page Facebook',
                        'input_type' => 'text',
                        'class' => '',
                    ],
                    'youtube' => [
                        'title' => 'Url chaîne Youtube',
                        'input_type' => 'text',
                        'class' => '',
                    ],
                    'linkedin' => [
                        'title' => 'Url page Linkedin',
                        'input_type' => 'text',
                        'class' => '',
                    ],

                    'tiktok' => [
                        'title' => 'Url compte Tiktok',
                        'input_type' => 'text',
                        'class' => '',

                    ],
                    'instagram' => [
                        'title' => 'Url compte Instagram',
                        'input_type' => 'text',
                        'class' => '',
                    ],
                ],
            ],
            [
                'id' => 'esg-settings-branding',
                'title' => 'Branding',
                'fields' => [
                    'logo' => [
                        'title' => 'Logo',
                        'input_type' => 'image',
                        'class' => '',
                    ],
                    'banner' => [
                        'title' => 'Bannière',
                        'input_type' => 'image',
                        'class' => '',
                    ],
                    'banner_link' => [
                        'title' => 'Lien bannière',
                        'input_type' => 'text',
                        'class' => 'regular-text',
                    ],
                    'text_color' => [
                        'title' => 'Couleur du texte',
                        'input_type' => 'color_picker',
                        'class' => '',
                    ],
                    'icon_color' => [
                        'title' => 'Couleur des icones',
                        'input_type' => 'color_picker',
                        'class' => '',
                    ],
                    'link_color' =>
                        [
                            'title' => 'Couleur des liens',
                            'input_type' => 'color_picker',
                            'class' => '',
                        ],
                ],
            ],
            [
                'id' => 'esg-settings-additional',
                'title' => 'Contenu additionnel',
                'fields' => [
                    'additional_content' =>
                        [
                            'title' => 'Disclaimer',
                            'input_type' => 'textarea',
                            'class' => '',
                        ],
                ],
            ],

        ];
    }

    public function toSlug($id)
    {
        $slug = str_replace('-', '_', $id); //change middlescores to underscores
        return $slug;
    }
}
