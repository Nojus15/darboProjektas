<?php

namespace MyApp;

use \Closure;

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

        if ($callback instanceof Closure) {
            return call_user_func($callback);
        } else if (is_array($callback)) {
            // pasitikrint reikia ar uztenkamai array elementu
            // ir ar tokios klase su methodu egzistuoja

            return (new $callback[0]())->{$callback[1]}();
        }
    }
}
