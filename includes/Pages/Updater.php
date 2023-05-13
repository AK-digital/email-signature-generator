<?php
/**
 * @package emailSignatureGenerator
 */
namespace Includes\Pages;

use Includes\Api\AdminApi;

/**
 *
 */
class Updater {

    public $admin;
    public $subpages = array();
    public $managers = array();
    public $option_name = 'esg_updater';
    
    public function register() {

        $this->admin = new AdminApi();

        $this->setSubpages();
        $this->getFields();
        $this->admin->setSettings( $this->option_name, $this->option_name );
        $this->admin->setSections( $this->managers );
        $this->admin->setFields( $this->managers, $this->option_name);

        $this->admin->settings->addSubPages( $this->subpages )->register();
    }

    public function setSubpages() {
        $this->subpages = array(
            array(
                'parent_slug' => 'esg_template',
                'page_title'  => __( 'Mises à jour', 'esg-plugin' ),
                'menu_title'  => __( 'Mises à jour', 'esg-plugin' ),
                'capability'  => 'manage_options',
                'menu_slug'   => $this->option_name,
                'callback'    => array( $this->admin->callbacks, 'adminUpdater' ),
            ),
        );
    }

    public function getFields() {
        $this->managers = array(
                            array(
                                'id'     => 'gh_options',
                                'title'  => __( 'Paramètres de mise à jour', 'esg-plugin' ),
                                'fields' => array(
                                    'gh_repo'     => array(
                                        'title'      => 'Github Repo',
                                        'input_type' => 'text',
                                        'options'    => array(
                                            'default_val' => 'email-signature-generator',
                                        ),
                                    ),
                                    'gh_username' => array(
                                        'title'      => 'Github Username',
                                        'input_type' => 'text',
                                        'options'    => array(
                                            'default_val' => 'AK-digital',
                                        ),
                                    ),
                                    'gh_auth'     => array(
                                        'title'      => 'Token Auth Github',
                                        'input_type' => 'password',
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
