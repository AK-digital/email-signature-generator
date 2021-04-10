<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Pages;

use Includes\Api\SettingsApi;
use Includes\Base\BaseController;
use Includes\Api\Callbacks\AdminCallbacks;
use Includes\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController
{
    /**
     * Holds the values to be used in the fields callbacks
     */

    public $fields = array();

    public $settings;

    public $callbacks;

    public $callbacks_mngr;

    public $pages = array();


    /**
     * This function is triggered automatically from init.php
     */
    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();


        $this->setPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages( $this->pages )->register();
    }


    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Email signature generator settings',
                'menu_title' => 'Email Signature',
                'capability' => 'manage_options',
                'menu_slug' => 'esg-settings',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-id',
                'position' => 110
            )
        );
    }

    public function setSettings()
    {
        $args = array(
            array(
                'esg_option_group', // Option group
                'esg_admin_settings', // Option name
                array($this->callbacks_mngr, 'sanitize') // Sanitize
            )
        );

        $this->settings->setSettings( $args );
    }



    public function setSections()
    {
        $args = array();

        foreach ( $this->section_managers as $key => $value ) {
            $args[] = array(
                'id' => str_replace('-','_', $key),
                'title' => $value,
                'callback' => array( $this, 'print_section_info'),
                'page' => $key,
            );
        }
        $this->settings->setSections( $args );
    }

    public function setFields()
    {
        $args = array();

        foreach ( $this->field_managers as $key => $value ) {
            $args[] = array(
                'id' => str_replace('-','_', $key),
                'title' => $value,
                'callback' => array( $this->callbacks, str_replace('-','_', $key) . '_callback' ),
                'page' => 'esg-settings-general',
                'section' => 'setting_section_general',
                'args' => array(
                    'option_name' => 'esg_admin_settings',
                    'label_for' => $key,
                    'class' => 'ui-toggle'
                )
            );
        }

        $this->settings->setFields( $args );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        return require_once( "$this->plugin_path/templates/admin.php" );
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print '<p>Ces informations seront affichées dans chaque signature créée avec ce plugin</p>';
    }



    public function check_color( $value ) {

        if ( preg_match( '/^#[a-f0-9]{6}$/i', $value ) ) { // if user insert a HEX color with #
            return true;
        }

        return false;
    }
}
