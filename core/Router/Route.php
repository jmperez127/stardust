<?php

namespace Core\Router;

use InvalidArgumentException;

class Route {
    protected $method;
    protected $path;
    protected $param_names = array();
    protected $allowed_methods = array("GET", "POST", "PUT", "DELETE", "PATCH");
    protected $actionPath;

    const URL_PARAMS_REGEXP = "/(?!\/):\w+/";
    const VALID_URL_ROUTE_REGEXP = "/^(?:\/?(?:\/:[a-zA-Z0-9_]+|[a-zA-Z0-9_]+))+\/?$/";
    const VALID_ACTION_PATH = "/^(?!\d)\w+#(?!\d)\w+$/";

    public function __construct($method = "", $path = "", $actionPath = "") {
        if (!empty($method)) $this->setMethod($method);
        if (!empty($path)) $this->setPath($path);
        if (!empty($path)) $this->setActionPath($actionPath);
    }

    public function setMethod($method) {
        $this->validateMehtod($method);
        $this->method = $method;
    }

    private function validateMehtod($method) {
        if (!in_array($method, $this->allowed_methods))
            throw new InvalidArgumentException("Invalid Method");
    }

    public function getMethod() {
        return $this->method;
    }


    public function setPath($path) {
        $this->validatePath($path);
        $this->saveParamNames($path);
        $this->path = $path;
    }

    private function validatePath($path) {
        if (!preg_match_all(self::VALID_URL_ROUTE_REGEXP, $path))
            throw new InvalidArgumentException("Invalid Route URL");
    }

    private function saveParamNames($path) {
        preg_match_all(self::URL_PARAMS_REGEXP, $path, $matches);
        foreach ($matches[0] as $match)
            $this->param_names[] = $match;
    }

    public function getPath() {
        return $this->path;
    }

    public function getParamNames() {
        return $this->param_names;
    }


    public function setActionPath($actionPath) {
        $this->validateActionPath($actionPath);
        $this->actionPath = $actionPath;
    }

    private function validateActionPath($actionPath) {
        if (!preg_match_all(self::VALID_ACTION_PATH, $actionPath))
            throw new InvalidArgumentException("Invalid Route URL");
    }

    public function getActionPath() {
        return $this->actionPath;
    }

    public function getRouteInfo() {
        return $this->method . "\t" . $this->path . "\t" . $this->actionPath;
    }

}