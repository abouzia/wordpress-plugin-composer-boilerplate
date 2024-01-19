<?php

namespace Inc;

final class Init
{
    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return [
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Pages\Dashboard::class,
            Base\CustomPostTypeController::class,
    
        ];
    }

    /**
     * Loop through the classes, initialize them, and call the register() if it exists
     * @return void
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Instantiate the class
     * @param string $class
     * @return class instance 
     */
    private static function instantiate($class) {
        $service = new $class();

        return $service;
    }
}
