<?php

namespace Stardust\Router;

use Stardust\Controller\BaseController;

class Router {

    protected $routes = array();
    protected $controllers = array();
    protected $controllersFolder = "";

    public function getRoutes(){
        return $this->routes;
    }

    public function addRoute(Route $route){
        $this->routes[] = $route;
    }

    public function getControllers(){
        foreach($this->routes as $route)
            $this->getControllerFromActionPath($route->getActionPath());
        return $this->controllers;
    }


    public function getControllerFromActionPath($actionPath){
        preg_match_all("/^(?!\d)\w+/", $actionPath, $matches);
        $controllerName = $matches[0][0];
        $controllerName = ucfirst($controllerName)."Controller";
//        return new $controllerName;
    }

    public function addController(BaseController $controller){
        $this->controllers[] = $controller;
    }

}