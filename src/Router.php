<?php

class Router
{
    public string|array|int|null|false $currentRoute;

    public function __construct()
    {
        $this->currentRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function get($route, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $this->currentRoute == $route) {
            $callback();
            exit();
        }
    }

    public function post($route, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->currentRoute == $route) {
            $callback();
            exit();
        }
    }
}