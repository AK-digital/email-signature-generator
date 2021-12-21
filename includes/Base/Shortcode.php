<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Base;

use Includes\Base\BaseController;

class Shortcode extends BaseController
{

    public $company_data = array();

    function register()
    {
        add_shortcode('esg_form', array($this, 'form_shortcode_content'));
        add_shortcode('esg_user_data', array($this, 'user_data_shortcode_content'));
    }

    public function form_shortcode_content()
    {
        // If user form is empty, return the form
        if (!isset($_POST['submit'])) {
            require_once($this->templates_path . 'form.php');
        }

        //Display the landing signature page
        else {
            $user_data = [
                // Get the user data from the form
                'firstname' => $_REQUEST['firstname'],
                'surname' => $_REQUEST['surname'],
                'title' => $_REQUEST['title'],
                'mobile' => $_REQUEST['mobile'],
                'email' => $_REQUEST['email'],
                'user_linkedin' => $_REQUEST['linkedin'],
            ];

            $signature = $this->generate_signature($user_data);

            require_once($this->templates_path . 'landing.php');
        }
    }

    public function user_data_shortcode_content()
    {
        global $current_user;
        wp_get_current_user();

        if (is_user_logged_in()) {
            $user_data = [
                'firstname' => $current_user->display_name,
                'email' => $current_user->user_email,
                'mobile' => get_user_meta($current_user->ID, 'esg_phone', true),
                'title' => get_user_meta($current_user->ID, 'esg_title', true),

                // Personal social network links
                'user_linkedin' => get_user_meta($current_user->ID, 'esg_linkedin', true),
            ];

            $signature = $this->generate_signature($user_data);

            require_once($this->templates_path . 'landing.php');
        }
    }
}
