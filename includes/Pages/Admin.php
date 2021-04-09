<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Pages;

use Includes\Api\Callbacks\AdminCallbacks;
use Includes\Base\BaseController;

class Admin extends BaseController
{
    /**
     * Holds the values to be used in the fields callbacks
     */

    public $callbacks;

    public $fields = array();

    /**
     * This function is triggered automatically from init.php
     */
    public function register()
    {
        $this->callbacks = new AdminCallbacks();

        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));

    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_menu_page(
            'Email signature generator settings',
            'Email Signature',
            'manage_options',
            'esg-settings',
            array($this, 'create_admin_page'), 'dashicons-id'
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        return require_once( "$this->plugin_path/templates/admin.php" );
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'esg_option_group', // Option group
            'esg_admin_settings', // Option name
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'setting_section_template', // ID
            'Templates de signature', // Title
            array($this, 'print_section_info'), // Callback
            'esg-settings-template' // Page
        );

        add_settings_section(
            'setting_section_general', // ID
            'Informations générales', // Title
            array($this, 'print_section_info'), // Callback
            'esg-settings-general' // Page
        );

        add_settings_section(
            'setting_section_social', // ID
            'Réseaux sociaux', // Title
            array($this, 'print_section_info'), // Callback
            'esg-settings-social' // Page
        );

        add_settings_section(
            'setting_section_branding', // ID
            'Branding', // Title
            array($this, 'print_section_info'), // Callback
            'esg-settings-branding' // Page
        );

        add_settings_section(
            'setting_section_additional', // ID
            'Contenu additionnel', // Title
            array($this, 'print_section_info'), // Callback
            'esg-settings-additional' // Page
        );

        /**
         * GENERAL SETTINGS SECTION
         */

        // Field 1

        add_settings_field(
            'logo',
            'Logo',
            array($this->callbacks, 'logo_callback'),
            'esg-settings-branding',
            'setting_section_branding'
        );

        // Field 2

        add_settings_field(
            'banner',
            'Bannière',
            array($this->callbacks, 'banner_callback'),
            'esg-settings-branding',
            'setting_section_branding'
        );

        add_settings_field(
            'banner_link',
            'Lien bannière',
            array($this->callbacks, 'banner_link_callback'),
            'esg-settings-branding',
            'setting_section_branding'
        );

        // Field 2

        add_settings_field(
            'text_color',
            'Couleur du texte',
            array($this->callbacks, 'text_color_callback'),
            'esg-settings-branding',
            'setting_section_branding'
        );

        add_settings_field(
            'icon_color',
            'Couleur des icones',
            array($this->callbacks, 'icon_color_callback'),
            'esg-settings-branding',
            'setting_section_branding'
        );

        add_settings_field(
            'link_color',
            'Couleur des liens',
            array($this->callbacks, 'link_color_callback'),
            'esg-settings-branding',
            'setting_section_branding'
        );

        // Field 3

        add_settings_field(
            'font_family', // ID
            'Font family', // Title
            array($this->callbacks, 'font_family_callback'), // Callback
            'esg-settings-general', // Page
            'setting_section_general' // Section
        );

        add_settings_field(
            'company_name', // ID
            'Nom de l\'entreprise', // Title
            array($this->callbacks, 'company_name_callback'), // Callback
            'esg-settings-general', // Page
            'setting_section_general' // Section
        );

        // Field 4

        add_settings_field(
            'baseline',
            'Slogan',
            array($this->callbacks, 'baseline_callback'),
            'esg-settings-general',
            'setting_section_general'
        );

        // Field 5

        add_settings_field(
            'address',
            'Adresse',
            array($this->callbacks, 'address_callback'),
            'esg-settings-general',
            'setting_section_general'
        );

        // Field 6

        add_settings_field(
            'phone',
            'Numéro de téléphone',
            array($this->callbacks, 'phone_callback'),
            'esg-settings-general',
            'setting_section_general'
        );

        // Field 7

        add_settings_field(
            'website',
            'Lien site internet (avec https://)',
            array($this->callbacks, 'website_callback'),
            'esg-settings-general',
            'setting_section_general'
        );
        // GENERAL SETTINGS SECTION END -------------

        /**
         * SOCIAL SETTINGS SECTION
         */

        // Field 8

        add_settings_field(
            'facebook',
            'Url page Facebook',
            array($this->callbacks, 'facebook_callback'),
            'esg-settings-social',
            'setting_section_social'
        );

        // Field 9

        add_settings_field(
            'youtube',
            'Url chaîne Youtube',
            array($this->callbacks, 'youtube_callback'),
            'esg-settings-social',
            'setting_section_social'
        );

        // Field 10

        add_settings_field(
            'linkedin',
            'Url page Linkedin',
            array($this->callbacks, 'linkedin_callback'),
            'esg-settings-social',
            'setting_section_social'
        );

        // Field 11

        add_settings_field(
            'twitter',
            'Url compte Twitter',
            array($this->callbacks, 'twitter_callback'),
            'esg-settings-social',
            'setting_section_social'
        );

        // Field 12

        add_settings_field(
            'tiktok',
            'Url compte Tiktok',
            array($this->callbacks, 'tiktok_callback'),
            'esg-settings-social',
            'setting_section_social'
        );


        add_settings_field(
            'instagram',
            'Url compte Instagram',
            array($this->callbacks, 'instagram_callback'),
            'esg-settings-social',
            'setting_section_social'
        );
        // SOCCIAL SETTINGS SECTION END -------------


        /**
         * LAYOUTS SETTINGS SECTION
         */

        // Field 13

        add_settings_field(
            'studio-krack',
            'Template Studio Krack',
            array($this->callbacks, 'studio_krack_callback'),
            'esg-settings-template',
            'setting_section_template'
        );

//        add_settings_field(
//            'standard-vertical',
//            'Standard vertical',
//            array($this->callbacks, 'standard_vertical_callback'),
//            'esg-settings-template',
//            'setting_section_template'
//        );

//        add_settings_field(
//            'standard-horizontal',
//            'Standard horizontal',
//            array($this->callbacks, 'standard_horizontal_callback'),
//            'esg-settings-template',
//            'setting_section_template'
//        );

        // LAYOUT SETTINGS SECTION END -------------

        /**
         * ADDITIONAL SETTINGS SECTION
         */

        // Field 13

        add_settings_field(
            'additional_content',
            'Contenu additionnel',
            array($this->callbacks, 'additional_content_callback'),
            'esg-settings-additional',
            'setting_section_additional'
        );

        // ADDITIONAL SETTINGS SECTION END -------------
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print '<p>Ces informations seront affichées dans chaque signature créée avec ce plugin</p>';
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */

    public function sanitize($input)
    {
        $new_input = array();

        if (isset($input['logo']))
            $new_input['logo'] = $input['logo'];

        if (isset($input['banner']))
            $new_input['banner'] = $input['banner'];

        if (isset($input['banner_link']))
            $new_input['banner_link'] = sanitize_text_field($input['banner_link']);

        if (isset($input['company_name']))
            $new_input['company_name'] = sanitize_text_field($input['company_name']);

        if (isset($input['font_family']))
            $new_input['font_family'] = sanitize_text_field($input['font_family']);

        if (isset($input['baseline']))
            $new_input['baseline'] = sanitize_text_field($input['baseline']);

        if (isset($input['address']))
            $new_input['address'] = sanitize_text_field($input['address']);

        if (isset($input['phone']))
            $new_input['phone'] = sanitize_text_field($input['phone']);

        if (isset($input['website']))
            $new_input['website'] = sanitize_text_field($input['website']);

        if (isset($input['facebook']))
            $new_input['facebook'] = sanitize_text_field($input['facebook']);

        if (isset($input['youtube']))
            $new_input['youtube'] = sanitize_text_field($input['youtube']);

        if (isset($input['linkedin']))
            $new_input['linkedin'] = sanitize_text_field($input['linkedin']);

        if (isset($input['twitter']))
            $new_input['twitter'] = sanitize_text_field($input['twitter']);

        if (isset($input['tiktok']))
            $new_input['tiktok'] = sanitize_text_field($input['tiktok']);

        if (isset($input['instagram']))
            $new_input['instagram'] = sanitize_text_field($input['instagram']);

        if (isset($input['template']))
            $new_input['template'] = $input['template'];

        if (isset($input['additional_content']))
            $new_input['additional_content'] =  $input['additional_content'];

        // Validate text_color Color
        $text_color = trim( $input['text_color'] );
        $text_color = strip_tags( stripslashes( $text_color ) );

        // Check if is a valid hex color
        if( FALSE === $this->check_color( $text_color ) ) {

            // Set the error message
            add_settings_error( 'esg_admin_settings', 'text_color_error', 'Insert a valid color for text_color', 'error' ); // $setting, $code, $message, $type

            // Get the previous valid value
            $new_input['text_color'] = $this->options['text_color'];

        } else {

            $new_input['text_color'] = $text_color;
        }

        // Validate icon_color Color
        $icon_color = trim( $input['icon_color'] );
        $icon_color = strip_tags( stripslashes( $icon_color ) );

        // Check if is a valid hex color
        if( FALSE === $this->check_color( $icon_color ) ) {

            // Set the error message
            add_settings_error( 'esg_admin_settings', 'icon_color_error', 'Insert a valid color for icon_color', 'error' ); // $setting, $code, $message, $type

            // Get the previous valid value
            $new_input['icon_color'] = $this->options['icon_color'];

        } else {

            $new_input['icon_color'] = $icon_color;
        }

        // Validate link_color Color
        $link_color = trim( $input['link_color'] );
        $link_color = strip_tags( stripslashes( $link_color ) );

        // Check if is a valid hex color
        if( FALSE === $this->check_color( $link_color ) ) {

            // Set the error message
            add_settings_error( 'esg_admin_settings', 'link_color_error', 'Insert a valid color for link_color', 'error' ); // $setting, $code, $message, $type

            // Get the previous valid value
            $new_input['link_color'] = $this->options['link_color'];

        } else {

            $new_input['link_color'] = $text_color;
        }

        return $new_input;
    }

    public function check_color( $value ) {

        if ( preg_match( '/^#[a-f0-9]{6}$/i', $value ) ) { // if user insert a HEX color with #
            return true;
        }

        return false;
    }
}
