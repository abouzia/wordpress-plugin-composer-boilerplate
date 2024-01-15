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
                'option_name' => 'cpt_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'wp_composer_plugin_settings',
                'option_name' => 'taxonomy_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'wp_composer_plugin_settings',
                'option_name' => 'media_widget',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'wp_composer_plugin_settings',
                'option_name' => 'gallery_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'wp_composer_plugin_settings',
                'option_name' => 'testimonial_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'wp_composer_plugin_settings',
                'option_name' => 'templates_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'wp_composer_plugin_settings',
                'option_name' => 'login_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'wp_composer_plugin_settings',
                'option_name' => 'membership_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'wp_composer_plugin_settings',
                'option_name' => 'chat_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
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
                'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
                'page' => 'wp_composer',
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'cpt_manager',
                'title' => 'Activate CPT Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'wp_composer',
                'section' => 'wp_composer_admin_index',
                'args' => array(
                    'label_for' => 'cpt_manager',
                    'class' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'taxonomy_manager',
                'title' => 'Activate Taxonomy Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'wp_composer',
                'section' => 'wp_composer_admin_index',
                'args' => array(
                    'label_for' => 'taxonomy_manager',
                    'class' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'media_widget',
                'title' => 'Activate Media Widget',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'wp_composer',
                'section' => 'wp_composer_admin_index',
                'args' => array(
                    'label_for' => 'media_widget',
                    'class' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'gallery_manager',
                'title' => 'Activate Gallery Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'wp_composer',
                'section' => 'wp_composer_admin_index',
                'args' => array(
                    'label_for' => 'gallery_manager',
                    'class' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'testimonial_manager',
                'title' => 'Activate Testimonial Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'wp_composer',
                'section' => 'wp_composer_admin_index',
                'args' => array(
                    'label_for' => 'testimonial_manager',
                    'class' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'templates_manager',
                'title' => 'Activate Templates Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'wp_composer',
                'section' => 'wp_composer_admin_index',
                'args' => array(
                    'label_for' => 'templates_manager',
                    'class' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'login_manager',
                'title' => 'Activate Login Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'wp_composer',
                'section' => 'wp_composer_admin_index',
                'args' => array(
                    'label_for' => 'login_manager',
                    'class' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'membership_manager',
                'title' => 'Activate Membership Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'wp_composer',
                'section' => 'wp_composer_admin_index',
                'args' => array(
                    'label_for' => 'membership_manager',
                    'class' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'chat_manager',
                'title' => 'Activate Chat Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'wp_composer',
                'section' => 'wp_composer_admin_index',
                'args' => array(
                    'label_for' => 'chat_manager',
                    'class' => 'ui-toggle',
                )
            )
        );

        $this->settings->setFields($args);
    }
}
