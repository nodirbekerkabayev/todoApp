<?php

class Router
{
    public string|array|int|null|false $currentRoute;

    public function __construct()
    {
        $this->currentRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function getResources(){
        if(isset(explode('/', $this->currentRoute)[2])){
            $resourceId =  explode('/', $this->currentRoute)[2];
            return $resourceId;
        }
        return false;
    }

    public function get($route, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $resourceId = $this->getResources();
            $route = str_replace('{id}', $resourceId, $route);
            if ($route == $this->currentRoute){
                $callback($resourceId);
                exit();
            }
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