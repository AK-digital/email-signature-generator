<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Api\Callbacks;

use Includes\Base\BaseController;

class AdminCallbacks extends BaseController
{

    /**
     * DETAILS CALLBACKS
     */

    public function logo_callback()
    {
        printf('<img id="logo_image" src="%s" alt="company logo" %s />', esc_attr($this->options['logo']), empty($this->options['logo']) ? 'hidden' : '');

        printf(
            '<input id="logo_input_url" type="text" name="esg_admin_settings[logo]" class="regular-text" value="%s" />
            <input id="remove_logo_button" type="button" class="button-secondary" value="Remove" %s />
            <input id="upload_logo_button" type="button" class="button-primary" value="Choose logo" />',
            isset($this->options['logo']) ? esc_attr($this->options['logo']) : '', empty($this->options['logo']) ? 'hidden' : ''
        );
    }

    public function banner_callback()
    {
        printf('<img id="banner_image" src="%s" alt="company banner" %s />', esc_attr($this->options['banner']), empty($this->options['banner']) ? 'hidden' : '');

        printf(
            '<input id="banner_input_url" type="text" name="esg_admin_settings[banner]" class="regular-text" value="%s"/>
            <input id="remove_banner_button" type="button" class="button-secondary" value="Remove" %s />
            <input id="upload_banner_button" type="button" class="button-primary" value="Choose banner" />',
            isset($this->options['banner']) ? esc_attr($this->options['banner']) : '', empty($this->options['banner']) ? 'hidden' : ''
        );

    }

    public function text_color_callback()
    {
        // Css rules for Color Picker

        $val = (isset($this->options['text_color'])) ? $this->options['text_color'] : '';
        echo '<input type="text" name="esg_admin_settings[text_color]" value="' . $val . '" class="color-picker" data-default-color="#000000" >';
    }

    public function icon_color_callback()
    {
        // Css rules for Color Picker

        $val = (isset($this->options['icon_color'])) ? $this->options['icon_color'] : '';
        echo '<input type="text" name="esg_admin_settings[icon_color]" value="' . $val . '" class="color-picker" data-default-color="#000000" >';
    }

    public function link_color_callback()
    {
        // Css rules for Color Picker

        $val = (isset($this->options['link_color'])) ? $this->options['link_color'] : '';
        echo '<input type="text" name="esg_admin_settings[link_color]" value="' . $val . '" class="color-picker" data-default-color="#000000" >';
    }


    public function font_family_callback()
    {

        $font = array('Arial','Calibri', 'Cambria', 'Comic Sans MS','Courier', 'Georgia', 'Garamond', 'Serif', 'Sans Serif', 'Tahoma', 'Times New Roman', 'Trebuchet MS', 'Verdana');
        ?>
        <select name="esg_admin_settings[font_family]" id="font_family">
            <?php foreach ($font as $key => $value){ ?>
                <?php $selected = (isset($this->options['font_family']) && $this->options['font_family'] === $value) ? 'selected' : ''; ?>
                <option value="<?= $value; ?>" style="font-family:'<?= $value; ?>';" <?= $selected; ?>><?= $value; ?></option>
            <?php } ?>
        </select> <?php
    }

    public function company_name_callback()
    {
        printf(
            '<input type="text" id="company_name" name="esg_admin_settings[company_name]" class="regular-text"  value="%s" />',
            isset($this->options['company_name']) ? esc_attr($this->options['company_name']) : ''
        );
    }

    public function baseline_callback()
    {
        printf(
            '<input type="text" id="baseline" name="esg_admin_settings[baseline]" class="regular-text" value="%s" />',
            isset($this->options['baseline']) ? esc_attr($this->options['baseline']) : ''
        );
    }

    public function address_callback()
    {
        printf(
            '<input type="text" id="address" name="esg_admin_settings[address]" class="regular-text" value="%s" />',
            isset($this->options['address']) ? esc_attr($this->options['address']) : ''
        );
    }

    public function phone_callback()
    {
        printf(
            '<input type="tel" id="phone" name="esg_admin_settings[phone]" class="regular-text" value="%s" />',
            isset($this->options['phone']) ? esc_attr($this->options['phone']) : ''
        );
    }

    public function website_callback()
    {
        printf(
            '<input type="text" id="website" name="esg_admin_settings[website]" class="regular-text" value="%s" />',
            isset($this->options['website']) ? esc_attr($this->options['website']) : ''
        );
    }
    // GENERAL COMPANY INFOS CALLBACKS END -------------


    /**
     * SOCIAL CALLBACKS
     */

    public function facebook_callback()
    {
        printf(
            '<input type="text" id="facebook" name="esg_admin_settings[facebook]" class="regular-text" value="%s" />',
            isset($this->options['facebook']) ? esc_attr($this->options['facebook']) : ''
        );
    }

    public function youtube_callback()
    {
        printf(
            '<input type="text" id="youtube" name="esg_admin_settings[youtube]" class="regular-text" value="%s" />',
            isset($this->options['youtube']) ? esc_attr($this->options['youtube']) : ''
        );
    }

    public function linkedin_callback()
    {
        printf(
            '<input type="text" id="linkedin" name="esg_admin_settings[linkedin]" class="regular-text" value="%s" />',
            isset($this->options['linkedin']) ? esc_attr($this->options['linkedin']) : ''
        );
    }

    public function twitter_callback()
    {
        printf(
            '<input type="text" id="twitter" name="esg_admin_settings[twitter]" class="regular-text" value="%s" />',
            isset($this->options['twitter']) ? esc_attr($this->options['twitter']) : ''
        );
    }

    public function tiktok_callback()
    {
        printf(
            '<input type="text" id="tiktok" name="esg_admin_settings[tiktok]" class="regular-text" value="%s" />',
            isset($this->options['tiktok']) ? esc_attr($this->options['tiktok']) : ''
        );
    }

    public function instagram_callback()
    {
        printf(
            '<input type="text" id="instagram" name="esg_admin_settings[instagram]" class="regular-text" value="%s" />',
            isset($this->options['instagram']) ? esc_attr($this->options['instagram']) : ''
        );
    }

    // SOCIAL CALLBACK END --------------


    public function additional_content_callback()
    {
        printf(
            '<textarea id="additional_content" name="esg_admin_settings[additional_content]" placeholder="Write here your last concern, disclaimer or legal notice for instance.">%s</textarea>',
            isset($this->options['additional_content']) ? esc_attr($this->options['additional_content']) : ''
        );
    }

    /*
 *   LAYOUTS CALLBACKS
 */

    public function standard_vertical_callback()
    {
        printf(
            '<label><input type="radio" id="standard-vertical" name="esg_admin_settings[layout]" class="regular-text" value="standard-vertical" %s checked/><img src="%s" width="200px"/></label>',
            ($this->options['layout'] == 'standard-vertical') ? 'checked' : '', $this->plugin_url . '/assets/img/standard-vertical.svg'
        );
    }

    public function standard_horizontal_callback()
    {
        printf(
            '<label><input type="radio" id="standard_horizontal" name="esg_admin_settings[layout]" class="regular-text" value="standard-horizontal" %s/><img src="%s" width="200px"/></label>',
            ($this->options['layout'] == 'standard-horizontal') ? 'checked' : '', $this->plugin_url . '/assets/img/standard-horizontal.svg'
        );
    }

    public function standard_vertical_inverse_callback()
    {
        printf(
            '<label><input type="radio" id="standard_vertical_inverse" name="esg_admin_settings[layout]" class="regular-text" value="standard-vertical-inverse" %s/><img src="%s" width="200px"/></label>',
            ($this->options['layout'] == 'standard-vertical-inverse') ? 'checked' : '', $this->plugin_url . '/assets/img/standard-vertical-inverse.svg'
        );
    }

    // LAYOUTS CALLBACK END --------------
}
