<?php

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

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
                'option_group' => 'wp_composer_options_group',
                'option_name' => 'text_example',
                'callback' => array($this->callbacks, 'wpComposerOptionsGroup')
            ),
            array(
                'option_group' => 'wp_composer_options_group',
                'option_name' => 'first_name'
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {

        $args = array(
            array(
                'id' => 'wp_composer_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'wpComposerAdminSection'),
                'page' => 'wp_composer',
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'Text Example',
                'callback' => array($this->callbacks, 'wpComposerTextExample'),
                'page' => 'wp_composer',
                'section' => 'wp_composer_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example-class',
                )
            ),
            array(
                'id' => 'first_name',
                'title' => 'First Name',
                'callback' => array($this->callbacks, 'wpComposerFirstName'),
                'page' => 'wp_composer',
                'section' => 'wp_composer_admin_index',
                'args' => array(
                    'label_for' => 'first_name',
                    'class' => 'example-class',
                )
            )
        );

        $this->settings->setFields($args);
    }
}
