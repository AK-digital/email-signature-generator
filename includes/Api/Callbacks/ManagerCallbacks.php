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
//                foreach ($value['style'] as $k => $v) {
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
        $default_val = $args['default_val'];
        $min = $args['min'];
        $max = $args['max'];

        printf(
            '<input type="number" id="' . $name . '" name="' . $option_name . '[' . $name . ']" class="small-text"  min="' . $min . '" max="'. $max . '" value="%s" /><span>' .  $suffix  .'</span>',
            isset($this->options[$name]) ? esc_attr($this->options[$name]) : $default_val
        );
    }

    /**
     * @param $args
     */
    public function text_callback($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $placeholder = $args['placeholder'];
        $default_val = $args['default_val'];

        printf(

            '<input type="text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" class="regular-text" value="%s" placeholder="%s"/>',
            isset($this->options[$name]) ? esc_attr($this->options[$name]) : $default_val, $placeholder
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
        $default_val = $args['default_val'];

        printf('<img class="upload-image" src="%s" %s/>', isset($this->options[$name]) ? esc_attr($this->options[$name]) : $default_val, empty($this->options[$name]) ? 'style="display:none;"' : '');

        printf(
            '<input type="text" class="upload-input-url" name="' . $option_name . '[' . $name . ']" class="' . $classes . '" value="%s" />
            <input type="button" class="button-secondary esg-button-remove" value="Remove" %s />
            <input type="button" class="button-primary esg-button-upload" value="Choose ' . $name . '" />',
            isset($this->options[$name]) ? esc_attr($this->options[$name]) : $default_val , empty($this->options[$name]) ? 'style="display:none;"' : ''
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
        $default_val = $args['default_val'];

        printf(
            '<input type="text" name="' . $option_name . '[' . $name . ']" value="%s" class="color-picker ' . $classes . '">',
            (isset($this->options[$name])) ? $this->options[$name] : $default_val);
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
        $default_val = $args['default_val'];

        echo '<select name="' . $option_name . '[' . $name . ']" id="' . $name . '">';

        foreach ($options as $key => $value) {
            $selected = (isset($this->options[$name]) && $this->options[$name] === $value)  ? 'selected' : '';

            if($this->options[$name] === '' && $value == $default_val){
                $selected = 'selected';
            }

            echo "<option value='$value' style='font-weight:$value; font-style:$value;font-family:$value;' $selected >$value</option>";
        }

        echo '</select>';
    }

    public function checkbox_callback( $args )
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option( $option_name );
        $checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

        echo '<input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ( $checked ? 'checked' : '') . '><label for="' . $name . '">';
    }

    /**
     *
     */
    public function template_callback($args)
    {

        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];

        $emails_path = $this->templates_path . '/emails';

       //check if path exist and not empty
        if (is_dir($emails_path) && !empty($emails_path)) {

            if ($handle = opendir($emails_path)) {

                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry != ".." && pathinfo($entry)["extension"] === "php") {

                        $entry = str_replace('.php', '', $entry);

                        $default_val = '';
                        if(!isset($this->options[$name]) || $this->options[$name] == '' && $entry == $default_val){
                            $default_val = 'checked';
                        }

                        printf(
                            '<label><input type="radio" id="%s" name="'. $option_name . '[' . $name . ']" class="regular-text" value="%s" %s/><img src="%s" width="250px"/></label>',
                            $entry, $entry , ($this->options[$name] == $entry) ? 'checked' : $default_val, $this->plugin_url . '/assets/img/' . $entry . '-template.png');
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
