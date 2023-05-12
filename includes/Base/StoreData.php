<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Base;

use Includes\Base\BaseController;

class StoreData extends Basecontroller {

    public function set_default_options() {
        
        $default_options = array();

        foreach ( $this->managers as $row ) {
            if ( $row['fields'] ) {
                foreach ( $row['fields'] as $key => $value ) {  // Set fields from $managers['fields']

                    if ( isset( $value['options']['default_val'] ) && !empty( $value['options']['default_val'] ) ) {
                        $default_options[ $key ] = $value['options']['default_val'];
                    }

                    if ( isset( $value['style'] ) && !empty( $value['style'] ) ) {
                        foreach ( $value['style'] as $k => $v ) {
                            $default_options[ $this->slugify( $key ) . '_' . $this->slugify( $k ) ] = $v['options']['default_val'];
                        }
                    }
                }
            }
        }
        update_option( ESG_PLUGIN_SETTINGS, $default_options );
    }
}
