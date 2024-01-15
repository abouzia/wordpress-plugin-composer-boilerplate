<?php

/**
 * @package WP_Composer
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;


class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input)
    {
        return (isset($input) ? true : false);
    }

    public function adminSectionManager()
    {
        echo 'Manage Sections and Features of this plugin';
    }

    public function checkboxField($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $checked = get_option($name) ? 'checked' : '';

        echo "<input type='checkbox' name='$name' value='1' $checked class='$classes'>";
    }
}
