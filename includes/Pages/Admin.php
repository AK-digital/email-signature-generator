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
 * @package Includes\Pages
 */
class Admin extends BaseController
{
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
    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->register();
    }


    /**
     * Set wordpress admin page for the plugin
     */
    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Email signature generator settings',
                'menu_title' => 'Email Signature',
                'capability' => 'manage_options',
                'menu_slug' => 'esg-settings',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-id',
                'position' => 110
            )
        );
    }

    /**
     * Save the plugin settings on admin page update - see ManagerCallbacks.php to handle the sanitizer
     */
    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'esg_option_group',
                'option_name' => 'esg_admin_settings',
                'callback' => array($this->callbacks_mngr, 'sanitize')
            )
        );

        $this->settings->setSettings($args);
    }

    /**
     * Set wordpress admin page sections for the plugin
     */
    public function setSections()
    {
        $args = array();

        foreach ($this->managers as $row) {

            $args[] = array( // Set section from $managers
                'id' => $this->toSlug($row['id']),
                'title' => $row['title'],
                'callback' => array($this, 'print_section_info'),
                'page' => $row['id'],
            );
        }

        $this->settings->setSections($args);
    }

    /**
     * et wordpress admin page fields for the plugin
     */
    public function setFields()
    {

        $args = array();
        foreach ($this->managers as $row) {

            if ($row['fields']) {

                foreach ($row['fields'] as $key => $value) {  // Set fields from $managers['fields']

                    $parent_class = $value['sub_settings'] ? 'parent-' . $key : '';

                    $args[] = [
                        'id' => $this->toSlug($key),
                        'title' => $value['title'],
                        'callback' => array($this->callbacks_mngr, $value['input_type'] . '_callback'),
                        'page' => $row['id'],
                        'section' => $this->toSlug($row['id']),
                        'args' => [
                            'option_name' => 'esg_admin_settings',
                            'label_for' => $key,
                            'class' => $parent_class,
                            'select_options' => $value['select_options'],
                        ],
                    ];

                    if ($value['sub_settings']) {

                        foreach ($value['sub_settings'] as $k => $v) {

                            $args[] = [
                                'id' => $this->toSlug($key) . '_' . $this->toSlug($k),
                                'title' => $v['title'],
                                'callback' => array($this->callbacks_mngr, $v['input_type'] . '_callback'),
                                'page' => $row['id'],
                                'section' => $this->toSlug($row['id']),
                                'args' => [
                                    'option_name' => 'esg_admin_settings',
                                    'label_for' => $this->toSlug($key) . '_' . $this->toSlug($k),
                                    'select_options' => $v['select_options'],
                                    'suffix' => $v['suffix'],
                                    'default_val' => $v['default_val'],
                                    'class' => 'subsetting-' . $key,
                                ],
                            ];
                        }
                    }
                }
            }
        }
        $this->settings->setFields($args);
    }

    /**
     * Print section subtitle infos
     */
    public
    function print_section_info()
    {
        print '<p>Ces informations seront affichées dans chaque signature créée avec ce plugin</p>';
    }

}
