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

        $subSettings = [
            'font-weight' => ['title' => 'Font weight', 'input_type' => 'select', 'select_options' => ['300', '400', '500', '600', '700', '800', '900'],],
            'font-style' => ['title' => 'Font style', 'input_type' => 'select', 'select_options' => ['normal', 'italic', 'oblique'],],
            'font-size' => ['title' => 'Font size', 'input_type' => 'number', 'suffix' => 'px', 'default_val' => '13'],
            'line-height' => ['title' => 'Line height', 'input_type' => 'number', 'suffix' => 'px', 'default_val' => '22'],
            'text-align' => ['title' => 'Text align', 'input_type' => 'select', 'select_options' => ['left', 'center', 'right'], 'default_val' => 'left',],
        ];

        // Manage settings sections - add / remove sections here
        $this->managers = [
            [
                'id' => 'esg-settings-template',
                'title' => 'Templates de signatures',
                'fields' => [
                    'template' => [
                        'title' => 'Choix du template',
                        'input_type' => 'template',
                    ],
                ],
            ],
            [
                'id' => 'esg-settings-general',
                'title' => 'Informations générales',
                'fields' => [
                    'font_family' => [
                        'title' => 'Font family',
                        'input_type' => 'select',
                        'select_options' => ['Arial', 'Calibri', 'Cambria', 'Comic Sans MS', 'Courier', 'Georgia', 'Garamond', 'Helvetica', 'Open Sans', 'Serif', 'Sans Serif', 'Tahoma', 'Times New Roman', 'Trebuchet MS', 'Verdana'],
                    ],
                    'company_name' => [
                        'title' => 'Nom de l\'entreprise',
                        'input_type' => 'text',
                        'sub_settings' => $subSettings,
                    ],
                    'baseline' => [
                        'title' => 'Slogan',
                        'input_type' => 'text',
                        'sub_settings' => $subSettings,
                    ],
                    'address' => [
                        'title' => 'Adresse',
                        'input_type' => 'text',
                        'sub_settings' => $subSettings,
                    ],
                    'city' => [
                        'title' => 'Ville, pays',
                        'input_type' => 'text',
                        'sub_settings' => $subSettings,
                    ],
                    'phone' => [
                        'title' => 'Numéro de téléphone',
                        'input_type' => 'text',
                        'sub_settings' => $subSettings,
                    ],
                    'website' => [
                        'title' => 'Lien site internet (avec https://)',
                        'input_type' => 'text',
                        'sub_settings' => $subSettings,
                    ],
                ],
            ],

            [
                'id' => 'esg-settings-userinfos',
                'title' => 'Infos utilisateur',
                'fields' => [
                    'user_firstname' => [
                        'title' => 'Prénom',
                        'input_type' => 'hidden',
                        'sub_settings' => $subSettings,
                    ],
                    'user_surname' => [
                        'title' => 'Nom',
                        'input_type' => 'hidden',
                        'sub_settings' => $subSettings,
                    ],
                    'user_title' => [
                        'title' => 'Fonction',
                        'input_type' => 'hidden',
                        'sub_settings' => $subSettings,
                    ],
                    'user_email' => [
                        'title' => 'Email',
                        'input_type' => 'hidden',
                        'sub_settings' => $subSettings,
                    ],
                    'user_mobile' => [
                        'title' => 'Mobile',
                        'input_type' => 'hidden',
                        'sub_settings' => $subSettings,
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
                    'twitter' => [
                        'title' => 'Url compte Twitter',
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
                    'highlight_color' =>
                        [
                            'title' => 'Couleur de mise en avant',
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
