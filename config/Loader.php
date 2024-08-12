<?php

namespace Config;

class Loader
{
    private $class;

    public function __construct($class)
    {
        $this->class = $class;
    }
    public function model(string $model)
    {
        try {

            if (empty($model))
                throw new \Exception('Favor informar um model válido!');

            $folder = explode('Model', $model)[0];

            $modelPath = 'App\\' . $folder . '\\' . ucfirst($model);

            if (!class_exists($modelPath))
                throw new \Exception("Model {$modelPath} não encontrado!");

            if (!isset($this->class->$model))
                $this->class->$model = new $modelPath();

        } catch (\Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

    public function service(string $service)
    {   
        try {

            if (empty($service))
                throw new \Exception('Favor informar um service válido!');

            $folder = explode('Service', $service)[0];

            $servicePath = 'App\\' . $folder . '\\' . ucfirst($service);

            if (!class_exists($servicePath))
                throw new \Exception("Service {$servicePath} não encontrado!");

            if (!isset($this->class->$service))
                $this->class->$service = new $servicePath();

        } catch (\Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

    public function view(string $view, array $data = [])
    {
        try {

            $parts = explode('/', $view);
            $directory = array_shift($parts);
            $filePath = implode('/', $parts);

            if (empty($filePath)) {
                $filePath = $directory;
                $directory = '';
            }

            $view = $_SERVER['DOCUMENT_ROOT'] . '/src/' . $directory . '/views/' . $filePath . '.php';

            if (!file_exists($view) || !is_file($view)) {
                throw new \Exception("View {$view} não encontrada!");
            }

            extract($data);

            $template = $_SERVER['DOCUMENT_ROOT'] . '/src/template/template.php';

            if (!file_exists($template) || !is_file($template)) {
                throw new \Exception("Template {$template} não encontrado!");
            }

            require $template;

        } catch (\Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

}