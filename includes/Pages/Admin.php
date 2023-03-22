<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Pages;

use Includes\Api\SettingsApi;
use Includes\Base\BaseController;
use Includes\Api\Callbacks\AdminCallbacks;
use Includes\Api\Callbacks\ManagerCallbacks;

/**
 * Class Admin
 *
 * @package Includes\Pages
 */
class Admin extends BaseController {

    /**
     * Holds the values to be used in the fields callbacks
     */

    public $fields = array();

    /**
     * @var
     */
    public $settings;

    /**
     * @var
     */
    public $callbacks;

    /**
     * @var
     */
    public $callbacks_mngr;

    /**
     * @var array
     */
    public $pages = array();


    /**
     * This function is triggered automatically from init.php
     */
    public function register() {
         $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages( $this->pages )->register();
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
                 'menu_slug'  => 'esg-settings',
                 'callback'   => array( $this->callbacks, 'adminDashboard' ),
                 'icon_url'   => 'dashicons-id',
                 'position'   => 110,
             ),
         );
    }

    /**
     * Save the plugin settings on admin page update - see ManagerCallbacks.php to handle the sanitizer
     */
    public function setSettings() {
         $args = array(
             array(
                 'option_group' => 'esg_option_group',
                 'option_name'  => ESG_PLUGIN_SETTINGS,
                 'callback'     => array( $this->callbacks_mngr, 'sanitize' ),
             ),
         );

         $this->settings->setSettings( $args );
    }

    /**
     * Set WordPress admin page sections for the plugin
     */
    public function setSections() {
         $args = array();

        foreach ( $this->managers as $row ) {

            $args[] = array( // Set section from $managers
                'id'    => $this->slugify( $row['id'] ),
                'title' => $row['title'],
                'page'  => $row['id'],
            );
        }

        $this->settings->setSections( $args );
    }

    /**
     * Get WordPress admin page fields for the plugin
     */
    public function setFields() {
        $args = array();

        foreach ( $this->managers as $manager ) {

            if ( !isset( $manager['fields'] ) && empty( $manager['fields'] ) ) {
                continue;
            }

            foreach ( $manager['fields'] as $field_id => $field ) {

                $arg = array(
                    'id'       => $this->slugify( $field_id ),
                    'title'    => $field['title'],
                    'callback' => array( $this->callbacks_mngr, $field['input_type'] . '_field' ),
                    'page'     => $manager['id'],
                    'section'  => $this->slugify( $manager['id'] ),
                    'args'     => array(
                        'option_name' => ESG_PLUGIN_SETTINGS,
                        'label_for'   => $field_id,
                    ),
                );

                if ( isset( $field['options'] ) && !empty( $field['options'] ) ) {
                    $arg['args'] += $field['options'];
                }

               isset( $field['style'] ) && !empty( $field['style'] ) ? $arg['args']['class'] = 'parent-' . $field_id : '';

                $args[] = $arg;

                // Set required checkbox if required is set to true
                if ( isset( $field['required'] ) && $field['required'] === true ) {

                    $required = array(
                        'id'       => $this->slugify( $field_id ) . '_required',
                        'title'    => 'Requis',
                        'callback' => array( $this->callbacks_mngr, 'checkbox_field' ),
                        'page'     => $manager['id'],
                        'section'  => $this->slugify( $manager['id'] ),
                        'args'     => array(
                            'option_name' => ESG_PLUGIN_SETTINGS,
                            'label_for'   => $this->slugify( $field_id ) . '_required',
                            'class'       => 'required',
                        ),
                    );

                    if ( isset( $field['options'] ) && !empty( $field['options'] ) ) {
                        $required['args'] += $field['options'];
                    }
                    $args[] = $required;
                }

                if ( isset( $field['style'] ) && !empty( $field['style'] ) ) {

                    foreach ( $field['style'] as $style_id => $style_value ) {

                        $style = array(
                            'id'       => $this->slugify( $field_id ) . '_' . $this->slugify( $style_id ),
                            'title'    => $style_value['title'],
                            'callback' => array( $this->callbacks_mngr, $style_value['input_type'] . '_field' ),
                            'page'     => $manager['id'],
                            'section'  => $this->slugify( $manager['id'] ),
                            'args'     => array(
                                'option_name' => ESG_PLUGIN_SETTINGS,
                                'label_for'   => $this->slugify( $field_id ) . '_' . $this->slugify( $style_id ),
                                'class'       => 'subsetting-' . $field_id,
                            ),
                        );

                        if ( isset( $style_value['options'] ) && !empty( $style_value['options'] ) ) {
                            $style['args'] += $style_value['options'];
                        }
                        $args[] = $style;
                    }
                }

                // echo '<h3>$args</h3><pre>' . var_export( $args, true ) . '</pre>';
            }
        }
        $this->settings->setFields( $args );
    }
}

