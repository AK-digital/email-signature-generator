- Mettre des label sur le form.php comme sur talent.io.
- Revenir sur l'onglet actif après rechargement de la page.
- Mettre instructions pour upload image dimensions, extensions et poids.
- Additionnal content disparait, checker sanitize et callback.
- Charger les scripts et le css que sur les pages d'admin du plugin et les pages contenant un shortcode du plugin

- Systematiser sanitize 
- Systematiser callbacks -> select, radio et template à revoir




                //                if($value['input_type'] == 'color_picker') {
//                    $text_color = trim($args['text_color']);
//                    $text_color = strip_tags(stripslashes($text_color));
//
//                    // Check if is a valid hex color
//                    if (FALSE === $this->check_color($text_color)) {
//
//                        // Set the error message
//                        add_settings_error('esg_admin_settings', 'text_color_error', 'Insert a valid color for text_color', 'error'); // $setting, $code, $message, $type
//
//                        // Get the previous valid value
//                        $new_input['text_color'] = $this->options['text_color'];
//
//                    } else {
//
//                        $new_input['text_color'] = $text_color;
//                    }
//                }
kjjkhjkjkj
