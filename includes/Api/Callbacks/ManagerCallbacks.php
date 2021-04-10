<?php
/**
 * @package  emailSignatureGenerator
 */
namespace Includes\Api\Callbacks;

use Includes\Base\BaseController;

class ManagerCallbacks extends BaseController
{
	public function checkboxSanitize( $input )
	{
		$output = array();

		foreach ( $this->managers as $key => $value ) {
			$output[$key] = isset( $input[$key] ) ? true : false;
		}

		return $output;
	}

    public function textSanitize( $input )
    {
        $output = get_option('esg_plugin');

        if ( isset($_POST["remove"]) ) {
            unset($output[$_POST["remove"]]);

            return $output;
        }

        if ( count($output) == 0 ) {
            $output[$input['post_type']] = $input;

            return $output;
        }

        foreach ($output as $key => $value) {
            if ($input['post_type'] === $key) {
                $output[$key] = $input;
            } else {
                $output[$input['post_type']] = $input;
            }
        }

        return $output;
    }

	public function adminSectionManager()
	{
		echo 'Manage the Sections and Features of this Plugin by activating the checkboxes from the following list.';
	}

	public function checkboxField( $args )
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$option_name = $args['option_name'];
		$checkbox = get_option( $option_name );
		$checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

		echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ( $checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
	}

    public function textField( $args )
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $value = '';

        if ( isset($_POST["edit_post"]) ) {
            $input = get_option( $option_name );
            $value = $input[$_POST["edit_post"]][$name];
        }

        echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="' . $value . '" placeholder="' . $args['placeholder'] . '" required>';
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $args Contains all settings fields as array keys
     */

    public function sanitize($args)
    {
        $new_input = array();

        if (isset($args['logo']))
            $new_input['logo'] = $args['logo'];

        if (isset($args['banner']))
            $new_input['banner'] = $args['banner'];

        if (isset($args['banner_link']))
            $new_input['banner_link'] = sanitize_text_field($args['banner_link']);

        if (isset($args['company_name']))
            $new_input['company_name'] = sanitize_text_field($args['company_name']);

        if (isset($args['font_family']))
            $new_input['font_family'] = sanitize_text_field($args['font_family']);

        if (isset($args['baseline']))
            $new_input['baseline'] = sanitize_text_field($args['baseline']);

        if (isset($args['address']))
            $new_input['address'] = sanitize_text_field($args['address']);

        if (isset($args['phone']))
            $new_input['phone'] = sanitize_text_field($args['phone']);

        if (isset($args['website']))
            $new_input['website'] = sanitize_text_field($args['website']);

        if (isset($args['facebook']))
            $new_input['facebook'] = sanitize_text_field($args['facebook']);

        if (isset($args['youtube']))
            $new_input['youtube'] = sanitize_text_field($args['youtube']);

        if (isset($args['linkedin']))
            $new_input['linkedin'] = sanitize_text_field($args['linkedin']);

        if (isset($args['twitter']))
            $new_input['twitter'] = sanitize_text_field($args['twitter']);

        if (isset($args['tiktok']))
            $new_input['tiktok'] = sanitize_text_field($args['tiktok']);

        if (isset($args['instagram']))
            $new_input['instagram'] = sanitize_text_field($args['instagram']);

        if (isset($args['template']))
            $new_input['template'] = $args['template'];

        if (isset($args['additional_content']))
            $new_input['additional_content'] =  $args['additional_content'];

        // Validate text_color Color
        $text_color = trim( $args['text_color'] );
        $text_color = strip_tags( stripslashes( $text_color ) );

        // Check if is a valid hex color
        if( FALSE === $this->check_color( $text_color ) ) {

            // Set the error message
            add_settings_error( 'esg_admin_settings', 'text_color_error', 'Insert a valid color for text_color', 'error' ); // $setting, $code, $message, $type

            // Get the previous valid value
            $new_input['text_color'] = $this->options['text_color'];

        } else {

            $new_input['text_color'] = $text_color;
        }

        // Validate icon_color Color
        $icon_color = trim( $args['icon_color'] );
        $icon_color = strip_tags( stripslashes( $icon_color ) );

        // Check if is a valid hex color
        if( FALSE === $this->check_color( $icon_color ) ) {

            // Set the error message
            add_settings_error( 'esg_admin_settings', 'icon_color_error', 'Insert a valid color for icon_color', 'error' ); // $setting, $code, $message, $type

            // Get the previous valid value
            $new_input['icon_color'] = $this->options['icon_color'];

        } else {

            $new_input['icon_color'] = $icon_color;
        }

        // Validate link_color Color
        $link_color = trim( $args['link_color'] );
        $link_color = strip_tags( stripslashes( $link_color ) );

        // Check if is a valid hex color
        if( FALSE === $this->check_color( $link_color ) ) {

            // Set the error message
            add_settings_error( 'esg_admin_settings', 'link_color_error', 'Insert a valid color for link_color', 'error' ); // $setting, $code, $message, $type

            // Get the previous valid value
            $new_input['link_color'] = $this->options['link_color'];

        } else {

            $new_input['link_color'] = $text_color;
        }

        return $new_input;
    }
}
