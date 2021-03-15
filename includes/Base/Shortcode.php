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

            $title = get_user_meta($current_user->ID, 'esg_position', true);

            // Personal social network links
            $linkedin_url = get_user_meta($current_user->ID, 'esg_linkedin', true);
        }

        $layout = $this->options['layout'] ? $this->options['layout'] : 'standard-vertical';

        // Company social network links
        $facebook_url = $options['facebook'];
        $youtube_url = $options['youtube'];
        $twitter_url = $options['twitter'];
        $tiktok_url = $options['tiktok'];
        $instagram_url = $options['instagram'];
        $linkedin_url = $options['linkedin'];

        // Get and process the template dynamically and store the object in the $signature variable
        ob_start();
        include $this->templates_path . 'layouts/' . $layout . '.php';
        $signature = ob_get_clean();

        require_once($this->templates_path . 'landing.php');
    }
}
