<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Base;

use Includes\Base\BaseController;

class Shortcode extends BaseController
{

    public $company_data = array();
    public $user_data = array();

    function register()
    {
        add_shortcode('esg_form', array($this, 'esg_form_shortcode_content'));
        add_shortcode('esg_user_data', array($this, 'esg_user_data_shortcode_content'));
    }

    public function esg_form_shortcode_content()
    {
        // If user form is empty, return the form
        if (!isset($_POST['submit'])) {
          require_once($this->templates_path . 'form.php');
        } //Display the landing signature page
        else {
            $this->user_data = [
                // Get the user data from the form
                'firstname' => $_REQUEST['firstname'],
                'surname' => $_REQUEST['surname'],
                'title' => $_REQUEST['title'],
                'mobile' => $_REQUEST['mobile'],
                'email' => $_REQUEST['email'],
                'user_linkedin' => $_REQUEST['linkedin'],
            ];

           $this->generate_page();
        }
    }

    public function esg_user_data_shortcode_content()
    {
        global $current_user;
        wp_get_current_user();

        if (is_user_logged_in()) {
            $this->user_data = [
                'firstname' => $current_user->display_name,
                'email' => $current_user->user_email,
                'mobile' => get_user_meta($current_user->ID, 'esg_phone', true),
                'title' => get_user_meta($current_user->ID, 'esg_title', true),

                // Personal social network links
                'user_linkedin' => get_user_meta($current_user->ID, 'esg_linkedin', true),
            ];

            $this->generate_page();
        }
    }

    public function generate_page()
    {
        // Extract the array into vars
        if($this->user_data) {
            extract($this->user_data);
        }

        // Call the function to get company data and extract the array into vars
        extract($this->options);

        //create website link name whithout https

        $website_url = $website;
        $website = preg_replace('#^https?://#', '', $website);

        // Prepare the object, include the template and store in the $signature variable
        ob_start();
        include $this->templates_path . 'emails/' . $template . '.php';
        $signature = ob_get_clean();

        require_once($this->templates_path . 'landing.php');
    }
}
