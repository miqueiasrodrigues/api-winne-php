<?php

namespace Routes;

use App\Exceptions\AppException;

class Router
{
    private $prefix;

    public function __construct(string $prefix = "")
    {
        $this->prefix = $prefix;
    }

    private $routes = [];

    public function add(string $method, string $path, callable $callback)
    {
        if (!in_array($method, ALLOWED_METHODS)) {
            throw new AppException();
        }

        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback
        ];
    }

    public function route(string $method, string $uri)
    {
        $uriReplace =  str_replace(PREFIX_URI . '/' . $this->prefix, '', $uri);
        $uriReplace = ($uriReplace === "/") ? $uriReplace : rtrim($uriReplace, '/');

        foreach ($this->routes as $route) {
            if ($route['method'] == $method && preg_match('#^' . $route['path'] . '$#', $uriReplace, $matches)) {
                array_shift($matches);
                call_user_func_array($route['callback'], $matches);
                return;
            }
        }
        throw new AppException(404, 'Rota não definida.');
    }
}
