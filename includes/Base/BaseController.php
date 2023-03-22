<?php
/**
 * @package emailSignatureGenerator
 */

namespace Includes\Base;

class BaseController {

    public $plugin_path;

    public $plugin_url;

    public $plugin;

    public $templates_path;

    public $wc_check = false;

    public $options;

    public $managers       = array();
    public $field_managers = array();

    public function __construct() {

        // Check if Woocommerce plugin is active
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            $this->wc_check = true;
        }

        $this->options = get_option( ESG_PLUGIN_SETTINGS );

        $style = array(
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
                    ),
                    'logo_margin'   => array(
                        'title'      => 'Marges verticales logo',
                        'input_type' => 'number',
                        'options'    => array(
                            'class'       => 'logo-margin',
                            'max'         => '100',
                            'default_val' => '0',
                            'suffix'      => 'px',
                        ),
                    ),
                    'banner'        => array(
                        'title'      => 'Bannière',
                        'input_type' => 'image',
                        'options'    => array(
                            'class'       => 'banner-image',
                            'default_val' => ESG_PLUGIN_URL . 'assets/img/default-banner.png',
                        ),
                    ),
                    'banner_margin' => array(
                        'title'      => 'Marges verticales bannière',
                        'input_type' => 'number',
                        'options'    => array(
                            'class'       => 'banner-margin',
                            'max'         => '100',
                            'default_val' => '0',
                            'suffix'      => 'px',
                        ),
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
                        ),
                    ),
                    'company_name'    => array(
                        'title'      => 'Nom de l\'entreprise',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => 'Ma Super Boite',
                        ),
                        'style'      => $style,
                    ),
                    'company_address' => array(
                        'title'      => 'Adresse',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '1801 rue de la victoire',
                        ),
                        'style'      => $style,
                    ),
                    'company_phone'   => array(
                        'title'      => 'Numéro de téléphone',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '01 02 03 04 05 06',
                        ),
                        'style'      => $style,
                    ),
                    'company_website' => array(
                        'title'      => 'Lien site internet (avec https://)',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => 'https://www.masuperboite.fr',
                        ),
                        'style'      => $style,
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
                        'style'      => $style,
                        'required'   => true,
                    ),
                    'user_surname'   => array(
                        'title'      => 'Nom',
                        'input_type' => 'hidden',
                        'style'      => $style,
                        'required'   => true,
                    ),
                    'user_title'     => array(
                        'title'      => 'Fonction',
                        'input_type' => 'hidden',
                        'style'      => $style,
                        'required'   => true,
                    ),
                    'user_email'     => array(
                        'title'      => 'Email',
                        'input_type' => 'hidden',
                        'style'      => $style,
                        'required'   => true,
                    ),
                    'user_mobile'    => array(
                        'title'      => 'Mobile',
                        'input_type' => 'hidden',
                        'style'      => $style,
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
                            'default_val' => __( 'Suivez-nous sur les réseaux sociaux', 'emailSignatureGenerator' ),
                        ),
                        'style'      => $style,
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
                        'style'      => $style,
                    ),
                ),
            ),
            array(
                'id'       => 'gh_options',
                'title'    => 'Update from Github',
                'has_cron' => false,
                'fields'   => array(
                    'repo'     => array(
                        'title'      => 'Github Repo',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => 'email-signature-generator',
                        ),
                    ),
                    'username' => array(
                        'title'      => 'Github Username',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => 'AK-digital',
                        ),
                    ),
                    'auth'     => array(
                        'title'      => 'Token Auth Github',
                        'input_type' => 'password',
                    ),
                ),
            ),
        );
    }

    /*
     * return signature object
     */
    public function generate_signature( array $user_data = array() ) {
        $option = $this->options;

        $opt_font_family = isset( $option['opt_font_family'] ) && !empty( $option['opt_font_family'] ) ? $option['opt_font_family'] : 'Arial';
        $icon_color      = isset( $option['icon_color'] ) && !empty( $option['icon_color'] ) ? $option['icon_color'] : '#000000';
        $icon_size       = isset( $option['icon_size'] ) && !empty( $option['icon_size'] ) ? $option['icon_size'] : '18px';

        /* Branding */
        $logo = '';
        if ( isset( $option['logo'] ) && !empty( $option['logo'] ) ) {
            $opt_logo_margin = isset( $option['logo_margin'] ) && !empty( $option['logo_margin'] ) ? $option['logo_margin'] : '';
            $logo            = '<img class="company-logo" src="' . $option['logo'] . '" style="margin-top:' . $opt_logo_margin . 'px; margin-bottom:' . $opt_logo_margin . 'px;" alt="company logo"/>';
        }

        $banner = '';
        if ( isset( $option['banner'] ) && !empty( $option['banner'] ) ) {
            $opt_banner_margin = isset( $option['banner_margin'] ) && !empty( $option['banner_margin'] ) ? $option['banner_margin'] : '';
            $banner            = '<a href="/wp-json/email-signature-generator/v1/bannerlink"><img class="company-banner"  style="margin-top:' . $opt_banner_margin . 'px; margin-bottom:' . $opt_banner_margin . 'px;" src="' . $option['banner'] . '" alt="company banner"/></a>';
        }

        /* Infos générales */
        $company_name = '';
        if ( isset( $option['company_name'] ) && !empty( $option['company_name'] ) ) {
            $company_name_font_weight = isset( $option['company_name_font_weight'] ) && !empty( $option['company_name_font_weight'] ) ? $option['company_name_font_weight'] : '';
            $company_name_font_style  = isset( $option['company_name_font_style'] ) && !empty( $option['company_name_font_style'] ) ? $option['company_name_font_style'] : '';
            $company_name_font_size   = isset( $option['company_name_font_size'] ) && !empty( $option['company_name_font_size'] ) ? $option['company_name_font_size'] : '';
            $company_name_line_height = isset( $option['company_name_line_height'] ) && !empty( $option['company_name_line_height'] ) ? $option['company_name_line_height'] : '';
            $company_name_text_align  = isset( $option['company_name_text_align'] ) && !empty( $option['company_name_text_align'] ) ? $option['company_name_text_align'] : '';
            $company_name_color       = isset( $option['company_name_color'] ) && !empty( $option['company_name_color'] ) ? $option['company_name_color'] : '';

            $company_name = '<span class="company-name" style="font-family:' . $opt_font_family . ';font-weight:' . $company_name_font_weight . ';font-style:' . $company_name_font_style . ';font-size:' . $company_name_font_size . 'px; line-height:' . $company_name_line_height . 'px;text-align:' . $company_name_text_align . ';color:' . $company_name_color . ';">' . $option['company_name'] . '</span>';
        }
        $company_phone = '';
        if ( isset( $option['company_phone'] ) && !empty( $option['company_phone'] ) ) {
            $company_phone_font_weight = isset( $option['company_phone_font_weight'] ) && !empty( $option['company_phone_font_weight'] ) ? $option['company_phone_font_weight'] : '';
            $company_phone_font_style  = isset( $option['company_phone_font_style'] ) && !empty( $option['company_phone_font_style'] ) ? $option['company_phone_font_style'] : '';
            $company_phone_font_size   = isset( $option['company_phone_font_size'] ) && !empty( $option['company_phone_font_size'] ) ? $option['company_phone_font_size'] : '';
            $company_phone_line_height = isset( $option['company_phone_line_height'] ) && !empty( $option['company_phone_line_height'] ) ? $option['company_phone_line_height'] : '';
            $company_phone_text_align  = isset( $option['company_phone_text_align'] ) && !empty( $option['company_phone_text_align'] ) ? $option['company_phone_text_align'] : '';
            $company_phone_color       = isset( $option['company_phone_color'] ) && !empty( $option['company_phone_color'] ) ? $option['company_phone_color'] : '';
            $company_phone             = '<span class="company-phone" style="font-family:' . $opt_font_family . ';font-weight:' . $company_phone_font_weight . ';font-style:' . $company_phone_font_style . ';font-size:' . $company_phone_font_size . 'px; line-height:' . $company_phone_line_height . 'px;text-align:' . $company_phone_text_align . ';color:' . $company_phone_color . ';">' . $option['company_phone'] . '</span>';
        }

        $company_address = '';
        if ( isset( $option['company_address'] ) && !empty( $option['company_address'] ) ) {
            $company_address = '<img src="' . ESG_PLUGIN_URL . 'assets/img/address-icon.png" width="' . $icon_size . 'px" style="vertical-align: middle;margin-right:5px;background-color:'
            . $icon_color . '"/><span class="company-address" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['company_address_font_weight'] ) && !empty( $option['company_address_font_weight'] ) ? $option['company_address_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['company_address_font_style'] ) && !empty( $option['company_address_font_style'] ) ? $option['company_address_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['company_address_font_size'] ) && !empty( $option['company_address_font_size'] ) ? $option['company_address_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['company_address_line_height'] ) && !empty( $option['company_address_line_height'] ) ? $option['company_address_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['company_address_text_align'] ) && !empty( $option['company_address_text_align'] ) ? $option['company_address_text_align'] : '' ) . ';color:'
            . ( isset( $option['company_address_color'] ) && !empty( $option['company_address_color'] ) ? $option['company_address_color'] : '' ) . ';">'
            . $option['company_address'] . '</span>';
        }

        $company_website = '';
        if ( isset( $option['company_website'] ) && !empty( $option['company_website'] ) ) {
            $company_website = esc_url( $option['company_website'] );

            if ( !empty( $company_website ) ) {
                $company_website = '<a href="' . $company_website . '" style="text-decoration:none!important;"><img src="'
                . ESG_PLUGIN_URL . 'assets/img/website-icon.png" width="'
                . $icon_size . 'px" style="vertical-align: middle;margin-right:5px;background-color:'
                . $icon_color . '"/><span class="company-website" style="font-family:'
                . $opt_font_family . ';font-weight:'
                . ( isset( $option['company_website_font_weight'] ) ? $option['company_website_font_weight'] : '' ) . ';font-style:'
                . ( isset( $option['company_website_font_style'] ) ? $option['company_website_font_style'] : '' ) . ';font-size:'
                . ( isset( $option['company_website_font_size'] ) ? $option['company_website_font_size'] : '' ) . 'px; line-height:'
                . ( isset( $option['company_website_line_height'] ) ? $option['company_website_line_height'] : '' ) . 'px;text-align:'
                . ( isset( $option['company_website_text_align'] ) ? $option['company_website_text_align'] : '' ) . ';color:'
                . ( isset( $option['company_website_color'] ) ? $option['company_website_color'] : '' ) . ';">'
                . $company_website . '</span></a>';
            }
        }

        /* User Infos */

        $user_firstname = '';

        if ( isset( $user_data['firstname'] ) && !empty( $user_data['firstname'] ) ) {
            $user_firstname = '<span class="user-firstname" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['user_firstname_font_weight'] ) ?$option['user_firstname_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['user_firstname_font_style'] ) ? $option['user_firstname_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['user_firstname_font_size'] ) ? $option['user_firstname_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['user_firstname_line_height'] ) ? $option['user_firstname_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['user_firstname_text_align'] ) ? $option['user_firstname_text_align'] : '' ) . ';color:'
            . ( isset( $option['user_firstname_color'] ) ? $option['user_firstname_color'] : '' ) . ';">'
            . $user_data['firstname'] . '</span>';
        }

        $user_surname = '';

        if ( isset( $user_data['surname'] ) && !empty( $user_data['surname'] ) ) {
            $user_surname = '<span class="user-surname" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['user_surname_font_weight'] ) ?$option['user_surname_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['user_surname_font_style'] ) ? $option['user_surname_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['user_surname_font_size'] ) ? $option['user_surname_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['user_surname_line_height'] ) ? $option['user_surname_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['user_surname_text_align'] ) ? $option['user_surname_text_align'] : '' ) . ';color:'
            . ( isset( $option['user_surname_color'] ) ? $option['user_surname_color'] : '' ) . ';">'
            . $user_data['surname'] . '</span>';
        }

        $user_title = '';
        if ( isset( $user_data['title'] ) && !empty( $user_data['title'] ) ) {
            $user_title = '<span class="user-title" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['user_title_font_weight'] ) ?$option['user_title_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['user_title_font_style'] ) ? $option['user_title_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['user_title_font_size'] ) ? $option['user_title_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['user_title_line_height'] ) ? $option['user_title_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['user_title_text_align'] ) ? $option['user_title_text_align'] : '' ) . ';color:'
            . ( isset( $option['user_title_color'] ) ? $option['user_title_color'] : '' ) . ';">'
            . $user_data['title'] . '</span>';
        }

        $user_email = '';
        if ( isset( $user_data['email'] ) && !empty( $user_data['email'] ) ) {
            $user_email = '<img src="' . ESG_PLUGIN_URL . 'assets/img/email-icon.png" width="' . $icon_size . 'px" style="margin-right:5px;vertical-align: middle;background-color:' . $icon_color . '"/><span class="user-email" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['user_email_font_weight'] ) ?$option['user_email_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['user_email_font_style'] ) ? $option['user_email_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['user_email_font_size'] ) ? $option['user_email_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['user_email_line_height'] ) ? $option['user_email_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['user_email_text_align'] ) ? $option['user_email_text_align'] : '' ) . ';color:'
            . ( isset( $option['user_email_color'] ) ? $option['user_email_color'] : '' ) . '!important;text-decoration:none!important;"><a style="color:'
            . ( isset( $option['user_email_color'] ) ? $option['user_email_color'] : '' ) . '!important;text-decoration:none!important;">'
            . $user_data['email'] . '</a></span>';
        }

        $user_mobile = '';
        if ( isset( $user_data['mobile'] ) && !empty( $user_data['mobile'] ) ) {
            $user_mobile = '<img src="' . ESG_PLUGIN_URL . 'assets/img/telephone-icon.png" width="' . $icon_size . 'px" style="margin-right:5px;vertical-align: middle;background-color:' . $icon_color . '; line-height:'
            . ( isset( $option['user_mobile_line_height'] ) ? $option['user_mobile_line_height'] : '' ) . 'px;"/><span class="user-mobile" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['user_mobile_font_weight'] ) ?$option['user_mobile_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['user_mobile_font_style'] ) ? $option['user_mobile_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['user_mobile_font_size'] ) ? $option['user_email_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['user_mobile_line_height'] ) ? $option['user_mobile_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['user_mobile_text_align'] ) ? $option['user_email_text_align'] : '' ) . ';color:'
            . ( isset( $option['user_mobile_color'] ) ? $option['user_mobile_color'] : '' ) . ';">'
            . $user_data['mobile'] . '</span>';
        }

        $user_linkedin = '';
        if ( isset( $user_data['user_linkedin'] ) && !empty( $user_data['user_linkedin'] ) ) {
            $user_linkedin = '<a href="' . $user_data['user_linkedin'] . '"><img class="linkedin-logo" style="vertical-align: baseline;" src="' . ESG_PLUGIN_URL . 'assets/img/user-linkedin.png" width="'
            . ( isset( $option['user_surname_font_size'] ) ? $option['user_surname_font_size'] : '' ) . 'px"/></a>';
        }

        /* Additionnal content */

        $additional_content = '';
        if ( isset( $option['additional_content'] ) && !empty( $option['additional_content'] ) ) {
            $additional_content = '<span class="additional-content" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['user_additional_content_font_weight'] ) ?$option['user_additional_content_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['user_additional_content_font_style'] ) ? $option['user_additional_content_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['user_additional_content_font_size'] ) ? $option['user_additional_content_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['user_additional_content_line_height'] ) ? $option['user_additional_content_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['user_additional_content_text_align'] ) ? $option['user_additional_content_text_align'] : '' ) . ';color:'
            . ( isset( $option['user_additional_content_color'] ) ? $option['user_additional_content_color'] : '' ) . ';">'
            . $option['additional_content'] . '</span>';
        }

        /* Social icons */

        $before_social_text = '';
        if ( isset( $option['before_social_text'] ) && !empty( $option['before_social_text'] ) ) {
            $before_social_text = '<span class="before_social-text" style="font-family:' . $opt_font_family . ';vertical-align: middle;font-weight:'
            . ( isset( $option['user_before_social_text_font_weight'] ) ?$option['user_before_social_text_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['user_before_social_text_font_style'] ) ? $option['user_before_social_text_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['user_before_social_text_font_size'] ) ? $option['user_before_social_text_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['user_before_social_text_line_height'] ) ? $option['user_before_social_text_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['user_before_social_text_text_align'] ) ? $option['user_before_social_text_text_align'] : '' ) . ';color:'
            . ( isset( $option['user_before_social_text_color'] ) ? $option['user_before_social_text_color'] : '' ) . ';">'
            . $option['before_social_text'] . '</span>';
        }

        $facebook_icon = '';
        if ( isset( $option['facebook_link'] ) && !empty( $option['facebook_link'] ) ) {
            $facebook_icon = '<a href="' . $option['facebook_link'] . '"><img class="facebook-icon" width="' . $icon_size . 'px" style="vertical-align: middle;background-color:' . $icon_color . '" src="' . ESG_PLUGIN_URL . 'assets/img/facebook-icon.png" alt="facebook icon"/></a>';
        }

        $instagram_icon = '';
        if ( isset( $option['instagram_link'] ) && !empty( $option['instagram_link'] ) ) {
            $instagram_icon = '<a href="' . $option['instagram_link'] . '"><img class="instagram-icon" width="' . $icon_size . 'px" style="vertical-align:middle;background-color:' . $icon_color . '" src="' . ESG_PLUGIN_URL . 'assets/img/instagram-icon.png" alt="instagram icon"/></a>';
        }

        $youtube_icon = '';
        if ( isset( $option['youtube_link'] ) && !empty( $option['youtube_link'] ) ) {
            $youtube_icon = '<a href="' . $option['youtube_link'] . '"><img class="youtube-icon" width="' . $icon_size . 'px" style="vertical-align:middle;background-color:' . $icon_color . '" src="' . ESG_PLUGIN_URL . 'assets/img/youtube-icon.png" alt="youtube icon"/></a>';
        }

        $linkedin_icon = '';
        if ( isset( $option['linkedin_link'] ) && !empty( $option['linkedin_link'] ) ) {
            $linkedin_icon = '<a href="' . $option['linkedin_link'] . '"><img class="linkedin-icon" width="' . $icon_size . 'px" style="vertical-align:middle;background-color:' . $icon_color . '" src="' . ESG_PLUGIN_URL . 'assets/img/linkedin-icon.png" alt="linkedin icon"/></a>';
        }

        $twitter_icon = '';
        if ( isset( $option['twitter_link'] ) && !empty( $option['twitter_link'] ) ) {
            $twitter_icon = '<a href="' . $option['twitter_link'] . '"><img class="twitter-icon" width="' . $icon_size . 'px" style="vertical-align:middle;background-color:' . $icon_color . '" src="' . ESG_PLUGIN_URL . 'assets/img/twitter-icon.png" alt="twitter icon"/></a>';
        }

        if ( isset( $option['template'] ) && !empty( $option['template'] ) ) {
            // Prepare the object, include the template and store in the $signature variable
            ob_start();
            include ESG_PLUGIN_TEMPLATES . 'emails/' . $option['template'] . '.php';
            return ob_get_clean();
        }
    }

    public function slugify( $id ) {
        $slug = str_replace( '-', '_', $id ); //change middlescores to underscores
        return $slug;
    }
}
