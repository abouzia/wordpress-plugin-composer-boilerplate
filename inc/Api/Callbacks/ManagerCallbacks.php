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
        $output = array();

        foreach ($this->managers as $key => $value) {
            $output[$key] = isset($input[$key]) ? true : false;
        }
        return $output;
    }

    public function adminSectionManager()
    {
        echo 'Manage Sections and Features of this plugin';
    }

    public function checkboxField($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];

        $checkboxes = get_option($option_name);
        $checkbox = isset($checkboxes[$name]) ? $checkboxes[$name] : false;
        $checked = $checkbox ? 'checked' : '';

        echo '<div class="' . $classes . '">
        <input type="checkbox" id="' . $name . '"
        name="' . $option_name . '[' . $name . ']' .  '" value="1"
        class="" ' . $checked . '>
        <label for="' . $name . '">
        <div></div>
        </label>
        </div>';
    }
}
