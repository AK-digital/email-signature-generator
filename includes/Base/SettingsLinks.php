<?php
/**
 * @package  emailSignatureGenerator
 */
namespace Includes\Base;

use Includes\Base\BaseController;

class SettingsLinks extends BaseController {

    public function register() {
        add_filter( 'plugin_action_links_' . ESG_PLUGIN_BASENAME, array( $this, 'settings_link' ) );
    }

    public function settings_link( $links ) {

        $settings_link = '<a href="/wp-admin/admin.php?page=esg_settings">'. __('Paramètres','esg-plugin'). '</a>';
        array_push( $links, $settings_link );
        $template_link = '<a href="/wp-admin/admin.php?page=esg_template">'. __('Créer votre signature','esg-plugin'). '</a>';
        array_push( $links, $template_link );
        return $links;
    }
}
