<?php

namespace base;

use base\Application as App;

/**
 * Router.
 */
class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct($routes = [])
    {
        foreach ($routes as $key => $value) {
            $this->add($key, $value);
        }
    }

    public function add($route, $params)
    {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if(preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if($this->match()) {
            $controller = 'controllers\\'.ucfirst($this->params['controller']).'Controller';

            if(class_exists($controller)) {
                $action = 'action'.ucfirst($this->params['action']);
                if(method_exists($controller, $action)) {
                    (new $controller($this->params))->$action();
                } else {
                    echo 'Метод не найден';
                }
            } else {
                echo 'Класс не найден';
            }
        } else {
            App::errorCode(404);
            echo '404';
        }
    }
}
