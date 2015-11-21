<?php

namespace Core\Router;

use Core\Controller\BaseController;
use InvalidArgumentException;

class Route {
    protected $method;
    protected $url;
    protected $controller;
    protected $param_names = array();
    protected $allowed_methods = array("GET", "POST", "PUT", "DELETE", "PATCH");
    protected $actionName;

    const URL_PARAMS_REGEXP = "/(?!\/):\w+/";

    const URL_ROUTE_REGEXP = "/^(?:\/?(?:\/:[a-zA-Z0-9_]+|[a-zA-Z0-9_]+))+\/?$/";

    public function __construct($method = "", $url = "") {
        if (!empty($method))
            $this->setMethod($method);
        if (!empty($url))
            $this->setUrl($url);
    }

    public function setMethod($method) {
        $this->validateMehtodName($method);
        $this->method = $method;
    }

    public function getMethod() {
        return $this->method;
    }

    function setUrl($url) {
        $this->validateUrl($url);

        $this->saveParamNames($url);
        $this->url = $url;
    }

    private function validateUrl($url) {
        if (!preg_match_all(self::URL_ROUTE_REGEXP, $url))
            throw new InvalidArgumentException("Invalid Route URL");
    }

    private function saveParamNames($url) {
        preg_match_all(self::URL_PARAMS_REGEXP, $url, $matches);
        foreach ($matches[0] as $match)
            $this->param_names[] = $match;
    }

    function getUrl() {
        return $this->url;
    }

    function getParamNames() {
        return $this->param_names;
    }

    function setController(BaseController $controller) {
        $this->$controller = $controller;
    }

    function setActionName($actionName) {
        $this->actionName = $actionName;
    }

    function getActionName() {
        return $this->actionName;
    }

    function getController() {
        return $this->controller;
    }

    private function validateMehtodName($method) {
        if (!in_array($method, $this->allowed_methods))
            throw new InvalidArgumentException("Invalid Method");
    }

}