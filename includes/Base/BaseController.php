<?php
/**
 * @package emailSignatureGenerator
 */

namespace Includes\Base;

class BaseController {

    public $plugin_path;

    public $plugin_url;

    public $plugin;

    public $templates_path;

    public $wc_check = false;

    public $options;

    public $managers       = array();
    public $field_managers = array();

    public function __construct() {

        // Check if Woocommerce plugin is active
        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            $this->wc_check = true;
        }

        $this->options = get_option( ESG_PLUGIN_SETTINGS );

        $style = array(
            'font-weight' => array(
                'title'          => 'Font weight',
                'input_type'     => 'select',
                'select_options' => array( '300', '400', '500', '600', '700', '800', '900' ),
                'default_val'    => '400',
            ),
            'font-style'  => array(
                'title'          => 'Font style',
                'input_type'     => 'select',
                'select_options' => array( 'normal', 'italic', 'oblique' ),
                'default_val'    => 'normal',
            ),
            'font-size'   => array(
                'title'       => 'Font size',
                'input_type'  => 'number',
                'suffix'      => 'px',
                'default_val' => '14',
            ),
            'line-height' => array(
                'title'       => 'Line height',
                'input_type'  => 'number',
                'suffix'      => 'px',
                'default_val' => '22',
            ),
            'text-align'  => array(
                'title'          => 'Text align',
                'input_type'     => 'select',
                'select_options' => array( 'left', 'center', 'right' ),
                'default_val'    => 'left',
            ),
            'color'       => array(
                'title'       => 'Couleur du texte',
                'input_type'  => 'color_picker',
                'class'       => '',
                'default_val' => '#000000',
            ),
        );

        // Manage settings sections - add / remove sections here
        $this->managers = array(
            array(
                'id'     => 'esg-settings-template',
                'title'  => 'Templates de signatures',
                'fields' => array(
                    'template' => array(
                        'title'       => 'Choix du layout',
                        'input_type'  => 'template',
                        'options'    => array(
                            'default_val' => '_one',
                        ),
                    ),
                ),
            ),
            array(
                'id'     => 'esg-settings-branding',
                'title'  => 'Branding',
                'fields' => array(
                    'logo'          => array(
                        'title'      => 'Logo',
                        'input_type' => 'image',
                        'options'    => array(
                            'class'       => 'logo-image',
                            'default_val' => ESG_PLUGIN_URL . 'assets/img/default-logo.png',
                        ),
                    ),
                    'logo_margin'   => array(
                        'title'      => 'Marges verticales logo',
                        'input_type' => 'number',
                        'options'    => array(
                            'class'       => 'logo-margin',
                            'max'         => '100',
                            'default_val' => '0',
                            'suffix'      => 'px',
                        ),
                    ),
                    'banner'        => array(
                        'title'      => 'Bannière',
                        'input_type' => 'image',
                        'options'    => array(
                            'class'       => 'banner-image',
                            'default_val' => ESG_PLUGIN_URL . 'assets/img/default-banner.png',
                        ),
                    ),
                    'banner_margin' => array(
                        'title'      => 'Marges verticales bannière',
                        'input_type' => 'number',
                        'options'    => array(
                            'class'       => 'banner-margin',
                            'max'         => '100',
                            'default_val' => '0',
                            'suffix'      => 'px',
                        ),
                    ),
                    'banner_link'   => array(
                        'title'      => 'Lien bannière',
                        'input_type' => 'text',
                        'options'    => array(
                            'class'       => 'regular-text',
                            'placeholder' => 'https://studiokrack.fr',
                        ),
                    ),
                    'icon_size'     => array(
                        'title'      => 'Taille des icones',
                        'input_type' => 'number',
                        'options'    => array(
                            'class'       => '',
                            'suffix'      => 'px',
                            'default_val' => '20',
                            'min'         => '12',
                            'max'         => '40',
                        ),
                    ),
                    'icon_color'    => array(
                        'title'       => 'Couleur des icones',
                        'input_type'  => 'color_picker',
                        'class'       => '',
                        'default_val' => '#1e73be',
                    ),

                ),
            ),
            array(
                'id'     => 'esg-settings-general',
                'title'  => 'Informations générales',
                'fields' => array(
                    'font_family'     => array(
                        'title'          => 'Font family',
                        'input_type'     => 'select',
                        'select_options' => array( 'Arial', 'Calibri', 'Cambria', 'Comic Sans MS', 'Courier', 'Georgia', 'Garamond', 'Helvetica', 'Open Sans', 'Serif', 'Sans Serif', 'Tahoma', 'Times New Roman', 'Trebuchet MS', 'Verdana' ),
                    ),
                    'company_name'    => array(
                        'title'      => 'Nom de l\'entreprise',
                        'input_type' => 'text',
                        'options'    => array(
                            'style'       => $style,
                            'default_val' => 'Ma Super Boite',
                        ),
                    ),
                    'company_address' => array(
                        'title'      => 'Adresse',
                        'input_type' => 'text',
                        'options'    => array(
                            'style'       => $style,
                            'default_val' => '1801 rue de la victoire',
                        ),
                    ),
                    'company_phone'   => array(
                        'title'      => 'Numéro de téléphone',
                        'input_type' => 'text',
                        'options'    => array(
                            'style'       => $style,
                            'default_val' => '01 02 03 04 05 06',
                        ),
                    ),
                    'company_website' => array(
                        'title'      => 'Lien site internet (avec https://)',
                        'input_type' => 'text',
                        'options'    => array(
                            'style'       => $style,
                            'default_val' => 'https://www.masuperboite.fr',
                        ),
                    ),
                ),
            ),

            array(
                'id'     => 'esg-settings-userinfos',
                'title'  => 'Infos utilisateur',
                'fields' => array(
                    'user_firstname' => array(
                        'title'      => 'Prénom',
                        'input_type' => 'hidden',
                        'options'    => array(
                            'style'    => $style,
                            'class'    => 'required',
                            'required' => array(
                                'title'      => 'Requis',
                                'input_type' => 'checkbox',
                            ),
                        ),
                    ),
                    'user_surname'   => array(
                        'title'      => 'Nom',
                        'input_type' => 'hidden',
                        'options'    => array(
                            'style'    => $style,
                            'class'    => 'required',
                            'required' => array(
                                'title'      => 'Requis',
                                'input_type' => 'checkbox',
                            ),
                        ),
                    ),
                    'user_title'     => array(
                        'title'      => 'Fonction',
                        'input_type' => 'hidden',
                        'options'    => array(
                            'style'    => $style,
                            'class'    => 'required',
                            'required' => array(
                                'title'      => 'Requis',
                                'input_type' => 'checkbox',
                            ),
                        ),
                    ),
                    'user_email'     => array(
                        'title'      => 'Email',
                        'input_type' => 'hidden',
                        'options'    => array(
                            'style'    => $style,
                            'class'    => 'required',
                            'required' => array(
                                'title'      => 'Requis',
                                'input_type' => 'checkbox',
                            ),
                        ),
                    ),
                    'user_mobile'    => array(
                        'title'      => 'Mobile',
                        'input_type' => 'hidden',
                        'options'    => array(
                            'style'    => $style,
                            'class'    => 'required',
                            'required' => array(
                                'title'      => 'Requis',
                                'input_type' => 'checkbox',
                            ),
                        ),
                    ),
                ),
            ),
            array(
                'id'     => 'esg-settings-social',
                'title'  => 'Réseaux sociaux',
                'fields' => array(
                    'before_social_text'    => array(
                        'title'      => 'Label icones sociaux',
                        'input_type' => 'text',
                        'options'    => array(
                            'style'       => $style,
                            'default_val' => __( 'Suivez-nous sur les réseaux sociaux', 'emailSignatureGenerator' ),
                        ),
                    ),
                    'social_section_margin' => array(
                        'title'      => 'Marges verticales',
                        'input_type' => 'number',
                        'options'    => array(
                            'suffix'      => 'px',
                            'default_val' => '10',
                            'min'         => '0',
                            'max'         => '40',
                        ),
                    ),
                    'facebook_link'         => array(
                        'title'      => 'Url page Facebook',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '#',
                        ),
                    ),
                    'youtube_link'          => array(
                        'title'      => 'Url chaîne Youtube',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '#',
                        ),
                    ),
                    'linkedin_link'         => array(
                        'title'      => 'Url page Linkedin',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '#',
                        ),
                    ),
                    'instagram_link'        => array(
                        'title'      => 'Url compte Instagram',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '#',
                        ),
                    ),
                    'twitter_link'          => array(
                        'title'      => 'Url compte Twitter',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => '#',
                        ),
                    ),
                ),
            ),
            array(
                'id'     => 'esg-settings-additional',
                'title'  => 'Contenu additionnel',
                'fields' => array(
                    'additional_content' =>
                        array(
                            'title'      => 'Mentions légales ou autre texte personnalisé',
                            'input_type' => 'textarea',
                            'options'    => array(
                                'style' => $style,
                            ),
                        ),
                ),
            ),
            array(
                'id'       => 'gh_options',
                'title'    => 'Update from Github',
                'has_cron' => false,
                'fields'   => array(
                    'repo'     => array(
                        'title'      => 'Github Repo',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => 'email-signature-generator',
                        ),
                    ),
                    'username' => array(
                        'title'      => 'Github Username',
                        'input_type' => 'text',
                        'options'    => array(
                            'default_val' => 'AK-digital',
                        ),
                    ),
                    'auth'     => array(
                        'title'      => 'Token Auth Github',
                        'input_type' => 'password',
                    ),
                ),
            ),
        );
    }

    /*
     * return signature object
     */
    public function generate_signature( $user_data = '' ) {
        $option = $this->options;

        /* Branding */

        $logo = '';
        if ( $option['logo'] ) {
            $logo = '<img class="company-logo" src="' . $option['logo'] . '" style="margin-top:' . $option['logo_margin'] . 'px; margin-bottom:' . $option['logo_margin'] . 'px;" alt="company logo"/>';
        }

        $banner = '';
        if ( $option['banner'] ) {
            $banner = '<a href="/wp-json/email-signature-generator/v1/bannerlink"><img class="company-banner"  style="margin-top:' . $option['banner_margin'] . 'px; margin-bottom:' . $option['banner_margin'] . 'px;" src="' . $option['banner'] . '" alt="company banner"/></a>';
        }

        /* Infos générales */
        $company_name = '';
        if ( $option['company_name'] ) {
            $company_name = '<span class="company-name" style="font-family:' . $option['font_family'] . ';font-weight:' . $option['company_name_font_weight'] . ';font-style:' . $option['company_name_font_style'] . ';font-size:' . $option['company_name_font_size'] . 'px; line-height:' . $option['company_name_line_height'] . 'px;text-align:' . $option['company_name_text_align'] . ';color:' . $option['company_name_color'] . ';">' . $option['company_name'] . '</span>';
        }
        $company_phone = '';
        if ( $option['company_phone'] ) {
            $company_phone = '<span class="company-phone" style="font-family:' . $option['font_family'] . ';font-weight:' . $option['company_phone_font_weight'] . ';font-style:' . $option['company_phone_font_style'] . ';font-size:' . $option['company_phone_font_size'] . 'px; line-height:' . $option['company_phone_line_height'] . 'px;text-align:' . $option['company_phone_text_align'] . ';color:' . $option['company_phone_color'] . ';">' . $option['company_phone'] . '</span>';
        }

        $company_address = '';
        if ( $option['company_address'] ) {
            $company_address = '<img src="' . ESG_PLUGIN_URL . 'assets/img/address-icon.png" width="' . $option['icon_size'] . 'px" style="vertical-align: middle;margin-right:5px;background-color:' . $option['icon_color'] . '"/><span class="company-address" style="font-family:' . $option['font_family'] . ';font-weight:' . $option['company_address_font_weight'] . ';font-style:' . $option['company_address_font_style'] . ';font-size:' . $option['company_address_font_size'] . 'px; line-height:' . $option['company_address_line_height'] . 'px;text-align:' . $option['company_address_text_align'] . ';color:' . $option['company_address_color'] . ';">' . $option['company_address'] . '</span>';
        }

        $company_website = '';
        if ( $option['company_website'] ) {
            $company_website = '<a href="' . $option['company_website'] . '" style="text-decoration:none!important;"><img src="' . ESG_PLUGIN_URL . 'assets/img/website-icon.png" width="' . $option['icon_size'] . 'px" style="vertical-align: middle;margin-right:5px;background-color:' . $option['icon_color'] . '"/><span class="company-website" style="font-family:' . $option['font_family'] . ';font-weight:' . $option['company_website_font_weight'] . ';font-style:' . $option['company_website_font_style'] . ';font-size:' . $option['company_website_font_size'] . 'px; line-height:' . $option['company_website_line_height'] . 'px;text-align:' . $option['company_website_text_align'] . ';color:' . $option['company_website_color'] . ';">' . preg_replace( '#^https?://#', '', $option['company_website'] ) . '</span></a>';
        }

        /* User Infos */

        $user_firstname = '';
        if ( $user_data['firstname'] ) {
            $user_firstname = '<span class="user-firstname" style="font-family:' . $option['font_family'] . ';font-weight:' . $option['user_firstname_font_weight'] . ';font-style:' . $option['user_firstname_font_style'] . ';font-size:' . $option['user_firstname_font_size'] . 'px; line-height:' . $option['user_firstname_line_height'] . 'px;text-align:' . $option['user_firstname_text_align'] . ';color:' . $option['user_firstname_color'] . ';">' . $user_data['firstname'] . '</span>';
        }

        $user_surname = '';
        if ( $user_data['surname'] ) {
            $user_surname = '<span class="user-surname" style="font-family:' . $option['font_family'] . ';font-weight:' . $option['user_surname_font_weight'] . ';font-style:' . $option['user_surname_font_style'] . ';font-size:' . $option['user_surname_font_size'] . 'px; line-height:' . $option['user_surname_line_height'] . 'px;text-align:' . $option['user_surname_text_align'] . ';color:' . $option['user_surname_color'] . ';">' . $user_data['surname'] . '</span>';
        }

        $user_title = '';
        if ( $user_data['title'] ) {
            $user_title = '<span class="user-title" style="font-family:' . $option['font_family'] . ';font-weight:' . $option['user_title_font_weight'] . ';font-style:' . $option['user_title_font_style'] . ';font-size:' . $option['user_title_font_size'] . 'px; line-height:' . $option['user_title_line_height'] . 'px;text-align:' . $option['user_title_text_align'] . ';color:' . $option['user_title_color'] . ';">' . $user_data['title'] . '</span>';
        }

        $user_email = '';
        if ( $user_data['email'] ) {
            $user_email = '<img src="' . ESG_PLUGIN_URL . 'assets/img/email-icon.png" width="' . $option['icon_size'] . 'px" style="margin-right:5px;vertical-align: middle;background-color:' . $option['icon_color'] . '"/><span class="user-email" style="font-family:' . $option['font_family'] . ';font-weight:' . $option['user_email_font_weight'] . ';font-style:' . $option['user_email_font_style'] . ';font-size:' . $option['user_email_font_size'] . 'px; line-height:' . $option['user_email_line_height'] . 'px;text-align:' . $option['user_email_text_align'] . ';color:' . $option['user_email_color'] . '!important;text-decoration:none!important;"><a style="color:' . $option['user_email_color'] . '!important;text-decoration:none!important;">' . $user_data['email'] . '</a></span>';
        }

        $user_mobile = '';
        if ( $user_data['mobile'] ) {
            $user_mobile = '<img src="' . ESG_PLUGIN_URL . 'assets/img/telephone-icon.png" width="' . $option['icon_size'] . 'px" style="margin-right:5px;vertical-align: middle;background-color:' . $option['icon_color'] . '; line-height:' . $option['user_mobile_line_height'] . 'px;"/><span class="user-mobile" style="font-family:' . $option['font_family'] . ';font-weight:' . $option['user_mobile_font_weight'] . ';font-style:' . $option['user_mobile_font_style'] . ';font-size:' . $option['user_mobile_font_size'] . 'px; line-height:' . $option['user_mobile_line_height'] . 'px;text-align:' . $option['user_mobile_text_align'] . ';color:' . $option['user_mobile_color'] . ';">' . $user_data['mobile'] . '</span>';
        }

        $user_linkedin = '';
        if ( $user_data['user_linkedin'] ) {
            $user_linkedin = '<a href="' . $user_data['user_linkedin'] . '"><img class="linkedin-logo" style="vertical-align: baseline;" src="' . ESG_PLUGIN_URL . 'assets/img/user-linkedin.png" width="' . $option['user_surname_font_size'] . 'px"/></a>';
        }

        /* Additionnal content */

        $additional_content = '';
        if ( $option['additional_content'] ) {
            $additional_content = '<span class="additional-content" style="font-family:' . $option['font_family'] . ';font-weight:' . $option['additional_content_font_weight'] . ';font-style:' . $option['additional_content_font_style'] . ';font-size:' . $option['additional_content_font_size'] . 'px; line-height:' . $option['additional_content_line_height'] . 'px;text-align:' . $option['additional_content_text_align'] . ';color:' . $option['additional_content_color'] . ';">' . $option['additional_content'] . '</span>';
        }

        /* Social icons */

        $before_social_text = '';
        if ( $option['before_social_text'] ) {
            $before_social_text = '<span class="before_social-text" style="font-family:' . $option['font_family'] . ';vertical-align: middle;font-weight:' . $option['before_social_text_font_weight'] . ';font-style:' . $option['before_social_text_font_style'] . ';font-size:' . $option['before_social_text_font_size'] . 'px; line-height:' . $option['before_social_text_line_height'] . 'px;text-align:' . $option['before_social_text_text_align'] . ';color:' . $option['before_social_text_color'] . ';">' . $option['before_social_text'] . '</span>';
        }

        $facebook_icon = '';
        if ( $option['facebook_link'] ) {
            $facebook_icon = '<a href="' . $option['facebook_link'] . '"><img class="facebook-icon" width="' . $option['icon_size'] . 'px" style="vertical-align: middle;background-color:' . $option['icon_color'] . '" src="' . ESG_PLUGIN_URL . 'assets/img/facebook-icon.png" alt="facebook icon"/></a>';
        }

        $instagram_icon = '';
        if ( $option['instagram_link'] ) {
            $instagram_icon = '<a href="' . $option['instagram_link'] . '"><img class="instagram-icon" width="' . $option['icon_size'] . 'px" style="vertical-align:middle;background-color:' . $option['icon_color'] . '" src="' . ESG_PLUGIN_URL . 'assets/img/instagram-icon.png" alt="instagram icon"/></a>';
        }

        $youtube_icon = '';
        if ( $option['youtube_link'] ) {
            $youtube_icon = '<a href="' . $option['youtube_link'] . '"><img class="youtube-icon" width="' . $option['icon_size'] . 'px" style="vertical-align:middle;background-color:' . $option['icon_color'] . '" src="' . ESG_PLUGIN_URL . 'assets/img/youtube-icon.png" alt="youtube icon"/></a>';
        }

        $linkedin_icon = '';
        if ( $option['linkedin_link'] ) {
            $linkedin_icon = '<a href="' . $option['linkedin_link'] . '"><img class="linkedin-icon" width="' . $option['icon_size'] . 'px" style="vertical-align:middle;background-color:' . $option['icon_color'] . '" src="' . ESG_PLUGIN_URL . 'assets/img/linkedin-icon.png" alt="linkedin icon"/></a>';
        }

        $twitter_icon = '';
        if ( $option['twitter_link'] ) {
            $twitter_icon = '<a href="' . $option['twitter_link'] . '"><img class="twitter-icon" width="' . $option['icon_size'] . 'px" style="vertical-align:middle;background-color:' . $option['icon_color'] . '" src="' . ESG_PLUGIN_URL . 'assets/img/twitter-icon.png" alt="twitter icon"/></a>';
        }

        if ( isset( $option['template'] ) ) {
            // Prepare the object, include the template and store in the $signature variable
            ob_start();
            include ESG_PLUGIN_TEMPLATE . 'emails/' . $option['template'] . '.php';
            return ob_get_clean();
        }
    }

    public function toSlug( $id ) {
        $slug = str_replace( '-', '_', $id ); //change middlescores to underscores
        return $slug;
    }
}
