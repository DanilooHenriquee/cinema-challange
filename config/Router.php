<?php

namespace Config;

use App\error\ErrorController;

class Router
{
    public $error;

    public function __construct() 
    {
        $this->error = new ErrorController();
    }

    public function run()
    {
        $request = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
        $request = parse_url($request, PHP_URL_PATH);
        $request = trim($request, '/');

        $parts = explode('/', $request);

        $controllerFolder = isset($parts[0]) && !empty($parts[0]) ? $parts[0] : 'home';
        $controllerName   = isset($parts[0]) && !empty($parts[0]) ? ucfirst($parts[0]) . 'Controller' : 'HomeController';
        $controllerMethod = isset($parts[1]) ? $parts[1] : 'index';

        $params = isset($parts[2]) ? $parts[2] : [];

        $controllerClass = 'App\\' . $controllerFolder . '\\' . $controllerName;

        if (!class_exists($controllerClass)) {

            $this->error->showError(404, "Controller '$controllerClass' não encontrado.");
            exit;
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $controllerMethod)) {

            $this->error->showError(404, "Método '$controllerMethod' não encontrado no controller '$controllerName'");
            exit;
        }

        $controller->$controllerMethod($params);

    }

}