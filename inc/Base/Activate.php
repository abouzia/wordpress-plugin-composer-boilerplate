<?php

namespace Inc\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        if (get_option('wp_composer_plugin')) {
            return;
        }

        $default = array();

        update_option('wp_composer_plugin', $default);
    }
}
