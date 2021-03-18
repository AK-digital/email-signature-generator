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
            'setting_section_layout', // ID
            'Signature layouts', // Title
            array($this, 'print_section_info'), // Callback
            'esg-settings-layout' // Page
        );

        add_settings_section(
            'setting_section_general', // ID
            'Company general infos', // Title
            array($this, 'print_section_info'), // Callback
            'esg-settings-general' // Page
        );

        add_settings_section(
            'setting_section_social', // ID
            'Company social networks', // Title
            array($this, 'print_section_info'), // Callback
            'esg-settings-social' // Page
        );

        add_settings_section(
            'setting_section_branding', // ID
            'Company branding', // Title
            array($this, 'print_section_info'), // Callback
            'esg-settings-branding' // Page
        );

        add_settings_section(
            'setting_section_additional', // ID
            'Additional content', // Title
            array($this, 'print_section_info'), // Callback
            'esg-settings-additional' // Page
        );

        /**
         * GENERAL SETTINGS SECTION
         */

        // Field 1

        add_settings_field(
            'logo',
            'Company logo',
            array($this->callbacks, 'logo_callback'),
            'esg-settings-branding',
            'setting_section_branding'
        );

        // Field 2

        add_settings_field(
            'banner',
            'Company banner',
            array($this->callbacks, 'banner_callback'),
            'esg-settings-branding',
            'setting_section_branding'
        );

        // Field 2

        add_settings_field(
            'text_color',
            'Text color',
            array($this->callbacks, 'text_color_callback'),
            'esg-settings-branding',
            'setting_section_branding'
        );

        add_settings_field(
            'icon_color',
            'Icon color',
            array($this->callbacks, 'icon_color_callback'),
            'esg-settings-branding',
            'setting_section_branding'
        );

        add_settings_field(
            'link_color',
            'Links & highlights color',
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
            'Company name', // Title
            array($this->callbacks, 'company_name_callback'), // Callback
            'esg-settings-general', // Page
            'setting_section_general' // Section
        );

        // Field 4

        add_settings_field(
            'baseline',
            'Company baseline',
            array($this->callbacks, 'baseline_callback'),
            'esg-settings-general',
            'setting_section_general'
        );

        // Field 5

        add_settings_field(
            'address',
            'Company address',
            array($this->callbacks, 'address_callback'),
            'esg-settings-general',
            'setting_section_general'
        );

        // Field 6

        add_settings_field(
            'phone',
            'Company phone number',
            array($this->callbacks, 'phone_callback'),
            'esg-settings-general',
            'setting_section_general'
        );

        // Field 7

        add_settings_field(
            'website',
            'Company website',
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
            'Facebook page url',
            array($this->callbacks, 'facebook_callback'),
            'esg-settings-social',
            'setting_section_social'
        );

        // Field 9

        add_settings_field(
            'youtube',
            'Youtube channel url',
            array($this->callbacks, 'youtube_callback'),
            'esg-settings-social',
            'setting_section_social'
        );

        // Field 10

        add_settings_field(
            'linkedin',
            'Linkedin page url',
            array($this->callbacks, 'linkedin_callback'),
            'esg-settings-social',
            'setting_section_social'
        );

        // Field 11

        add_settings_field(
            'twitter',
            'Twitter account url',
            array($this->callbacks, 'twitter_callback'),
            'esg-settings-social',
            'setting_section_social'
        );

        // Field 12

        add_settings_field(
            'tiktok',
            'Tiktok account url',
            array($this->callbacks, 'tiktok_callback'),
            'esg-settings-social',
            'setting_section_social'
        );


        add_settings_field(
            'instagram',
            'Instagram account url',
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
            'standard-vertical',
            'Standard vertical',
            array($this->callbacks, 'standard_vertical_callback'),
            'esg-settings-layout',
            'setting_section_layout'
        );

        add_settings_field(
            'standard-vertical-inverse',
            'Standard vertical inversé',
            array($this->callbacks, 'standard_vertical_inverse_callback'),
            'esg-settings-layout',
            'setting_section_layout'
        );

        add_settings_field(
            'standard-horizontal',
            'Standard horizontal',
            array($this->callbacks, 'standard_horizontal_callback'),
            'esg-settings-layout',
            'setting_section_layout'
        );

        // LAYOUT SETTINGS SECTION END -------------

        /**
         * ADDITIONAL SETTINGS SECTION
         */

        // Field 13

        add_settings_field(
            'additional_content',
            'Additional content',
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
        print '<p>These infos will be displayed in every signature created with this plugin</p>';
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

        if (isset($input['layout']))
            $new_input['layout'] = $input['layout'];

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
