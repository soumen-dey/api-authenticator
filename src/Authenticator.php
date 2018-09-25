<?php

namespace Soumen\Authenticator;

class Authenticator
{
    /**
     * Register the routes.
     *
     * @author Soumen Dey
     */
    public static function routes()
    {
        app('router')
            ->post('login', self::controller('LoginController', 'login'));
        
        app('router')
            ->post('register', self::controller('RegisterController', 'register'));
    }

    /**
     * Get the controller name.
     *
     * @param String $controller
     * @param String $method
     * @return String
     * @author Soumen Dey
     */
    public static function controller($controller, $method)
    {
        return self::getControllerNameSpace($controller) . '@' . $method;
    }

    /**
     * Get the namespace of the controller including the controller.
     *
     * @param String $controller
     * @return String
     * @author Soumen Dey
     */
    public static function getControllerNameSpace($controller = null)
    {
        return "\\Soumen\\Authenticator\\Controllers\\" . $controller;
    }
}