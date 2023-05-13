<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Api;

use Includes\Api\SettingsApi;
use Includes\Api\Callbacks\AdminCallbacks;
use Includes\Api\Callbacks\ManagerCallbacks;

/**
 * Class AdminApi
 */
class AdminApi {

    /**
     * Holds the values to be used in the fields callbacks
     */

    public $fields = array();

    /**
     * @var
     */
    public $settings = array();

    /**
     * @var
     */
    public $callbacks = array();

    /**
     * @var
     */
    public $callbacks_mngr = array();

    /**
     * @var array
     */
    public $pages = array();


    /**
     * This function is triggered automatically from init.php
     */
    public function __construct() {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();
    }

    /**
     * Save the plugin settings on admin page update - see ManagerCallbacks.php to handle the sanitizer
     */
    public function setSettings( $opt_group, $opt_name ) {
         $args = array(
             array(
                 'option_group' => $opt_group,
                 'option_name'  => $opt_name,
                 'callback'     => array( $this->callbacks_mngr, 'sanitize' ),
             ),
         );

         $this->settings->setSettings( $args );
    }

    /**
     * Set WordPress admin page sections for the plugin
     */
    public function setSections( $managers ) {
         $args = array();

        foreach ( $managers as $manager ) {

            $args[] = array( // Set section from $managers
                'id'    => str_replace( '-', '_', $manager['id'] ),
                'title' => $manager['title'],
                'page'  => $manager['id'],
            );
        }

        $this->settings->setSections( $args );
    }

    /**
     * Get WordPress admin page fields for the plugin
     */
    public function setFields( $managers, $opt_name ) {
        $args = array();

        foreach ( $managers as $manager ) {

            if ( !isset( $manager['fields'] ) && empty( $manager['fields'] ) ) {
                continue;
            }

            foreach ( $manager['fields'] as $field_id => $field ) {
         
                $arg = array(
                    'id'       => str_replace( '-', '_', $field_id ),
                    'title'    => $field['title'],
                    'callback' => array( $this->callbacks_mngr, $field['input_type'] . '_field' ),
                    'page'     => $manager['id'],
                    'section'  => str_replace( '-', '_', $manager['id'] ),
                    'args'     => array(
                        'option_name' => $opt_name,
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
                        'id'       => str_replace( '-', '_', $field_id ) . '_required',
                        'title'    => 'Requis',
                        'callback' => array( $this->callbacks_mngr, 'checkbox_field' ),
                        'page'     => $manager['id'],
                        'section'  => str_replace( '-', '_', $manager['id'] ),
                        'args'     => array(
                            'option_name' => $opt_name,
                            'label_for'   => str_replace( '-', '_', $field_id ) . '_required',
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
                            'id'       => str_replace( '-', '_', $field_id ) . '_' . str_replace( '-', '_', $style_id ),
                            'title'    => $style_value['title'],
                            'callback' => array( $this->callbacks_mngr, $style_value['input_type'] . '_field' ),
                            'page'     => $manager['id'],
                            'section'  => str_replace( '-', '_', $manager['id'] ),
                            'args'     => array(
                                'option_name' => $opt_name,
                                'label_for'   =>str_replace( '-', '_', $field_id ) . '_' . str_replace( '-', '_', $style_id ),
                                'class'       => 'subsetting-' . $field_id,
                            ),
                        );

                        if ( isset( $style_value['options'] ) && !empty( $style_value['options'] ) ) {
                            $style['args'] += $style_value['options'];
                        }
                        $args[] = $style;
                    }
                }
            }
        }
        $this->settings->setFields( $args );
    }

    public function set_default_options( $managers, $opt_name ) {

        $default_options = array();

        foreach ( $managers as $manager ) {
            if ( $manager['fields'] ) {
                foreach ( $manager['fields'] as $key => $value ) {  // Set fields from $managers['fields']

                    if ( isset( $value['options']['default_val'] ) && !empty( $value['options']['default_val'] ) ) {
                        $default_options[ $key ] = $value['options']['default_val'];
                    }

                    if ( isset( $value['style'] ) && !empty( $value['style'] ) ) {
                        foreach ( $value['style'] as $k => $v ) {
                            $default_options[ str_replace( '-', '_', $key ) . '_' . str_replace( '-', '_', $k ) ] = $v['options']['default_val'];
                        }
                    }
                }
            }
        }
        update_option( $opt_name, $default_options );
    }
}

