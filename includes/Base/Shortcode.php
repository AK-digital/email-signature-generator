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

    public function get_company_data()
    {
        // Get plugin option data from the db

        $this->company_data = [

            // Layout
            'layout' => $this->options['layout'] ? $this->options['layout'] : 'standard-vertical',

            // Company details
            'font_family' => $this->options['font_family'] . ",'Sans Serif'",
            'company_name' => $this->options['company_name'],
            'baseline' => $this->options['baseline'],
            'phone' => $this->options['phone'],
            'website_url' => $this->options['website'],
            'address' => $this->options['address'],

            // Company social network links
            'facebook_url' => $this->options['facebook'],
            'youtube_url' => $this->options['youtube'],
            'twitter_url' => $this->options['twitter'],
            'tiktok_url' => $this->options['tiktok'],
            'instagram_url' => $this->options['instagram'],
            'linkedin_url' => $this->options['linkedin'],

            // Branding variables
            'logo' => $this->options['logo'],
            'banner' => $this->options['banner'],
            'text_color' => $this->options['text_color'],
            'icon_color' => $this->options['icon_color'],

            // More company variables
            'additional_content' => $this->options['additional_content'],
        ];
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
            'title' => get_user_meta($current_user->ID, 'esg_position', true),

            // Personal social network links
            'user_linkedin' => get_user_meta($current_user->ID, 'esg_linkedin', true),
        ];

            $this->generate_page();
        }
    }

    public function generate_page()
    {
        // Extract the array into vars
        extract($this->user_data);

        // Call the function to get company data and extract the array into vars
        $this->get_company_data();
        extract($this->company_data);

        //create website link name whithout https

        $website = $website_url;
        $website = preg_replace('#^https?://#', '',  $website);

        // Prepare the object, include the template and store in the $signature variable
        ob_start();
        include $this->templates_path . 'layouts/' . $layout . '.php';
        $signature = ob_get_clean();

        require_once($this->templates_path . 'landing.php');
    }
}
