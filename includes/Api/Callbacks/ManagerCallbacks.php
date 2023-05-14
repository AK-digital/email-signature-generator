<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Api\Callbacks;

use Includes\Base\BaseController;

/**
 * Class ManagerCallbacks
 *
 * @namespace Includes\Api\Callbacks
 */
class ManagerCallbacks extends BaseController {

    public function checkbox_field( $args ) {
        $name        = isset( $args['label_for'] ) && !empty( $args['label_for'] ) ? $args['label_for'] : '';
        $option_name = isset( $args['option_name'] ) && !empty( $args['option_name'] ) ? $args['option_name'] : '';
        $classes     = isset( $args['class'] ) && !empty( $args['class'] ) ? $args['class'] : '';
        $disabled    = isset( $args['disabled'] ) && $args['disabled'] === true ? 'disabled' : '';
        $option      = get_option( $option_name );
        $checked     = isset( $option[ $name ] ) ? ( $option[ $name ] ? true : false ) : false;


        printf(
            '<input type="checkbox" id="%s" name="%s[%s]" value="1" class="%s" %s %s />',
            $name,
            $option_name,
            $name,
            $classes,
            !$checked ?: 'checked',
            $disabled,
        );
    }

    /*
    * @param $args
    */
    public function number_field( $args ) {

        $name        = isset( $args['label_for'] ) && !empty( $args['label_for'] ) ? $args['label_for'] : '';
        $option_name = isset( $args['option_name'] ) && !empty( $args['option_name'] ) ? $args['option_name'] : '';
        $classes     = isset( $args['class'] ) && !empty( $args['class'] ) ? $args['class'] : '';
        $placeholder = isset( $args['placeholder'] ) && !empty( $args['placeholder'] ) ? $args['placeholder'] : '';
        $disabled    = isset( $args['disabled'] ) && $args['disabled'] === true ? 'disabled' : '';
        $suffix      = isset( $args['suffix'] ) && !empty( $args['suffix'] ) ? $args['suffix'] : '';
        $min         = isset( $args['min'] ) && !empty( $args['min'] ) ? $args['min'] : '';
        $max         = isset( $args['max'] ) && !empty( $args['max'] ) ?$args['max'] : '';
        $option      = get_option( $option_name );

        printf(
            '<input type="number" id="%s" name="%s[%s]" class="%s" min="%s" max="%s" value="%s" placeholder="%s" %s /><span>%s</span>',
            $name,
            $option_name,
            $name,
            $classes,
            $min,
            $max,
            isset( $option[ $name ] ) && !empty( $option[ $name ] ) ? esc_attr( $option[ $name ] ) : '',
            $placeholder,
            $disabled,
            $suffix,
        );
    }

    /**
     * @param $args
     */
    public function text_field( $args ) {
        $name        = isset( $args['label_for'] ) && !empty( $args['label_for'] ) ? $args['label_for'] : '';
        $option_name = isset( $args['option_name'] ) && !empty( $args['option_name'] ) ? $args['option_name'] : '';
        $classes     = isset( $args['class'] ) && !empty( $args['class'] ) ? $args['class'] : '';
        $placeholder = isset( $args['placeholder'] ) && !empty( $args['placeholder'] ) ? $args['placeholder'] : '';
        $disabled    = isset( $args['disabled'] ) && $args['disabled'] === true ? 'disabled' : '';
        $option      = get_option( $option_name );

        printf(
            '<input type="text" id="%s" name="%s[%s]" class="%s" value="%s" placeholder="%s" %s />',
            str_replace( '_', '-',$name),
            $option_name,
            $name,
            $classes,
            isset( $option[ $name ] ) ? esc_attr( $option[ $name ] ) : '',
            $placeholder,
            $disabled,
        );
    }

    /**
     * @param $args
     */
    public function password_field( $args ) {
        $name        = isset( $args['label_for'] ) && !empty( $args['label_for'] ) ? $args['label_for'] : '';
        $option_name = isset( $args['option_name'] ) && !empty( $args['option_name'] ) ? $args['option_name'] : '';
        $classes     = isset( $args['class'] ) && !empty( $args['class'] ) ? $args['class'] : '';
        $placeholder = isset( $args['placeholder'] ) && !empty( $args['placeholder'] ) ? $args['placeholder'] : '';
        $disabled    = isset( $args['disabled'] ) && $args['disabled'] === true ? 'disabled' : '';
        $option      = get_option( $option_name );

        printf(
            '<input type="password" type="text" id="%s" name="%s[%s]" class="%s" value="%s" placeholder="%s" %s />',
            str_replace( '_', '-',$name),
            $option_name,
            $name,
            $classes,
            isset( $option[ $name ] ) ? esc_attr( $option[ $name ] ) : '',
            $placeholder,
            $disabled,
        );
    }

    /**
     * @param $args
     */
    public function textarea_field( $args ) {
        $name        = isset( $args['label_for'] ) && !empty( $args['label_for'] ) ? $args['label_for'] : '';
        $option_name = isset( $args['option_name'] ) && !empty( $args['option_name'] ) ? $args['option_name'] : '';
        $classes     = isset( $args['class'] ) && !empty( $args['class'] ) ? $args['class'] : '';
        $placeholder = isset( $args['placeholder'] ) && !empty( $args['placeholder'] ) ? $args['placeholder'] : '';
        $disabled    = isset( $args['disabled'] ) && $args['disabled'] === true ? 'disabled' : '';
        $option      = get_option( $option_name );

        printf(
            '<textarea id="%s" name="%s[%s]" class="%s" placeholder="%s" %s ">%s</textarea>',
            str_replace( '_', '-', $name),
            $option_name,
            $name,
            $classes,
            $placeholder,
            $disabled,
            isset( $option[ $name ] ) ? esc_attr( $option[ $name ] ) : '',
        );
    }

    /**
     * @param $args
     */
    public function select_field( $args ) {
        $name           = isset( $args['label_for'] ) && !empty( $args['label_for'] ) ? $args['label_for'] : '';
        $option_name    = isset( $args['option_name'] ) && !empty( $args['option_name'] ) ? $args['option_name'] : '';
        $select_options = isset( $args['select_options'] ) && !empty( $args['select_options'] ) ? $args['select_options'] : '';
        $classes        = isset( $args['class'] ) && !empty( $args['class'] ) ? $args['class'] : '';
        $disabled       = isset( $args['disabled'] ) && $args['disabled'] === true ? 'disabled' : '';
        $option         = get_option( $option_name );

        echo '<select id="' . $name . '" name="' . $option_name . '[' . $name . ']" class="' . $classes . '" ' . $disabled . '>';

        foreach ( $select_options as $opt_name ) {
            if ( !isset( $opt_name ) || empty( $opt_name ) ) {
                continue;
            }

            $option_slug = str_replace( ' ', '', strtolower( $opt_name ) );

            $font_style = $name === 'font_family' ? 'style="font-family:\'' . $opt_name . '\';"' : '';

            $selected = ( $option_slug == $option[ $name ] ) ? 'selected' : '';
            echo "<option value='$option_slug' $font_style $selected >$opt_name</option>";
        }

        echo '</select>';
    }

    /**
     *
     */
    public function template_field( $args ) {

        $name        = isset( $args['label_for'] ) && !empty( $args['label_for'] ) ? $args['label_for'] : '';
        $classes     = isset( $args['class'] ) && !empty( $args['class'] ) ? $args['class'] : '';
        $option_name = isset( $args['option_name'] ) && !empty( $args['option_name'] ) ? $args['option_name'] : '';
        $emails_path = ESG_PLUGIN_TEMPLATES . '/emails';
        $option      = get_option( $option_name );

        //check if path exist and not empty
        if ( is_dir( $emails_path ) && !empty( $emails_path ) ) {

            if ( $handle = opendir( $emails_path ) ) {

                while ( false !== ( $entry = readdir( $handle ) ) ) {
                    if ( $entry != '.' && $entry != '..' && pathinfo( $entry )['extension'] === 'php' ) {

                        $entry = str_replace( '.php', '', $entry );

                        $default_val = '';
                        if ( !isset( $option[ $name ] ) || $option[ $name ] == '' && $entry == $default_val ) {
                            $default_val = 'checked';
                        }

                        printf(
                            '<label><input type="radio" id="%s" name="%s[%s]" class="%s" value="%s" %s/><img src="%s" width="250px"/></label>',
                            $entry,
                            $option_name,
                            $name,
                            $classes,
                            $entry,
                            ( isset( $option[ $name ] ) && $option[ $name ] == $entry ) ? 'checked' : $default_val,
                            ESG_PLUGIN_URL . '/assets/img/' . $entry . '-template.png'
                        );
                    }
                }
                closedir( $handle );
            }
        }
    }

    /**
     * @param $args
     */
    public function image_field( $args ) {
        $name        = isset( $args['label_for'] ) && !empty( $args['label_for'] ) ? $args['label_for'] : '';
        $classes     = isset( $args['class'] ) && !empty( $args['class'] ) ? $args['class'] : '';
        $option_name = isset( $args['option_name'] ) && !empty( $args['option_name'] ) ? $args['option_name'] : '';
        $default_val = isset( $args['default_val'] ) && !empty( $args['default_val'] ) ? $args['default_val'] : '';
        $option      = get_option( $option_name );
    

        printf(
            '<input type="text" id="%s" name="%s[%s]" class="upload-input-url %s" value="%s" />
            <input type="button" class="button-secondary esg-button-remove" value="Remove" %s />
            <input type="button" class="button-primary esg-button-upload" value="%s" />',
            str_replace( '_', '-', $name),
            $option_name,
            $name,
            $classes,
            isset( $option[ $name ] ) ? esc_attr( $option[ $name ] ) : $default_val,
            empty( $option[ $name ] ) ? 'style="display:none;"' : '',
            __( 'Choisir une image', 'esg-plugin' ),
        );
    }

    /**
     * @param $args
     */
    public function color_picker_field( $args ) {
        $name         = isset( $args['label_for'] ) && !empty( $args['label_for'] ) ? $args['label_for'] : '';
        $classes      = isset( $args['class'] ) && !empty( $args['class'] ) ? $args['class'] : '';
        $option_name  = isset( $args['option_name'] ) && !empty( $args['option_name'] ) ? $args['option_name'] : '';
        $default_val = isset( $args['default_val'] ) && !empty( $args['default_val'] ) ? $args['default_val'] : '';
        $option       = get_option( $option_name );
        
        printf(
            '<input type="text" name="' . $option_name . '[' . $name . ']" value="%s" class="color-picker ' . $classes . '">',
            ( isset( $option[ $name ] ) ) ? $option[ $name ] : $default_val
        );
    }

    /**
     * @param $args
     */
    public function hidden_field( $args ) {
        return;
    }

    /**
     * @param $value
     * @return bool
     */
    public function check_color( $value ): bool {
        // unused at the moment

        if ( preg_match( '/^#[a-f0-9]{6}$/i', $value ) ) { // if user insert a HEX color with #
            return true;
        }

        return false;
    }
}
