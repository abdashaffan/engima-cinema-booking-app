<?php


class Controller
{
    protected  $cssPath;
    protected  $jsPath;

    public function __construct($controllerName = "")
    {
        // di file viewnya tambahin pathnya kalo ternyata filenya ada banyak
        $this->cssPath = "/" . PROJECT_NAME . "/public/css/{$controllerName}";
        $this->jsPath = "/" . PROJECT_NAME . "/public/js/{$controllerName}";
    }

    public function view($viewPath, $data = [])
    {
        extract($data); //membuat variable dari array $data jadi gausah pake array lagi pas akses di viewnya
        require_once '../app/views/' . $viewPath . '.view.php';
    }


    public function model($model)
    {
        $model = ucwords($model);
        $model = $model . 'Model';
        require_once '../app/models/' . $model . '.php';

        return new $model;
    }

    public function redirect($path)
    {
        header("Location: {$path}");
        exit;
    }
}