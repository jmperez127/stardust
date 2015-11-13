<?php

namespace Core\Router;

class Router {

    protected $routes = array();

    public function getRoutes(){
        return $this->routes;
    }

    public function addRoute(Route $route){
        $this->routes[] = $route;
    }

}