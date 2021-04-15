<?php
/**
 * @package  emailSignatureGenerator
 */
namespace Includes\Api;

class SettingsApi
{
    /**
     * @var array
     */
    public $admin_pages = array();

    /**
     * @var array
     */
    public $settings = array();

    /**
     * @var array
     */
    public $sections = array();

    /**
     * @var array
     */
    public $fields = array();

    /**
     *
     */
    public function register()
	{
		if ( ! empty($this->admin_pages) || ! empty($this->admin_subpages) ) {
			add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
		}

		if ( !empty($this->settings) ) {
			add_action( 'admin_init', array( $this, 'registerCustomFields' ) );
		}
	}

    /**
     * @param array $pages
     * @return $this
     */
    public function addPages(array $pages )
	{
		$this->admin_pages = $pages;

		return $this;
	}

    /**
     *
     */
    public function addAdminMenu()
	{
		foreach ( $this->admin_pages as $page ) {
			add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position'] );
		}
	}

    /**
     * @param array $settings
     * @return $this
     */
    public function setSettings(array $settings ): SettingsApi
    {
		$this->settings = $settings;

		return $this;
	}

    /**
     * @param array $sections
     * @return $this
     */
    public function setSections(array $sections ): SettingsApi
    {
		$this->sections = $sections;

		return $this;
	}

    /**
     * @param array $fields
     * @return $this
     */
    public function setFields(array $fields ): SettingsApi
    {
		$this->fields = $fields;

		return $this;
	}

    /**
     *
     */
    public function registerCustomFields()
	{
		// register setting
		foreach ( $this->settings as $setting ) {
			register_setting( $setting["option_group"], $setting["option_name"], ( isset( $setting["callback"] ) ? $setting["callback"] : '' ) );
		}

		// add settings section
		foreach ( $this->sections as $section ) {
			add_settings_section( $section["id"], $section["title"], ( isset( $section["callback"] ) ? $section["callback"] : '' ), $section["page"] );
		}

		// add settings field
		foreach ( $this->fields as $field ) {
			add_settings_field( $field["id"], $field["title"], ( isset( $field["callback"] ) ? $field["callback"] : '' ), $field["page"], $field["section"], ( isset( $field["args"] ) ? $field["args"] : '' ) );
		}
	}
}
