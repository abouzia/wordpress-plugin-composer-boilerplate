<?php

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $callbacks_mngr;

    public $pages = array();

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'WP Composer',
                'menu_title' => 'WP Composer',
                'capability' => 'manage_options',
                'menu_slug' => 'wp_composer',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-admin-generic',
                'position' => 101
            )
        );
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

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'wp_composer_plugin_settings',
                'option_name' => 'wp_composer_plugin',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            )
        );

        // foreach ($this->managers as $key => $value) {
        //     $args[] = array(
        //         'option_group' => 'wp_composer_plugin_settings',
        //         'option_name' => $key,
        //         'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
        //     );
        // }

        $this->settings->setSettings($args);
    }

    public function setSections()
    {

        $args = array(
            array(
                'id' => 'wp_composer_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
                'page' => 'wp_composer',
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array();

        foreach ($this->managers as $key => $value) {
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'wp_composer',
                'section' => 'wp_composer_admin_index',
                'args' => array(
                    'option_name' => 'wp_composer_plugin',
                    'label_for' => $key,
                    'class' => 'ui-toggle',
                )
            );
        }

        $this->settings->setFields($args);
    }
}
