<?php

namespace Core\Router;

use InvalidArgumentException;

class Route {
    protected $method;
    protected $action;
    protected $param_names = array();
    protected $allowed_methods = array("GET", "POST", "PUT", "DELETE", "PATCH");

    const URL_PARAMS_REGEXP = "/(?!\/):\w+/";

    public function __construct($method = "", $action = "") {
        if (!empty($method))
            $this->setMethod($method);
        if (!empty($action))
            $this->setAction($action);
    }

    public function setMethod($method) {
        if (!in_array($method, $this->allowed_methods))
            throw new InvalidArgumentException("Invalid Method");

        $this->method = $method;
    }

    public function getMethod() {
        return $this->method;
    }

    function setAction($action_name) {
        $this->saveParamNames($action_name);
        $this->action = $action_name;
    }

    function getAction() {
        return $this->action;
    }

    function getParamNames() {
        return $this->param_names;
    }


    private function saveParamNames($action_name) {
        preg_match_all(self::URL_PARAMS_REGEXP, $action_name, $matches);
        foreach ($matches[0] as $match)
            $this->param_names[] = $match;
    }

}