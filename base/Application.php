<?php

namespace base;

/**
 * Application.
 */
class Application
{
    protected $routes = [];

    /**
     * Constructor.
     * @param array $config.
     */
    public function __construct($config = [])
    {
        //получили конфиг
        if(isset($config['routes'])) $this->routes = $config['routes'];
    }

    public function run()
    {
        //запускаем приложение
        $router = new Router($this->routes);
        $router->run();
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        require '../views/errors/'.$code.'.php';
        exit;
    }
}
