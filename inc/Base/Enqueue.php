<?php

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{

    public function register()
    {
        add_action(
            'admin_enqueue_scripts',
            array($this, 'enqueue')
        );
    }

    function enqueue()
    {
        wp_enqueue_style(
            'myplugin-styles',
             $this->plugin_url . 'assets/style.css',
        );

        wp_enqueue_script(
            'myplugin-script',
            $this->plugin_url . 'assets/script.js',
        );
    }
}
