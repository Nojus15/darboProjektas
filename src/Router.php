<?php

namespace MyApp;

class Router
{
    private array $routes = [];
    public Request $request;

    public function __construct($request)
    {
        $this->request = $request;
    }


    public function get($url, $callback)
    {
        $this->routes['GET'][$url] = $callback;
    }
    public function post($url, $callback)
    {
        $this->routes['POST'][$url] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        echo '<pre>';
        var_dump($callback);
        echo '<pre>';


        if ($callback === false) {
            echo "Not found";
            exit;
        }
        echo call_user_func($callback);
    }
}
