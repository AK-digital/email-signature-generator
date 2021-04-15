<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Api\Callbacks;

use Includes\Base\BaseController;

/**
 * Class ManagerCallbacks
 * @package Includes\Api\Callbacks
 */
class ManagerCallbacks extends BaseController
{

    /**
     * Sanitize each setting field as needed
     *
     * @param array $args Contains all settings fields as array keys
     * @return array
     */

    public function sanitize(array $args): array
    {
        $output = array();

        foreach ($this->managers as $row) {
            foreach ($row['fields'] as $key => $value) {

                if (isset($args[$key])) {
                    $output[$key] = ($args[$key]);
                }
            }
        }
        return $output;
    }

    /**
     * @param $args
     */
    public function text_callback($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];

        printf(
            '<input type="text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" class="regular-text ' . $classes . '" value="%s" />',
            isset($this->options[$name]) ? esc_attr($this->options[$name]) : ''
        );
    }

    /**
     * @param $args
     */
    public function textarea_callback($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];

        printf(
            '<textarea id="' . $name . '" name="' . $option_name . '[' . $name . ']">%s</textarea>',
            isset($this->options[$name]) ? esc_attr($this->options[$name]) : ''
        );
    }

    /**
     * @param $args
     */
    public function image_callback($args)
    {

        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];

        printf('<img id="' . $name . '_image" src="%s" %s />', esc_attr($this->options[$name]), empty($this->options[$name]) ? 'hidden' : '');

        printf(
            '<input type="text" id="' . $name . '_input_url" name="' . $option_name . '[' . $name . ']" class="' . $classes . '" value="%s" />
            <input id="remove_' . $name . '_button" type="button" class="button-secondary" value="Remove" %s />
            <input id="upload_' . $name . '_button" type="button" class="button-primary" value="Choose ' . $name . '" />',
            isset($this->options[$name]) ? esc_attr($this->options[$name]) : '', empty($this->options[$name]) ? 'hidden' : ''
        );
    }

    /**
     * @param $args
     */
    public function color_picker_callback($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];

        printf(
            '<input type="text" name="' . $option_name . '[' . $name . ']" value="%s" class="color-picker ' . $classes . '" data-default-color="#000000" >',
            (isset($this->options[$name])) ? $this->options[$name] : '');
    }

    /**
     * @param $args
     */
    public function font_family_callback($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];

        $font = array('Arial', 'Calibri', 'Cambria', 'Comic Sans MS', 'Courier', 'Georgia', 'Garamond', 'Open Sans', 'Serif', 'Sans Serif', 'Tahoma', 'Times New Roman', 'Trebuchet MS', 'Verdana');

        echo '<select name="' . $option_name . '[' . $name . ']" id="' . $name . '">';

        foreach ($font as $key => $value) {
            $selected = (isset($this->options[$name]) && $this->options[$name] === $value) ? 'selected' : '';
            echo "<option value='$value' style='font-family:$value' $selected >$value</option>";
        }

        echo '</select>';
    }

    /**
     *
     */
    public function template_callback()
    {
//
//        printf(
//            '<label><input type="radio" id="' . $name . '" name="esg_admin_settings[template]" class="regular-text" value="' . $name . '" %s/><img src="%s" width="200px"/></label>',
//            ($this->options['template'] == $name ) ? 'checked' : '', $this->plugin_url . '/assets/img/studio-krack-template.png'
//        );

        printf(
            '<label><input type="radio" id="studio-krack" name="esg_admin_settings[template]" class="regular-text" value="studio-krack" %s/><img src="%s" width="200px"/></label>',
            ($this->options['template'] == 'studio-krack') ? 'checked' : '', $this->plugin_url . '/assets/img/studio-krack-template.png'
        );
    }


    /**
     * @param $value
     * @return bool
     */
    public function check_color($value): bool // unused at the moment
    {

        if (preg_match('/^#[a-f0-9]{6}$/i', $value)) { // if user insert a HEX color with #
            return true;
        }

        return false;
    }
}
