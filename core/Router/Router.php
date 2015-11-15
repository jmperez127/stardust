<?php

namespace Core\Router;

use Core\Controller\BaseController;

class Router {

    protected $routes = array();
    protected $controllers = array();

    public function getRoutes(){
        return $this->routes;
    }

    public function addRoute(Route $route){

        $this->routes[] = $route;
    }

    public function getControllers(){
        return $this->controllers;
    }

    public function addController(BaseController $controller){
        $this->controllers[] = $controller;
    }

}