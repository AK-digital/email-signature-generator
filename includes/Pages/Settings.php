<?php
/**
 * @package emailSignatureGenerator
 */
namespace Includes\Pages;

use Includes\Api\AdminApi;

/**
 *
 */
class Settings {

    public $admin;
    public $subpages = array();
    public $managers = array();
    public $option_name = 'esg_settings';

    public function register() {

        $this->admin = new AdminApi();

        $this->setSubpages();
        $this->getFields();
        $this->admin->setSettings( $this->option_name, $this->option_name );
        $this->admin->setSections( $this->managers );
        $this->admin->setFields( $this->managers, $this->option_name );

        $this->admin->settings->addSubPages( $this->subpages )->register();
    }

    public function setSubpages() {
        $this->subpages = array(
            array(
                'parent_slug' => 'esg_template',
                'page_title'  => __( 'Paramètres', 'esg-plugin' ),
                'menu_title'  => __( 'Paramètres', 'esg-plugin' ),
                'capability'  => 'manage_options',
                'menu_slug'   => $this->option_name,
                'callback'    => array( $this->admin->callbacks, 'adminSettings' ),
            ),
        );
    }

    public function getFields() {
        $this->managers = array(
            array(
                'id'     => 'esg_main_settings',
                'title'  => __( 'Paramètres de mise à jour', 'esg-plugin' ),
                'fields' => array(
                    'show_on_edit_profile' => array(
                        'title'      => __( 'Affiche la signature sur les pages d\'édition profils des utilisateurs', 'esg-plugin' ),
                        'input_type' => 'checkbox',
                        'options'    => array(
                            'default_val' => true,
                        ),
                    ),
                    'show_on_view_profile' => array(
                        'title'      => __( 'Affiche la signature sur les pages consultation de profils des utilisateurs', 'esg-plugin' ),
                        'input_type' => 'checkbox',
                        'options'    => array(
                            'default_val' => 'AK-digital',
                        ),
                    ),
                    'allow_multiple'       => array(
                        'title'      => __( 'Créer plusieurs modèle de signature (Premium)', 'esg-plugin' ),
                        'input_type' => 'checkbox',
                        'options'    => array(
                            'default_val' => false,
                        ),
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
