<?php

namespace base;


abstract class Controller
{
    public $route;
    public $layout = 'main';
    public $title = 'Project';

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function render($view, $data = []) {

        // передаем данные
        extract($data);

        $file_view = '../views/'.$this->route['controller'].'/'.$view.'.php';
        $file_layout = '../views/layouts/'.$this->layout.'.php';

        // подключаем View
        if(file_exists($file_view)) {
            ob_start();
            require $file_view;
            $content = ob_get_clean();
        } else {
            $content = $file_view.' - не найден';
        }

        // подключаем Layout
        if(file_exists($file_layout)) {
            require '../views/layouts/'.$this->layout.'.php';
        } else {
            echo $this->layout . '- не найден';
        }

    }

    public function renderPartial($view, $data = []) {

        // передаем данные
        extract($data);

        $file_view = '../views/'.$this->route['controller'].'/'.$view.'.php';

        // подключаем View
        if(file_exists($file_view)) {
            ob_start();
            require $file_view;
            $content = ob_get_clean();
        } else {
            $content = $file_view.' - не найден';
        }

        return $content;
    }

    public function redirect($url)
    {
        header('location: '.$url);
        exit;
    }
}
