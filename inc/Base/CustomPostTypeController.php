<?php

/**
 * @package WP_Composer
 */

namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class CustomPostTypeController extends BaseController
{
    public $settings;

    public $callbacks;

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();
        
        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages($this->subpages)->register();

        add_action('init', array($this, 'activate'));
    }

    public function setSubPages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'wp_composer',
                'page_title' => 'Custum Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'wp_composer_cpt',
                'callback' => array($this->callbacks, 'adminCPT')
            )
        );
    }

    public function activate()
    {
        register_post_type(
            'composer_products',
            array(
                'labels' => array(
                    'name' => 'Products',
                    'singular_name' => 'Product',
                ),
                'public' => true,
                'has_archive' => true,
            )
        );
    }
}
