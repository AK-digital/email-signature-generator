<?php
/**
 * @package emailSignatureGenerator
 */

namespace Includes\Base;

class BaseController {

    public $wc_check = false;

    public $field_managers = array();

    public function __construct() {

        // Check if Woocommerce plugin is active
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            $this->wc_check = true;
        }
    }

    /*
     * return signature object
     */
    public function generate_signature( array $user_data = array() ) {
        $option = get_option('esg_admin_settings');

        $opt_font_family = isset( $option['opt_font_family'] ) && !empty( $option['opt_font_family'] ) ? $option['opt_font_family'] : 'Arial';
        $icon_color      = isset( $option['icon_color'] ) && !empty( $option['icon_color'] ) ? $option['icon_color'] : '#000000';
        $icon_size       = isset( $option['icon_size'] ) && !empty( $option['icon_size'] ) ? $option['icon_size'] : '18px';

        /* Branding */
        $logo = '';
        if ( isset( $option['logo'] ) && !empty( $option['logo'] ) ) {
            $opt_logo_margin = isset( $option['logo_margin'] ) && !empty( $option['logo_margin'] ) ? $option['logo_margin'] : '';
            $logo_border_radius      = isset( $option['logo_border_radius'] ) && !empty( $option['logo_border_radius'] ) ? $option['logo_border_radius'] : '';
            $logo_width      = isset( $option['logo_width'] ) && !empty( $option['logo_width'] ) ? $option['logo_width'] : '';
            $logo_margin      = isset( $option['logo_margin'] ) && !empty( $option['logo_margin'] ) ? $option['logo_margin'] : '';
            $logo            = '<img class="logo" src="' . $option['logo'] . '" style="margin-bottom:' . $opt_logo_margin . 'px;border-radius:' . $logo_border_radius . 'px;width:' . $logo_width . 'px;" alt="company logo"/>';
        }

        $banner = '';
        if ( isset( $option['banner'] ) && !empty( $option['banner'] ) ) {
            $opt_banner_margin = isset( $option['banner_margin'] ) && !empty( $option['banner_margin'] ) ? $option['banner_margin'] : '';
            $banner_border_radius      = isset( $option['banner_border_radius'] ) && !empty( $option['banner_border_radius'] ) ? $option['banner_border_radius'] : '';
            $banner_width      = isset( $option['banner_width'] ) && !empty( $option['banner_width'] ) ? $option['banner_width'] : '';
            $banner_margin      = isset( $option['banner_margin'] ) && !empty( $option['banner_margin'] ) ? $option['banner_margin'] : '';

            $banner            = '<a href="/wp-json/email-signature-generator/v1/bannerlink"><img class="banner"  style="margin-bottom:' . $opt_banner_margin . 'px;border-radius:' . $banner_border_radius . 'px;width:' . $banner_width . 'px;" src="' . $option['banner'] . '" alt="company banner"/></a>';
        }

        /* Infos générales */
        $company_name = '';
        if ( isset( $option['company_name'] ) && !empty( $option['company_name'] ) ) {
            $company_name_font_weight = isset( $option['company_name_font_weight'] ) && !empty( $option['company_name_font_weight'] ) ? $option['company_name_font_weight'] : '';
            $company_name_font_style  = isset( $option['company_name_font_style'] ) && !empty( $option['company_name_font_style'] ) ? $option['company_name_font_style'] : '';
            $company_name_font_size   = isset( $option['company_name_font_size'] ) && !empty( $option['company_name_font_size'] ) ? $option['company_name_font_size'] : '';
            $company_name_line_height = isset( $option['company_name_line_height'] ) && !empty( $option['company_name_line_height'] ) ? $option['company_name_line_height'] : '';
            $company_name_text_align  = isset( $option['company_name_text_align'] ) && !empty( $option['company_name_text_align'] ) ? $option['company_name_text_align'] : '';
            $company_name_color       = isset( $option['company_name_color'] ) && !empty( $option['company_name_color'] ) ? $option['company_name_color'] : '';

            $company_name = '<span class="company-name" style="font-family:' . $opt_font_family . ';font-weight:' . $company_name_font_weight . ';font-style:' . $company_name_font_style . ';font-size:' . $company_name_font_size . 'px; line-height:' . $company_name_line_height . 'px;text-align:' . $company_name_text_align . ';color:' . $company_name_color . ';">' . $option['company_name'] . '</span>';
        }
        $company_phone = '';
        if ( isset( $option['company_phone'] ) && !empty( $option['company_phone'] ) ) {
            $company_phone_font_weight = isset( $option['company_phone_font_weight'] ) && !empty( $option['company_phone_font_weight'] ) ? $option['company_phone_font_weight'] : '';
            $company_phone_font_style  = isset( $option['company_phone_font_style'] ) && !empty( $option['company_phone_font_style'] ) ? $option['company_phone_font_style'] : '';
            $company_phone_font_size   = isset( $option['company_phone_font_size'] ) && !empty( $option['company_phone_font_size'] ) ? $option['company_phone_font_size'] : '';
            $company_phone_line_height = isset( $option['company_phone_line_height'] ) && !empty( $option['company_phone_line_height'] ) ? $option['company_phone_line_height'] : '';
            $company_phone_text_align  = isset( $option['company_phone_text_align'] ) && !empty( $option['company_phone_text_align'] ) ? $option['company_phone_text_align'] : '';
            $company_phone_color       = isset( $option['company_phone_color'] ) && !empty( $option['company_phone_color'] ) ? $option['company_phone_color'] : '';
            $company_phone             = '<span class="company-phone" style="font-family:' . $opt_font_family . ';font-weight:' . $company_phone_font_weight . ';font-style:' . $company_phone_font_style . ';font-size:' . $company_phone_font_size . 'px; line-height:' . $company_phone_line_height . 'px;text-align:' . $company_phone_text_align . ';color:' . $company_phone_color . ';">' . $option['company_phone'] . '</span>';
        }

        $company_address = '';
        if ( isset( $option['company_address'] ) && !empty( $option['company_address'] ) ) {
            $company_address = '<img src="' . ESG_PLUGIN_URL . 'assets/img/address-icon.png" width="' . $icon_size . 'px" style="vertical-align: middle;margin-right:5px;background-color:'
            . $icon_color . '"/><span class="company-address" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['company_address_font_weight'] ) && !empty( $option['company_address_font_weight'] ) ? $option['company_address_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['company_address_font_style'] ) && !empty( $option['company_address_font_style'] ) ? $option['company_address_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['company_address_font_size'] ) && !empty( $option['company_address_font_size'] ) ? $option['company_address_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['company_address_line_height'] ) && !empty( $option['company_address_line_height'] ) ? $option['company_address_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['company_address_text_align'] ) && !empty( $option['company_address_text_align'] ) ? $option['company_address_text_align'] : '' ) . ';color:'
            . ( isset( $option['company_address_color'] ) && !empty( $option['company_address_color'] ) ? $option['company_address_color'] : '' ) . ';">'
            . $option['company_address'] . '</span>';
        }

        $company_website = '';
        if ( isset( $option['company_website'] ) && !empty( $option['company_website'] ) ) {
            $company_website = esc_url( $option['company_website'] );

            if ( !empty( $company_website ) ) {
                $company_website = '<a href="' . $company_website . '" style="text-decoration:none!important;"><img src="'
                . ESG_PLUGIN_URL . 'assets/img/website-icon.png" width="'
                . $icon_size . 'px" style="vertical-align: middle;margin-right:5px;background-color:'
                . $icon_color . '"/><span class="company-website" style="font-family:'
                . $opt_font_family . ';font-weight:'
                . ( isset( $option['company_website_font_weight'] ) ? $option['company_website_font_weight'] : '' ) . ';font-style:'
                . ( isset( $option['company_website_font_style'] ) ? $option['company_website_font_style'] : '' ) . ';font-size:'
                . ( isset( $option['company_website_font_size'] ) ? $option['company_website_font_size'] : '' ) . 'px; line-height:'
                . ( isset( $option['company_website_line_height'] ) ? $option['company_website_line_height'] : '' ) . 'px;text-align:'
                . ( isset( $option['company_website_text_align'] ) ? $option['company_website_text_align'] : '' ) . ';color:'
                . ( isset( $option['company_website_color'] ) ? $option['company_website_color'] : '' ) . ';">'
                . $company_website . '</span></a>';
            }
        }

        /* User Infos */

        $user_firstname = '';

        if ( isset( $user_data['firstname'] ) && !empty( $user_data['firstname'] ) ) {
            $user_firstname = '<span class="user-firstname" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['user_firstname_font_weight'] ) ?$option['user_firstname_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['user_firstname_font_style'] ) ? $option['user_firstname_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['user_firstname_font_size'] ) ? $option['user_firstname_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['user_firstname_line_height'] ) ? $option['user_firstname_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['user_firstname_text_align'] ) ? $option['user_firstname_text_align'] : '' ) . ';color:'
            . ( isset( $option['user_firstname_color'] ) ? $option['user_firstname_color'] : '' ) . ';">'
            . $user_data['firstname'] . '</span>';
        }

        $user_surname = '';

        if ( isset( $user_data['surname'] ) && !empty( $user_data['surname'] ) ) {
            $user_surname = '<span class="user-surname" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['user_surname_font_weight'] ) ?$option['user_surname_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['user_surname_font_style'] ) ? $option['user_surname_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['user_surname_font_size'] ) ? $option['user_surname_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['user_surname_line_height'] ) ? $option['user_surname_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['user_surname_text_align'] ) ? $option['user_surname_text_align'] : '' ) . ';color:'
            . ( isset( $option['user_surname_color'] ) ? $option['user_surname_color'] : '' ) . ';">'
            . $user_data['surname'] . '</span>';
        }

        $user_title = '';
        if ( isset( $user_data['title'] ) && !empty( $user_data['title'] ) ) {
            $user_title = '<span class="user-title" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['user_title_font_weight'] ) ?$option['user_title_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['user_title_font_style'] ) ? $option['user_title_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['user_title_font_size'] ) ? $option['user_title_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['user_title_line_height'] ) ? $option['user_title_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['user_title_text_align'] ) ? $option['user_title_text_align'] : '' ) . ';color:'
            . ( isset( $option['user_title_color'] ) ? $option['user_title_color'] : '' ) . ';">'
            . $user_data['title'] . '</span>';
        }

        $user_email = '';
        if ( isset( $user_data['email'] ) && !empty( $user_data['email'] ) ) {
            $user_email = '<img src="' . ESG_PLUGIN_URL . 'assets/img/email-icon.png" width="' . $icon_size . 'px" style="margin-right:5px;vertical-align: middle;background-color:' . $icon_color . '"/><span class="user-email" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['user_email_font_weight'] ) ?$option['user_email_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['user_email_font_style'] ) ? $option['user_email_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['user_email_font_size'] ) ? $option['user_email_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['user_email_line_height'] ) ? $option['user_email_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['user_email_text_align'] ) ? $option['user_email_text_align'] : '' ) . ';color:'
            . ( isset( $option['user_email_color'] ) ? $option['user_email_color'] : '' ) . '!important;text-decoration:none!important;"><a style="color:'
            . ( isset( $option['user_email_color'] ) ? $option['user_email_color'] : '' ) . '!important;text-decoration:none!important;">'
            . $user_data['email'] . '</a></span>';
        }

        $user_mobile = '';
        if ( isset( $user_data['mobile'] ) && !empty( $user_data['mobile'] ) ) {
            $user_mobile = '<img src="' . ESG_PLUGIN_URL . 'assets/img/telephone-icon.png" width="' . $icon_size . 'px" style="margin-right:5px;vertical-align: middle;background-color:' . $icon_color . '; line-height:'
            . ( isset( $option['user_mobile_line_height'] ) ? $option['user_mobile_line_height'] : '' ) . 'px;"/><span class="user-mobile" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['user_mobile_font_weight'] ) ?$option['user_mobile_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['user_mobile_font_style'] ) ? $option['user_mobile_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['user_mobile_font_size'] ) ? $option['user_email_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['user_mobile_line_height'] ) ? $option['user_mobile_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['user_mobile_text_align'] ) ? $option['user_email_text_align'] : '' ) . ';color:'
            . ( isset( $option['user_mobile_color'] ) ? $option['user_mobile_color'] : '' ) . ';">'
            . $user_data['mobile'] . '</span>';
        }

        $user_linkedin = '';
        if ( isset( $user_data['user_linkedin'] ) && !empty( $user_data['user_linkedin'] ) ) {
            $user_linkedin = '<a href="' . $user_data['user_linkedin'] . '"><img class="linkedin-logo" style="vertical-align: baseline;" src="' . ESG_PLUGIN_URL . 'assets/img/user-linkedin.png" width="'
            . ( isset( $option['user_surname_font_size'] ) ? $option['user_surname_font_size'] : '' ) . 'px"/></a>';
        }

        /* Additionnal content */
        $additional_content = '';
        if ( isset( $option['additional_content'] ) && !empty( $option['additional_content'] ) ) {
            $additional_content = '<span class="additional-content" style="font-family:'
            . $opt_font_family . ';font-weight:'
            . ( isset( $option['additional_content_font_weight'] ) ?$option['additional_content_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['additional_content_font_style'] ) ? $option['additional_content_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['additional_content_font_size'] ) ? $option['additional_content_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['additional_content_line_height'] ) ? $option['additional_content_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['additional_content_text_align'] ) ? $option['additional_content_text_align'] : '' ) . ';color:'
            . ( isset( $option['additional_content_color'] ) ? $option['additional_content_color'] : '' ) . ';">'
            . $option['additional_content'] . '</span>';
        }

        /* Social icons */

        $before_social_text = '';
        if ( isset( $option['before_social_text'] ) && !empty( $option['before_social_text'] ) ) {
            $before_social_text = '<span class="before_social-text" style="font-family:' . $opt_font_family . ';vertical-align: middle;font-weight:'
            . ( isset( $option['before_social_text_font_weight'] ) ?$option['before_social_text_font_weight'] : '' ) . ';font-style:'
            . ( isset( $option['before_social_text_font_style'] ) ? $option['before_social_text_font_style'] : '' ) . ';font-size:'
            . ( isset( $option['before_social_text_font_size'] ) ? $option['before_social_text_font_size'] : '' ) . 'px; line-height:'
            . ( isset( $option['before_social_text_line_height'] ) ? $option['before_social_text_line_height'] : '' ) . 'px;text-align:'
            . ( isset( $option['before_social_text_text_align'] ) ? $option['before_social_text_text_align'] : '' ) . ';color:'
            . ( isset( $option['before_social_text_color'] ) ? $option['before_social_text_color'] : '' ) . ';">'
            . $option['before_social_text'] . '</span>';
        }

        $facebook_icon = '';
        if ( isset( $option['facebook_link'] ) && !empty( $option['facebook_link'] ) ) {
            $facebook_icon = '<a class="facebook-link" href="' . $option['facebook_link'] . '"><img class="facebook-icon" width="' . $icon_size . 'px" style="vertical-align: middle;background-color:' . $icon_color . '" src="' . ESG_PLUGIN_URL . 'assets/img/facebook-icon.png" alt="facebook icon"/></a>';
        }

        $instagram_icon = '';
        if ( isset( $option['instagram_link'] ) && !empty( $option['instagram_link'] ) ) {
            $instagram_icon = '<a class="instagram-link" href="' . $option['instagram_link'] . '"><img class="instagram-icon" width="' . $icon_size . 'px" style="vertical-align:middle;background-color:' . $icon_color . '" src="' . ESG_PLUGIN_URL . 'assets/img/instagram-icon.png" alt="instagram icon"/></a>';
        }

        $youtube_icon = '';
        if ( isset( $option['youtube_link'] ) && !empty( $option['youtube_link'] ) ) {
            $youtube_icon = '<a class="youtube-link" href="' . $option['youtube_link'] . '"><img class="youtube-icon" width="' . $icon_size . 'px" style="vertical-align:middle;background-color:' . $icon_color . '" src="' . ESG_PLUGIN_URL . 'assets/img/youtube-icon.png" alt="youtube icon"/></a>';
        }

        $linkedin_icon = '';
        if ( isset( $option['linkedin_link'] ) && !empty( $option['linkedin_link'] ) ) {
            $linkedin_icon = '<a class="linkedin-link" href="' . $option['linkedin_link'] . '"><img class="linkedin-icon" width="' . $icon_size . 'px" style="vertical-align:middle;background-color:' . $icon_color . '" src="' . ESG_PLUGIN_URL . 'assets/img/linkedin-icon.png" alt="linkedin icon"/></a>';
        }

        $twitter_icon = '';
        if ( isset( $option['twitter_link'] ) && !empty( $option['twitter_link'] ) ) {
            $twitter_icon = '<a class="twitter-link" href="' . $option['twitter_link'] . '"><img class="twitter-icon" width="' . $icon_size . 'px" style="vertical-align:middle;background-color:' . $icon_color . '" src="' . ESG_PLUGIN_URL . 'assets/img/twitter-icon.png" alt="twitter icon"/></a>';
        }

        if ( isset( $option['template'] ) && !empty( $option['template'] ) ) {
            // Prepare the object, include the template and store in the $signature variable
            ob_start();
            include ESG_PLUGIN_TEMPLATES . 'emails/' . $option['template'] . '.php';
            return ob_get_clean();
        }
    }
}
