<?php
/**
 * @package emailSignatureGenerator
 */
namespace Includes\Pages;

use Includes\Api\AdminApi;

/**
 *
 */
class Template {

    public $admin;
    public $pages = array();
    public $managers = array();
    public $option_name = 'esg_admin_settings';


    public function register() {
        $this->admin = new AdminApi();

        $this->setPages();
        $this->getFields();
        $this->admin->setSettings('esg_template',  $this->option_name);
        $this->admin->setSections( $this->managers );
        $this->admin->setFields( $this->managers,  $this->option_name );

        $this->admin->settings->addPages( $this->pages )->withSubPage( 'Signature' )->register();
    }

    /**
     * Set WordPress admin page for the plugin
     */
    public function setPages() {
        $this->pages = array(
            array(
                'page_title' => 'Email signature generator settings',
                'menu_title' => 'Email Signature',
                'capability' => 'manage_options',
                'menu_slug'  => 'esg_template',
                'callback'   => array( $this->admin->callbacks, 'adminTemplate' ),
                'icon_url'   => 'dashicons-id',
                'position'   => 110,
            ),
        );
    }

    public function getFields() {

        $text_style = array(
            'font-weight' => array(
                'title'      => 'Font weight',
                'input_type' => 'select',
                'options'    => array(
                    'select_options' => array( '300', '400', '500', '600', '700', '800', '900' ),
                    'default_val'    => '400',
                ),
            ),
            'font-style'  => array(
                'title'      => 'Font style',
                'input_type' => 'select',
                'options'    => array(
                    'select_options' => array( 'normal', 'italic', 'oblique' ),
                    'default_val'    => 'normal',
                ),
            ),
            'font-size'   => array(
                'title'      => 'Font size',
                'input_type' => 'number',
                'options'    => array(
                    'suffix'      => 'px',
                    'default_val' => '14',
                ),
            ),
            'line-height' => array(
                'title'      => 'Line height',
                'input_type' => 'number',
                'options'    => array(
                    'suffix'      => 'px',
                    'default_val' => '22',
                ),
            ),
            'text-align'  => array(
                'title'      => 'Text align',
                'input_type' => 'select',
                'options'    => array(
                    'select_options' => array( 'left', 'center', 'right' ),
                    'default_val'    => 'left',
                ),
            ),
            'color'       => array(
                'title'      => 'Couleur du texte',
                'input_type' => 'color_picker',
                'options'    => array(
                    'default_val' => '#000000',
                ),
            ),
        );

        $image_style = array(
            'border-radius' => array(
                'title'      => 'Border radius',
                'input_type' => 'number',
                'options'    => array(
                    'suffix'      => 'px',
                    'default_val' => '0',
                ),
            ),
            'margin'   => array(
                'title'      => 'Marges basses',
                'input_type' => 'number',
                'options'    => array(
                    'class'       => 'margin',
                    'default_val' => '0',
                    'suffix'      => 'px',
                ),
            ),
            'width'   => array(
                'title'      => 'Largeur de l\'image',
                'input_type' => 'number',
                'options'    => array(
                    'suffix'      => 'px',
                ),
            ),
        );

        // Manage settings sections - add / remove sections here
        $this->managers = array( 
            array(
                'id'     => 'esg-settings-template',
                'title'  => 'Templates de signatures',
                'fields' => array(
                    'template' => array(
                        'title'      => 'Choix du layout',
                        'input_type' => 'template',
                        'options'    => array(
                            'default_val' => '_one',
                        ),
                    ),
                ),
            ),
            array(
                'id'     => 'esg-settings-branding',
                'title'  => 'Branding',
                'fields' => array(
                    'logo'          => array(
                        'title'      => 'Logo',
                        'input_type' => 'image',
                        'options'    => array(
                            'class'       => 'logo-image',
                            'default_val' => ESG_PLUGIN_URL . 'assets/img/default-logo.png',
                        ),
                        'style' => $image_style,
                    ),
                    'banner'        => array(
                        'title'      => 'Bannière',
                        'input_type' => 'image',
                        'options'    => array(
                            'class'       => 'banner-image',
                            'default_val' => ESG_PLUGIN_URL . 'assets/img/default-banner.png',
                        ),
                        'style' => $image_style,
                    ),
                    'banner_link'   => array(
                        'title'      => 'Lien bannière',
                        'input_type' => 'text',
                        'options'    => array(
                            'class'       => 'regular-text',
                            'placeholder' => 'https://studiokrack.fr',
                        ),
                    ),
                    'icon_size'     => array(
                        'title'      => 'Taille des icones',
                        'input_type' => 'number',
                        'options'    => array(
                            'suffix'      => 'px',
                            'default_val' => '20',
                            'min'         => '12',
                            'max'         => '40',
                        ),
                    ),
                    'icon_color'    => array(
                        'title'       => 'Couleur des icones',
                        'input_type'  => 'color_picker',
                        'default_val' => '#1e73be',
                    ),
                ),
            ),
            array(
                'id'     => 'esg-settings-general',
                'title'  => 'Informations générales',
                'fields' => array(
                    'font_family'     => array(
                        'title'      => 'Font family',
                        'input_type' => 'select',
                        'options'    => array(
                            'select_options' => array( 'Arial', 'Calibri', 'Cambria', 'Comic Sans MS', 'Courier', 'Georgia', 'Garamond', 'Helvetica', 'Open Sans', 'Serif', 'Sans Serif', 'Tahoma', 'Times New Roman', 'Trebuchet MS', 'Verdana' ),
                            'default_val'    => 'Arial',
                        ),
                    ),
                    'company_name'    => array(
                        'title'      => 'Nom de l\'entreprise',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => 'Ma Super Boite',
                        ),
                        'style'      => $text_style,
                    ),
                    'company_address' => array(
                        'title'      => 'Adresse',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '1801 rue de la victoire',
                        ),
                        'style'      => $text_style,
                    ),
                    'company_phone'   => array(
                        'title'      => 'Numéro de téléphone',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '01 02 03 04 05 06',
                        ),
                        'style'      => $text_style,
                    ),
                    'company_website' => array(
                        'title'      => 'Lien site internet (avec https://)',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => 'https://www.masuperboite.fr',
                        ),
                        'style'      => $text_style,
                    ),
                ),
            ),
            array(
                'id'     => 'esg-settings-userinfos',
                'title'  => 'Infos utilisateur',
                'fields' => array(
                    'user_firstname' => array(
                        'title'      => 'Prénom',
                        'input_type' => 'hidden',
                        'style'      => $text_style,
                        'options'    => array(
                            'default_val' => 'John',
                        ),
                        'required'   => true,
                    ),
                    'user_surname'   => array(
                        'title'      => 'Nom',
                        'input_type' => 'hidden',
                        'options'    => array(
                            'default_val' => 'Doe',
                        ),
                        'style'      => $text_style,
                        'required'   => true,
                    ),
                    'user_title'     => array(
                        'title'      => 'Fonction',
                        'input_type' => 'hidden',
                        'options'    => array(
                            'default_val' => 'CEO',
                        ),
                        'style'      => $text_style,
                        'required'   => true,
                    ),
                    'user_email'     => array(
                        'title'      => 'Email',
                        'input_type' => 'hidden',
                        'options'    => array(
                            'default_val' => 'john@doe.com',
                        ),
                        'style'      => $text_style,
                        'required'   => true,
                    ),
                    'user_mobile'    => array(
                        'title'      => 'Mobile',
                        'input_type' => 'hidden',
                        'options'    => array(
                            'default_val' => '0112336545',
                        ),
                        'style'      => $text_style,
                        'required'   => true,
                    ),
                ),
            ),
            array(
                'id'     => 'esg-settings-social',
                'title'  => 'Réseaux sociaux',
                'fields' => array(
                    'before_social_text'    => array(
                        'title'      => 'Label icones sociaux',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => __( 'Suivez-nous sur les réseaux sociaux', 'esg-plugin' ),
                        ),
                        'style'      => $text_style,
                    ),
                    'social_section_margin' => array(
                        'title'      => 'Marges verticales',
                        'input_type' => 'number',
                        'options'    => array(
                            'suffix'      => 'px',
                            'default_val' => '10',
                            'min'         => '0',
                            'max'         => '40',
                        ),
                    ),
                    'facebook_link'         => array(
                        'title'      => 'Url page Facebook',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '#',
                        ),
                    ),
                    'youtube_link'          => array(
                        'title'      => 'Url chaîne Youtube',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '#',
                        ),
                    ),
                    'linkedin_link'         => array(
                        'title'      => 'Url page Linkedin',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '#',
                        ),
                    ),
                    'instagram_link'        => array(
                        'title'      => 'Url compte Instagram',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '#',
                        ),
                    ),
                    'twitter_link'          => array(
                        'title'      => 'Url compte Twitter',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '#',
                        ),
                    ),
                ),
            ),
            array(
                'id'     => 'esg-settings-additional',
                'title'  => 'Contenu additionnel',
                'fields' => array(
                    'additional_content' => array(
                        'title'      => 'Mentions légales ou autre texte personnalisé',
                        'input_type' => 'textarea',
                        'style'      => $text_style,
                    ),
                ),
            ),
        );
    }

    public function set_default_val(){
        $this->getFields();
        $admin = new AdminApi();
        $admin->set_default_options($this->managers, $this->option_name);
    }
}
