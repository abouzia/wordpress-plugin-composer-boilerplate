<?php

/**
 * @package WP_Composer
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;


class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function adminCPT()
    {
        return require_once("$this->plugin_path/templates/admin-cpt.php");
    }

    public function wpComposerOptionsGroup($input)
    {
        return $input;
    }

    public function wpComposerAdminSection()
    {
        echo '<p>Enter your details</p>';
    }

    public function wpComposerTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo "<input type='text' class='regular-text' name='text_example' value='$value' placeholder='Enter text here'>";
    }

    public function wpComposerFirstName() 
    {
        $value = esc_attr(get_option('first_name'));
        echo "<input type='text' class='regular-text' name='first_name' value='$value' placeholder='Enter your first name'>";
    }
}
