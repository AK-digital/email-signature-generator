<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Base;

use Includes\Base\BaseController;

class StoreData extends Basecontroller {


    public function restore_default() {
        if ( empty( $_POST['restore_submit'] ) ) {
            return;
        }

         $default_options = array();

        foreach ( $this->managers as $row ) {

            if ( $row['fields'] ) {

                foreach ( $row['fields'] as $key => $value ) {  // Set fields from $managers['fields']
                    $default_options[ $key ] = $value['default_val'];

                    if ( $value['style'] ) {

                        foreach ( $value['style'] as $k => $v ) {
                            $default_options[ $this->slugify( $key ) . '_' . $this->slugify( $k ) ] = $v['default_val'];
                        }
                    }
                }
            }
        }
        update_option( ESG_PLUGIN_SETTINGS, $default_options );

    }
}
