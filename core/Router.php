<?php

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function get($uri, $contoller)
    {

        $this->routes['GET'][$uri] = $contoller;
    }
    public function post($uri, $contoller)
    {

        $this->routes['POST'][$uri] = $contoller;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->routes[$uri];
        }

        throw new Exception('No route defined for this URI.');
    }
}