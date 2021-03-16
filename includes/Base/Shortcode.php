<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Base;

use Includes\Base\BaseController;

class Shortcode extends BaseController
{


    function register()
    {
        add_shortcode('esg_form', array($this, 'esg_form_content'));
        add_shortcode('esg_user_data', array($this, 'esg_user_data_content'));
    }

    public function esg_form_content()
    {

        if (!isset($_POST['submit'])) {

            require_once($this->templates_path . 'form.php');

        } else {

            $firstname = $_REQUEST['firstname'];
            $surname = $_REQUEST['surname'];
            $title = $_REQUEST['title'];
            $mobile = $_REQUEST['mobile'];
            $email = $_REQUEST['email'];
            $linkedin_url = $_REQUEST['linkedin'];

            $layout = $this->options['layout'];
            // get plugin options

            // Get and process the template and store in the $signature variable
            ob_start();
            include $this->templates_path . 'layouts/' . $layout . '.php';
            $signature = ob_get_clean();

            require_once($this->templates_path . 'landing.php');
        }
    }

    public function esg_user_data_content()
    {
        global $current_user;
        wp_get_current_user();
        if (is_user_logged_in()) {
            $firstname = $current_user->display_name;
            $email = $current_user->user_email;

            if ($this->wc_check = true) {
                $mobile = get_user_meta($current_user->ID, 'billing_phone', true);

            } else {
                $mobile = get_user_meta($current_user->ID, 'esg_phone', true);
            }
            $mobile = get_user_meta($current_user->ID, 'esg_phone', true);
            $title = get_user_meta($current_user->ID, 'esg_position', true);

            // Personal social network links
            $linkedin_url = get_user_meta($current_user->ID, 'esg_linkedin', true);
        }

        $layout = $this->options['layout'] ? $this->options['layout'] : 'standard-vertical';

        // Details variables
        $company_name = $this->options['$company_name'];
        $baseline = $this->options['$baseline'];
        $phone = $this->options['phone'];
        $website = $this->options['website'];

        // Company social network links
        $facebook_url = $this->options['facebook'];
        $youtube_url = $this->options['youtube'];
        $twitter_url = $this->options['twitter'];
        $tiktok_url = $this->options['tiktok'];
        $instagram_url = $this->options['instagram'];
        $linkedin_url = $this->options['linkedin'];

        // Branding variables
        $logo = $this->options['logo'];
        $banner = $this->options['banner'];
        $text_color = $this->options['text_color'];
        $icon_color = $this->options['icon_color'];

        // More variables
        $additional_content = $this->options['additional_content'];

        // Get and process the template dynamically and store the object in the $signature variable
        ob_start();
        include $this->templates_path . 'layouts/' . $layout . '.php';
        $signature = ob_get_clean();

        require_once($this->templates_path . 'landing.php');
    }
}
