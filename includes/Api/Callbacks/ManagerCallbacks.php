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

//    /**
//     * Sanitize each setting field as needed
//     *
//     * @param array $args Contains all settings fields as array keys
//     * @return array
//     */
//
//    public function sanitize(array $args): array
//    {
//        $output = array();
//
//        foreach ($this->managers as $row) {
//
//            foreach ($row['fields'] as $key => $value) {
//
//                if (!empty($args[$key])) {
//                    $output[$key] = ($args[$key]);
//                }
//
//                foreach ($value['sub_settings'] as $k => $v) {
//                    if (!empty($args[$k])) {
//                        $output[$key] = ($args[$key . '_' . $k]);
//                    }
//
//                }
//            }
//        }
//        return $output;
//    }

    /**
     * @param $args
     */
    public function hidden_callback($args)
    {
      //nope nothing by security
    }

    /*
     * @param $args
     */
    public function number_callback($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $suffix = $args['suffix'];

        printf(
            '<input type="number" id="' . $name . '" name="' . $option_name . '[' . $name . ']" class="small-text" value="%s" /><span>' .  $suffix  .'</span>',
            isset($this->options[$name]) ? esc_attr($this->options[$name]) : ''
        );
    }

    /**
     * @param $args
     */
    public function text_callback($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];

        printf(
            '<input type="text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" class="regular-text" value="%s" />',
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
    public function select_callback($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $options = $args['select_options'];

        echo '<select name="' . $option_name . '[' . $name . ']" id="' . $name . '">';

        foreach ($options as $key => $value) {
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

        $emails_path = $this->templates_path . '/emails';

       //check if path exist and not empty
        if (is_dir($emails_path) && !empty($emails_path)) {

            if ($handle = opendir($emails_path)) {

                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry != ".." && pathinfo($entry)["extension"] === "php") {

                        $entry = str_replace('.php', '', $entry);
                        printf(
                            '<label><input type="radio" id="%s" name="esg_admin_settings[template]" class="regular-text" value="%s" %s/><img src="%s" width="150px"/></label>',
                            $entry, $entry, ($this->options['template'] == $entry) ? 'checked' : '', $this->plugin_url . '/assets/img/' . $entry . '-template.png');
                    }
                }
                closedir($handle);
            }
        }
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
