<?php
/**
 * @package  emailSignatureGenerator
 */

namespace Includes\Base;

use Includes\Base\BaseController;

class StoreData extends Basecontroller
{
    public function restore_default($override = false)
    {
        $default_options = [];

        foreach ($this->managers as $row) {

            if ($row['fields']) {

                foreach ($row['fields'] as $key => $value) {  // Set fields from $managers['fields']
                    $default_options[$key] = $value['default_val'];

                    if ($value['style']) {

                        foreach ($value['style'] as $k => $v) {
                            $default_options[$this->toSlug($key) . '_' . $this->toSlug($k)] = $v['default_val'];
                        }
                    }
                }
            }
        }

        if (!get_option('esg_admin_settings') || $override == true) {
            update_option('esg_admin_settings', $default_options);
        }
    }
}
