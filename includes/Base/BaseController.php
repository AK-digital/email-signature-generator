<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Base;

class BaseController
{
    public $plugin_path;

    public $plugin_url;

    public $plugin;

    public $templates_path;

    public $wc_check = false;

    public $options;

    public $managers = array();
    public $field_managers = array();

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/email-signature-generator.php';

        $this->templates_path = plugin_dir_path(dirname(__FILE__, 2)) . '/templates/';

        // Check if Woocommerce plugin is active
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            $this->wc_check = true;
        }

        $this->options = get_option('esg_admin_settings');

        $style = [
            'font-weight' => ['title' => 'Font weight', 'input_type' => 'select', 'select_options' => ['300', '400', '500', '600', '700', '800', '900'], 'default_val' => '400'],
            'font-style' => ['title' => 'Font style', 'input_type' => 'select', 'select_options' => ['normal', 'italic', 'oblique'], 'default_val' => 'normal'],
            'font-size' => ['title' => 'Font size', 'input_type' => 'number', 'suffix' => 'px', 'default_val' => '13'],
            'line-height' => ['title' => 'Line height', 'input_type' => 'number', 'suffix' => 'px', 'default_val' => '22'],
            'text-align' => ['title' => 'Text align', 'input_type' => 'select', 'select_options' => ['left', 'center', 'right'], 'default_val' => 'left',],
            'color' => ['title' => 'Couleur du texte', 'input_type' => 'color_picker', 'class' => '','default_val' => '#000000'],
        ];

        $required = ['required' => ['title' => 'Requis', 'input_type' => 'checkbox', 'default_val' => '0']];


        // Manage settings sections - add / remove sections here
        $this->managers = [
            [
                'id' => 'esg-settings-template',
                'title' => 'Templates de signatures',
                'fields' => [
                    'template' => [
                        'title' => 'Choix du layout',
                        'input_type' => 'template',
                        'default_val' => '_one',
                    ],
                ],
            ],
            [
                'id' => 'esg-settings-branding',
                'title' => 'Branding',
                'fields' => [
                    'logo' => [
                        'title' => 'Logo',
                        'input_type' => 'image',
                        'class' => 'logo-image',
                        'default_val' => $this->plugin_url . 'assets/img/default-logo.png',
                    ],
                    'logo_margin' => [
                        'title' => 'Marges verticales logo',
                        'input_type' => 'number',
                        'class' => 'logo-margin',
                        'max' => '100',
                        'default_val' => '0',
                        'suffix' => 'px',
                    ],
                    'banner' => [
                        'title' => 'Bannière',
                        'input_type' => 'image',
                        'class' => 'banner-image',
                        'default_val' => $this->plugin_url . 'assets/img/default-banner.png',
                    ],
                    'banner_margin' => [
                        'title' => 'Marges verticales bannière',
                        'input_type' => 'number',
                        'class' => 'banner-margin',
                        'max' => '100',
                        'default_val' => '0',
                        'suffix' => 'px',
                    ],
                    'banner_link' => [
                        'title' => 'Lien bannière',
                        'input_type' => 'text',
                        'class' => 'regular-text',
                        'placeholder' => 'https://studiokrack.fr',
                    ],
//                    'text_color' => [
//                        'title' => 'Couleur du texte',
//                        'input_type' => 'color_picker',
//                        'class' => '',
//                    ],
//                    'highlight_color' =>
//                        [
//                            'title' => 'Couleur de mise en avant',
//                            'input_type' => 'color_picker',
//                            'class' => '',
//                        ],
                    'icon_size' => [
                        'title' => 'Taille des icones',
                        'input_type' => 'number',
                        'class' => '',
                        'suffix' => 'px',
                        'default_val' => '20',
                        'min' => '12',
                        'max' => '40',
                    ],
                    'icon_color' => [
                        'title' => 'Couleur des icones',
                        'input_type' => 'color_picker',
                        'class' => '',
                        'default_val' => '#1e73be',
                    ],

                ],
            ],
            [
                'id' => 'esg-settings-general',
                'title' => 'Informations générales',
                'fields' => [
                    'font_family' => [
                        'title' => 'Font family',
                        'input_type' => 'select',
                        'select_options' => ['Arial', 'Calibri', 'Cambria', 'Comic Sans MS', 'Courier', 'Georgia', 'Garamond', 'Helvetica', 'Open Sans', 'Serif', 'Sans Serif', 'Tahoma', 'Times New Roman', 'Trebuchet MS', 'Verdana'],
                    ],
                    'company_name' => [
                        'title' => 'Nom de l\'entreprise',
                        'input_type' => 'text',
                        'style' => $style,
                        'default_val' => 'Ma Super Boite',
                    ],
//                    'company_baseline' => [
//                        'title' => 'Slogan',
//                        'input_type' => 'text',
//                        'style' => $style,
//                    ],
                    'company_address' => [
                        'title' => 'Adresse',
                        'input_type' => 'text',
                        'style' => $style,
                        'default_val' => '1801 rue de la victoire',
                    ],
//                    'city' => [
//                        'title' => 'Ville, pays',
//                        'input_type' => 'text',
//                        'style' => $style,
//                    ],
                    'company_phone' => [
                        'title' => 'Numéro de téléphone',
                        'input_type' => 'text',
                        'style' => $style,
                        'default_val' => '01 02 03 04 05 06',
                    ],
                    'company_website' => [
                        'title' => 'Lien site internet (avec https://)',
                        'input_type' => 'text',
                        'style' => $style,
                        'default_val' => 'https://www.masuperboite.fr',
                    ],
                ],
            ],

            [
                'id' => 'esg-settings-userinfos',
                'title' => 'Infos utilisateur',
                'fields' => [
                    'user_firstname' => [
                        'title' => 'Prénom',
                        'input_type' => 'hidden',
                        'style' => $style,
                        'required' => $required,
                    ],
                    'user_surname' => [
                        'title' => 'Nom',
                        'input_type' => 'hidden',
                        'style' => $style,
                        'required' => $required,
                    ],
                    'user_title' => [
                        'title' => 'Fonction',
                        'input_type' => 'hidden',
                        'style' => $style,
                        'required' => $required,
                    ],
                    'user_email' => [
                        'title' => 'Email',
                        'input_type' => 'hidden',
                        'style' => $style,
                        'required' => $required,
                    ],
                    'user_mobile' => [
                        'title' => 'Mobile',
                        'input_type' => 'hidden',
                        'style' => $style,
                        'required' => $required,
                    ],
                ],
            ],

            [
                'id' => 'esg-settings-social',
                'title' => 'Réseaux sociaux',
                'fields' => [
                    'before_social_text' => [
                        'title' => 'Label icones sociaux',
                        'input_type' => 'text',
                        'class' => '',
                        'style' => $style,
                        'default_val' => __('Suivez-nous sur les réseaux sociaux', 'emailSignatureGenerator'),
                    ],
                    'social_section_margin' => [
                        'title' => 'Marges verticales',
                        'input_type' => 'number',
                        'class' => '',
                        'suffix' => 'px',
                        'default_val' => '10',
                        'min' => '0',
                        'max' => '40',
                    ],
                    'facebook_link' => [
                        'title' => 'Url page Facebook',
                        'input_type' => 'text',
                        'class' => '',
                        'default_val' => '#',
                    ],
                    'youtube_link' => [
                        'title' => 'Url chaîne Youtube',
                        'input_type' => 'text',
                        'class' => '',
                        'default_val' => '#',
                    ],
                    'linkedin_link' => [
                        'title' => 'Url page Linkedin',
                        'input_type' => 'text',
                        'class' => '',
                        'default_val' => '#',
                    ],
                    'instagram_link' => [
                        'title' => 'Url compte Instagram',
                        'input_type' => 'text',
                        'class' => '',
                        'default_val' => '#',
                    ],
                    'twitter_link' => [
                        'title' => 'Url compte Twitter',
                        'input_type' => 'text',
                        'class' => '',
                        'default_val' => '#',
                    ],
                ],
            ],
            [
                'id' => 'esg-settings-additional',
                'title' => 'Contenu additionnel',
                'fields' => [
                    'additional_content' =>
                        [
                            'title' => 'Mentions légales ou autre texte personnalisé',
                            'input_type' => 'textarea',
                            'class' => '',
                            'style' => $style,
                        ],
                ],
            ],

        ];
    }

    /*
     * return signature object
     */
    public function generate_signature($user_data = '')
    {
        $option = $this->options;

        /* Branding */

        $logo = '';
        if($option['logo']) {
            $logo = '<img class="company-logo" src="' . $option['logo'] . '" style="margin-top:' . $option['logo_margin'] . 'px; margin-bottom:' . $option['logo_margin'] . 'px;" alt="company logo"/>';
        }

        $banner = '';
        if($option['banner']) {
            $banner = '<a href="/wp-json/email-signature-generator/v1/bannerlink"><img class="company-banner"  style="margin-top:' . $option['banner_margin'] . 'px; margin-bottom:' . $option['banner_margin'] . 'px;" src="'. $option['banner'] .'" alt="company banner"/></a>';
        }

        /* Infos générales */
        $company_name = '';
        if($option['company_name']) {
            $company_name = '<span class="company-name" style="font-weight:' .  $option['company_name_font_weight']  . ';font-style:' .  $option['company_name_font_style']  . ';font-size:' .  $option['company_name_font_size']  . 'px; line-height:' .  $option['company_name_line_height']  . 'px;text-align:' .  $option['company_name_text_align']  . ';color:' .  $option['company_name_color']  . ';">' . $option['company_name'] . '</span>';
        }
        $company_phone = '';
        if($option['company_phone']) {
            $company_phone = '<span class="company-phone" style="font-weight:' . $option['company_phone_font_weight'] . ';font-style:' . $option['company_phone_font_style'] . ';font-size:' . $option['company_phone_font_size'] . 'px; line-height:' . $option['company_phone_line_height'] . 'px;text-align:' . $option['company_phone_text_align'] . ';color:' . $option['company_phone_color'] . ';">' . $option['company_phone'] . '</span>';
        }

        $company_address = '';
        if($option['company_address']) {
            $company_address = '<img src="' . $this->plugin_url . 'assets/img/address-icon.png" width="' . $option['icon_size'] . 'px" style="vertical-align: middle;margin-right:5px;background-color:' . $option['icon_color'] . '"/><span class="company-address" style="font-weight:' .  $option['company_address_font_weight']  . ';font-style:' .  $option['company_address_font_style']  . ';font-size:' .  $option['company_address_font_size']  . 'px; line-height:' .  $option['company_address_line_height']  . 'px;text-align:' .  $option['company_address_text_align']  . ';color:' .  $option['company_address_color']  . ';">' . $option['company_address'] . '</span>';
        }

        $company_website = '';
        if($option['company_website']) {
            $company_website = '<a href="' . $option['company_website'] . '" style="text-decoration:none!important;"><img src="' . $this->plugin_url . 'assets/img/website-icon.png" width="' . $option['icon_size'] . 'px" style="vertical-align: middle;margin-right:5px;background-color:' . $option['icon_color'] . '"/><span class="company-website" style="font-weight:' . $option['company_website_font_weight'] . ';font-style:' . $option['company_website_font_style'] . ';font-size:' . $option['company_website_font_size'] . 'px; line-height:' . $option['company_website_line_height'] . 'px;text-align:' . $option['company_website_text_align'] . ';color:' . $option['company_website_color'] . ';">' . preg_replace('#^https?://#', '', $option['company_website']) . '</span></a>';
        }

        /* User Infos */

        $user_firstname = '';
        if($user_data['firstname']) {
            $user_firstname = '<span class="user-firstname" style="font-weight:' .  $option['user_firstname_font_weight']  . ';font-style:' .  $option['user_firstname_font_style']  . ';font-size:' .  $option['user_firstname_font_size']  . 'px; line-height:' .  $option['user_firstname_line_height']  . 'px;text-align:' .  $option['user_firstname_text_align']  . ';color:' .  $option['user_firstname_color']  . ';">' . $user_data['firstname'] . '</span>';
        }

        $user_surname = '';
        if($user_data['surname']) {
            $user_surname = '<span class="user-surname" style="font-weight:' .  $option['user_surname_font_weight']  . ';font-style:' .  $option['user_surname_font_style']  . ';font-size:' .  $option['user_surname_font_size']  . 'px; line-height:' .  $option['user_surname_line_height']  . 'px;text-align:' .  $option['user_surname_text_align']  . ';color:' .  $option['user_surname_color']  . ';">' . $user_data['surname'] . '</span>';
        }

        $user_title = '';
        if($user_data['title']) {
            $user_title = '<span class="user-title" style="font-weight:' .  $option['user_title_font_weight']  . ';font-style:' .  $option['user_title_font_style']  . ';font-size:' .  $option['user_title_font_size']  . 'px; line-height:' .  $option['user_title_line_height']  . 'px;text-align:' .  $option['user_title_text_align']  . ';color:' .  $option['user_title_color']  . ';">' . $user_data['title'] . '</span>';
        }

        $user_email = '';
        if($user_data['email']) {
            $user_email = '<img src="' . $this->plugin_url . 'assets/img/email-icon.png" width="' . $option['icon_size'] . 'px" style="margin-right:5px;vertical-align: middle;background-color:' . $option['icon_color'] . '"/><span class="user-email" style="font-weight:' .  $option['user_email_font_weight']  . ';font-style:' .  $option['user_email_font_style']  . ';font-size:' .  $option['user_email_font_size']  . 'px; line-height:' .  $option['user_email_line_height']  . 'px;text-align:' .  $option['user_email_text_align']  . ';color:' .  $option['user_email_color']  . ';">' . $user_data['email'] . '</span>';
        }

        $user_mobile = '';
        if($user_data['mobile']) {
            $user_mobile = '<img src="' . $this->plugin_url . 'assets/img/telephone-icon.png" width="' . $option['icon_size'] . 'px" style="margin-right:5px;vertical-align: middle;background-color:' . $option['icon_color'] . '; line-height:' .  $option['user_mobile_line_height']  . 'px;"/><span class="user-mobile" style="font-weight:' .  $option['user_mobile_font_weight']  . ';font-style:' .  $option['user_mobile_font_style']  . ';font-size:' .  $option['user_mobile_font_size']  . 'px; line-height:' .  $option['user_mobile_line_height']  . 'px;text-align:' .  $option['user_mobile_text_align']  . ';color:' .  $option['user_mobile_color']  . ';">' . $user_data['mobile'] . '</span>';
        }

        $user_linkedin = '';
        if($user_data['user_linkedin']) {
            $user_linkedin = '<a href="' . $user_data['user_linkedin'] . '"><img class="linkedin-logo" src="' . $this->plugin_url . 'assets/img/user-linkedin.png" width="' .  $option['user_surname_font_size']  . 'px"/></a>';
        }

        /* Additionnal content */

        $additional_content = '';
        if($option['additional_content']) {
            $additional_content = '<span class="additional-content" style="font-weight:' . $option['additional_content_font_weight'] . ';font-style:' . $option['additional_content_font_style'] . ';font-size:' . $option['additional_content_font_size'] . 'px; line-height:' . $option['additional_content_line_height'] . 'px;text-align:' . $option['additional_content_text_align'] . ';color:' . $option['additional_content_color'] . ';">' . $option['additional_content'] . '</span>';
        }

        /* Social icons */

        $before_social_text = '';
        if($option['before_social_text']) {
            $before_social_text = '<span class="before_social-text" style="vertical-align: middle;font-weight:' . $option['before_social_text_font_weight'] . ';font-style:' . $option['before_social_text_font_style'] . ';font-size:' . $option['before_social_text_font_size'] . 'px; line-height:' . $option['before_social_text_line_height'] . 'px;text-align:' . $option['before_social_text_text_align'] . ';color:' . $option['before_social_text_color'] . ';">' . $option['before_social_text'] . '</span>';
        }

        $facebook_icon = '';
        if($option['facebook_link']) {
            $facebook_icon = '<a href="' . $option['facebook_link'] . '"><img class="facebook-icon" width="' . $option['icon_size'] . 'px" style="vertical-align: middle;background-color:' . $option['icon_color'] . '" src="' . $this->plugin_url . 'assets/img/facebook-icon.png" alt="facebook icon"/></a>';
        }

        $instagram_icon = '';
        if($option['instagram_link']) {
            $instagram_icon = '<a href="' . $option['instagram_link'] . '"><img class="instagram-icon" width="' . $option['icon_size'] . 'px" style="vertical-align:middle;background-color:' . $option['icon_color'] . '" src="' . $this->plugin_url . 'assets/img/instagram-icon.png" alt="instagram icon"/></a>';
        }

        $youtube_icon = '';
        if($option['youtube_link']) {
            $youtube_icon = '<a href="' . $option['youtube_link'] . '"><img class="youtube-icon" width="' . $option['icon_size'] . 'px" style="vertical-align:middle;background-color:' . $option['icon_color'] . '" src="' . $this->plugin_url . 'assets/img/youtube-icon.png" alt="youtube icon"/></a>';
        }

        $linkedin_icon = '';
        if($option['linkedin_link']) {
            $linkedin_icon = '<a href="' . $option['linkedin_link'] . '"><img class="linkedin-icon" width="' . $option['icon_size'] . 'px" style="vertical-align:middle;background-color:' . $option['icon_color'] . '" src="' . $this->plugin_url . 'assets/img/linkedin-icon.png" alt="linkedin icon"/></a>';
        }

        $twitter_icon = '';
        if($option['twitter_link']) {
            $twitter_icon = '<a href="' . $option['twitter_link'] . '"><img class="twitter-icon" width="' . $option['icon_size'] . 'px" style="vertical-align:middle;background-color:' . $option['icon_color'] . '" src="' . $this->plugin_url . 'assets/img/twitter-icon.png" alt="twitter icon"/></a>';
        }

        if(isset($option['template'])) {
            // Prepare the object, include the template and store in the $signature variable
            ob_start();
            include $this->templates_path . 'emails/' . $option['template'] . '.php';
            return ob_get_clean();
        }
    }

    public function toSlug($id)
    {
        $slug = str_replace('-', '_', $id); //change middlescores to underscores
        return $slug;
    }
}
